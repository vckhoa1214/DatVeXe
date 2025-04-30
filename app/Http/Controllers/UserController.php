<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;


class UserController extends Controller
{
    private $secret_key = "qwertyuiopasdfghjkl";

    public function showLoginForm(Request $request)
    {
        Session::put('returnURL', $request->query('returnURL'));
        return view('user.login');
    }

    public function showRegisterForm(Request $request)
    {
        Session::put('returnURL', $request->query('returnURL'));
        return view('user.register');
    }


    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $user = TaiKhoan::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            if ($user->isVerified) {
                Auth::login($user);

                $redirectUrl = Session::pull('returnURL', '/');
                if (!filter_var($redirectUrl, FILTER_VALIDATE_URL)) {
                    $redirectUrl = '/';
                }

                return redirect()->to($redirectUrl);
            }
            return redirect()->route('login')->withErrors(['message' => 'Tài khoản chưa được xác thực.']);
        }

        return redirect()->route('login')->withErrors(['message' => 'Email hoặc mật khẩu không đúng!']);
    }


    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:TaiKhoans,email',
            'password' => 'required|confirmed',
        ]);

        $user = TaiKhoan::create([
            'fullName' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'imageAccount' => '/images/default.jpg',
            'isVerified' => false,
            'isAdmin' => false,
            'createdAt' => now(),
            'updatedAt' => now(),
        ]);

        // Tạo token xác thực
        $token = $this->createJWTVerifyAccount($user->email);

        // Tạo URL xác thực
        $url = route('user.verify', ['u' => $user->email, 't' => $token]);

        // Gửi email xác thực
        $this->sendVerifyUserEmail($user, $url);

        return redirect()->route('login')->with('success', 'Vui lòng kiểm tra email để xác thực tài khoản!');
    }


    private function createJWTVerifyAccount($email)
    {
        return JWT::encode(['email' => $email, 'exp' => time() + 3600], $this->secret_key, 'HS256');
        // 'exp' (expiration) giúp token hết hạn sau 1 giờ
    }

    private function verifyJWT($token)
    {
        try {
            $decoded = JWT::decode($token, new Key($this->secret_key, 'HS256'));
            return $decoded->email ?? false;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function sendVerifyUserEmail($user, $url)
    {
        Mail::send('emails.verifyUser', ['user' => $user, 'url' => $url], function ($message) use ($user) {
            $message->to($user->email, $user->fullName)
                ->subject('Xác nhận tài khoản của bạn');
        });
    }



    public function verifyUserByLink(Request $request)
    {
        $email = $request->query('u');
        $token = $request->query('t');

        if (!$email || !$token || !$this->verifyJWT($token)) {
            return redirect('/users/login')->withErrors(['message' => 'Liên kết xác nhận không hợp lệ hoặc đã hết hạn.']);
        }

        $user = TaiKhoan::where('email', $email)->first();
        if ($user) {
            $user->update(['isVerified' => true]);

            // Trả về view xác thực thành công
            return view('emails.verifyUserSuccess', ['email' => $email]);
        }

        return redirect('/users/login')->withErrors(['message' => 'Không tìm thấy email trong hệ thống!']);
    }


    public function showForgotPasswordForm()
    {
        return view('user.forgotPassword');
    }

    public function showResetPasswordForm(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');

        return view('emails.resetPasswordForm', compact('email', 'token'));
    }




    public function updatePassword(Request $request)
    {
        // Kiểm tra email có hợp lệ không
        $validated = $request->validate([
            'email' => 'required|email|exists:TaiKhoans,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Tìm người dùng bằng email
        $user = TaiKhoan::where('email', $validated['email'])->first();

        if (!$user) {
            return back()->with(['message' => 'Không tìm thấy tài khoản!', 'type' => 'alert-danger']);
        }

        // Cập nhật mật khẩu
        $user->password = Hash::make($validated['password']);
        $user->save();

        // Chuyển hướng về trang đăng nhập
        session()->flash('message', 'Mật khẩu đã được cập nhật!');
        session()->flash('type', 'alert-success');
        return redirect()->route('login');
    }



    public function resetPasswordSendEmail(Request $request)
    {
        $request->merge(['email' => trim(strtolower($request->input('email')))]);

        $request->validate([
            'email' => 'required|email|exists:TaiKhoans,email',
        ], [
            'email.exists' => 'Email không tồn tại trong hệ thống!',
        ]);

        $email = $request->input('email');

        // Tạo JWT token
        $payload = [
            'email' => $email,
            'exp' => time() + 3600, // Token hết hạn sau 1 giờ
        ];
        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        // Link reset password
        $resetLink = route('password.reset.form', ['email' => $email, 'token' => $token]);

        Mail::send('emails.resetPassword', ['resetLink' => $resetLink], function ($message) use ($email) {
            $message->to($email)->subject('Đặt lại mật khẩu của bạn');
        });


        return back()->with(['message' => 'Email đặt lại mật khẩu đã được gửi!', 'type' => 'alert-success']);
    }

    public function getLinkResetPassword(Request $request)
    {
        $email = $request->query('u');
        $token = $request->query('t');

        if (!$email || !$token) {
            return redirect('/users/reset-password')->with(['message' => 'Liên kết không hợp lệ', 'type' => 'alert-danger']);
        }

        try {
            $secretKey = env('JWT_SECRET', 'default_secret_key'); // Đảm bảo key là string
            if (!is_string($secretKey)) {
                throw new \Exception('Secret key không hợp lệ');
            }

            $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));

            if (!isset($decoded->email) || $decoded->email !== $email) {
                return redirect('/users/reset-password')->with(['message' => 'Liên kết reset không hợp lệ hoặc đã hết hạn!', 'type' => 'alert-danger']);
            }

            return view('resetPasswordForm', ['email' => $email, 'token' => $token]);
        } catch (\Exception $e) {
            return redirect('/users/reset-password')->with(['message' => 'Liên kết reset không hợp lệ hoặc đã hết hạn!', 'type' => 'alert-danger']);
        }
    }


    public function resetPasswordAccount(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:TaiKhoans,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        try {
            $secretKey = env('JWT_SECRET', 'default_secret_key'); // Đảm bảo key là string
            if (!is_string($secretKey)) {
                throw new \Exception('Secret key không hợp lệ');
            }

            $decoded = JWT::decode($validated['token'], new Key($secretKey, 'HS256'));

            if (!isset($decoded->email) || $decoded->email !== $validated['email']) {
                return back()->with(['message' => 'Token không hợp lệ hoặc đã hết hạn!', 'type' => 'alert-danger']);
            }

            $user = TaiKhoan::where('email', $validated['email'])->first();
            if ($user) {
                $user->password = Hash::make($validated['password']);
                $user->save();
                return redirect('/login')->with(['message' => 'Mật khẩu đã được cập nhật thành công!', 'type' => 'alert-success']);
            }

            return back()->with(['message' => 'Không tìm thấy tài khoản!', 'type' => 'alert-danger']);
        } catch (\Exception $e) {
            return back()->with(['message' => 'Token không hợp lệ hoặc đã hết hạn!', 'type' => 'alert-danger']);
        }
    }


}
