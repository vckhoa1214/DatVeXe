<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChuyenXe;
use App\Models\NhaXe;
use App\Models\VeDaDat;
use App\Models\TaiKhoan;
use App\Models\LoaiXe;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function loginAdmin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = TaiKhoan::where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user->password)) {
                if ($user->isVerified && $user->isAdmin) {
                    // Lưu session
                    Session::put('user', $user);
                    Session::put('admin_logged_in', true);

                    // Redirect về URL trước đó hoặc về dashboard
                    $redirectUrl = $request->session()->pull('returnURL', route('dashboard'));
                    return redirect()->to($redirectUrl);
                } elseif (!$user->isVerified) {
                    return back()->with([
                        'message' => 'Tài khoản của bạn chưa được xác thực trong hệ thống, vui lòng xác thực!',
                        'type' => 'alert-danger',
                    ]);
                } elseif (!$user->isAdmin) {
                    return back()->with([
                        'message' => 'Tài khoản của bạn không phải là admin!!!',
                        'type' => 'alert-danger',
                    ]);
                }
            } else {
                return back()->with([
                    'message' => 'Mật khẩu nhập không đúng!!!',
                    'type' => 'alert-danger',
                ]);
            }
        }

        return back()->with([
            'message' => 'Email không tồn tại!!!',
            'type' => 'alert-danger',
        ]);
    }


    public function isAdminLoggedIn(Request $request)
    {
        return Session::has('user') && Session::get('user')['isAdmin'] ?? false;
    }

    public function logoutAdmin()
    {
        Session::flush(); // Xoá toàn bộ session
        return redirect('/dashboard/login');
    }

    public function show(Request $request)
    {
        // Kiểm tra đăng nhập và là admin
        if (!$this->isAdminLoggedIn($request)) {
            $request->session()->put('returnURL', $request->fullUrl());
            return redirect()->route('dashboard.login');
        }

        $accId = Session::get('user.id');
        $infoAcc = TaiKhoan::find($accId);
        $taikhoan = TaiKhoan::all();
        $chuyenxe = ChuyenXe::all();
        $nhaxe = NhaXe::all();
        $vedadat = VeDaDat::all();

        // 👉 Thêm dòng này để tính tổng doanh thu
        $tongDoanhThu = VeDaDat::where('statusTicket', 'Đã thanh toán')
            ->with('chuyenXe')
            ->get()
            ->sum(function($ticket) {
                return $ticket->chuyenXe->price * $ticket->numSeats;
            });

        return view('admin.dashboard', compact('infoAcc', 'chuyenxe', 'nhaxe', 'vedadat', 'taikhoan', 'tongDoanhThu'));
    }


    // Hiển thị danh sách vé
    public function showTicket(Request $request)
    {
        // Lấy accId từ session
        $accId = Session::get('user.id');
        $infoAcc = TaiKhoan::find($accId);

        // Lấy trạng thái vé từ query string, mặc định là 'Vừa đặt'
        $statusTicket = $request->query('status', 'Vừa đặt');

        // Lấy số trang và số bản ghi mỗi trang
        $limit = 3;
        $currentPage = (int) $request->query('page', 1);
        $offset = ($currentPage - 1) * $limit;

        // Tổng số vé theo trạng thái
        $total = VeDaDat::where('statusTicket', $statusTicket)->count();
        $totalPage = ceil($total / $limit);

        // Lấy vé có phân trang
        $ve = VeDaDat::where('statusTicket', $statusTicket)
            ->with('chuyenXe')
            ->with('taiKhoan')
            ->orderBy('id', 'DESC')
            ->offset($offset)
            ->limit($limit)
            ->get();

        // Trả về view
        return view('admin.quanlyve', [
            'infoAcc' => $infoAcc,
            'statusVuaDat' => $statusTicket == 'Vừa đặt',
            'statusThanhToan' => $statusTicket == 'Đã thanh toán',
            'statusDaHuy' => $statusTicket == 'Đã hủy',
            've' => $ve,
            'statusTicket' => $statusTicket,
            'currentPage' => $currentPage,
            'totalPage' => $totalPage
        ]);
    }



    public function showDetailTicket($id)
    {
        $accId = Session::get('user.id');
        $infoAcc = TaiKhoan::find($accId);

        $vedadat = VeDaDat::with([
            'taiKhoan',
            'chuyenXe.nhaXe'
        ])->find($id);

        return view('admin.chitietve', [
            'infoAcc' => $infoAcc,
            'vedadat' => $vedadat
        ]);
    }

    public function updateStatusTicket(Request $request, $id)
    {
        $statusTicket = $request->input('status');

        VeDaDat::where('id', $id)->update([
            'statusTicket' => $statusTicket
        ]);

        return redirect('/dashboard/quanlyve/');
    }

    public function deleteTicket(Request $request)
    {
        $id = $request->input('id');

        VeDaDat::where('id', $id)->delete();

        return redirect()->back();
    }


    public function showChuyenXe(Request $request)
    {
        $limit = 5;
        $page = (int) $request->query('page', 1);
        $offset = ($page - 1) * $limit;

        $accId = Session::get('user.id');
        $infoAcc = TaiKhoan::find($accId);

        $query = ChuyenXe::with(['nhaxe', 'loaixe']);
        $total = $query->count();
        $quanly_chuyenxe = $query->orderBy('id', 'ASC')->offset($offset)->limit($limit)->get();
        $totalPage = ceil($total / $limit);

        return view('admin.quanlychuyenxe', [
            'infoAcc' => $infoAcc,
            'quanly_chuyenxe' => $quanly_chuyenxe,
            'currentPage' => $page,
            'totalPage' => $totalPage,
        ]);
    }



    public function featureChuyenXe(Request $request)
    {
        [$id, $action] = explode(',', $request->id);

        $chuyenXe = ChuyenXe::find($id);

        if (!$chuyenXe) {
            return redirect()->back()->withErrors(['error' => 'Chuyến xe không tồn tại.']);
        }

        if ($action === '-') {
            VeDaDat::where('jourId', $id)->delete();
            ChuyenXe::destroy($id);
        } else {
            ChuyenXe::create($chuyenXe->toArray());
        }

        return redirect()->back()->with('success', 'Hành động thành công!');
    }


    public function editChuyenXe($id)
    {
        // Lấy chi tiết chuyến xe với các thông tin liên quan
        $details = ChuyenXe::with(['loaixe', 'nhaxe'])->findOrFail($id);

        // Lấy danh sách nhà xe và loại xe
        $danhsachNhaXe = NhaXe::where('id', '!=', $details->nhaxe->id)->get();
        $danhsachLoaiXe = LoaiXe::where('id', '!=', $details->loaixe->id)->get();

        // Lấy thông tin tài khoản người dùng
        $infoAcc = TaiKhoan::find(Session::get('user.id'));

        // Lấy danh sách các tỉnh thành từ phương thức provinceList()
        $provinces = $this->provinceList();

        // Lọc danh sách tỉnh thành bắt đầu và kết thúc
        $startProvinceList = array_filter($provinces, fn($e) => $e['name'] !== $details->startProvince);
        $endProvinceList = array_filter($provinces, fn($e) => $e['name'] !== $details->endProvince);

        // Trả về view chi tiết chuyến xe
        return view('admin.thongtinchitietChuyenXe', compact(
            'details', 'danhsachNhaXe', 'danhsachLoaiXe',
            'infoAcc', 'startProvinceList', 'endProvinceList'
        ));
    }


    public function updateChuyenXe(Request $request, $id)
    {
        $car = NhaXe::where('name', $request->nhaxe)->first();
        $cate = LoaiXe::where('name', $request->loaixe)->first();

        ChuyenXe::where('id', $id)->update([
            'startProvince' => $request->startProvince,
            'endProvince' => $request->endProvince,
            'startLocation' => $request->startLocation,
            'endLocation' => $request->endLocation,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
            'carId' => $car->id,
            'cateCarId' => $cate->id,
            'totalNumSeats' => $request->totalNumSeats,
            'price' => $request->price
        ]);

        return redirect('/dashboard/quanlychuyenxe');
    }

    public function themChuyenXe()
    {
        $danhsachNhaXe = NhaXe::all();
        $danhsachLoaiXe = LoaiXe::all();
        $provinceList = $this->provinceList();

        $accId = Session::get('user')['id'];
        $infoAcc = TaiKhoan::find($accId);

        return view('admin.themchuyenxe', compact('danhsachNhaXe', 'danhsachLoaiXe', 'provinceList', 'infoAcc'));
    }

    public function addChuyenXe(Request $request)
    {
        // Nhận ảnh từ form
        $img = $request->file('image'); // Đảm bảo tên trường trùng với trong view

        // Các dữ liệu khác từ form
        $startProvince = $request->startProvince;
        $endProvince = $request->endProvince;
        $startLocation = $request->startLocation;
        $endLocation = $request->endLocation;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $startTime = $request->startTime;
        $endTime = $request->endTime;
        $price = $request->price;
        $totalNumSeats = $request->totalNumSeats;

        // Lấy thông tin nhà xe
        $car = NhaXe::where('id', $request->nhaxe)->first();
        if (!$car) {
            return redirect()->back()->with('error', 'Không tìm thấy nhà xe');
        }
        $carId = $car->id;

        // Lấy thông tin loại xe
        $category = LoaiXe::where('id', $request->loaixe)->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Không tìm thấy loại xe');
        }
        $cateId = $category->id;

        // Kiểm tra và lưu ảnh vào thư mục public/images/locationImages
        $locationImage = null;
        if ($img) {
            // Tạo tên file ảnh
            $imageName = time() . '.' . $img->getClientOriginalExtension();

            // Di chuyển ảnh vào thư mục public/images/locationImages
            $img->move(public_path('images/locationImages'), $imageName);

            // Lưu đường dẫn vào CSDL
            $locationImage = 'images/locationImages/' . $imageName;
        }

        // Tạo chuyến xe mới
        ChuyenXe::create([
            'startProvince' => $startProvince,
            'endProvince' => $endProvince,
            'startLocation' => $startLocation,
            'endLocation' => $endLocation,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'carId' => $carId,
            'cateCarId' => $cateId,
            'totalNumSeats' => $totalNumSeats,
            'price' => $price,
            'numSeats' => $totalNumSeats,
            'locationImage' => $locationImage, // Đảm bảo lưu đường dẫn chính xác vào CSDL
            'createdAt' => now(),
            'updatedAt' => now(),
        ]);

        // Sau khi tạo chuyến xe thành công
        return redirect('/dashboard/quanlychuyenxe')->with('success', 'Chuyến xe đã được tạo thành công');
    }

    private function provinceList()
    {
        return [
            ['name' => 'Hà Nội'], ['name' => 'Hồ Chí Minh'], ['name' => 'Hải Phòng'], ['name' => 'Đà Nẵng'],
            ['name' => 'Cần Thơ'], ['name' => 'An Giang'], ['name' => 'Bà Rịa - Vũng Tàu'], ['name' => 'Bắc Giang'],
            ['name' => 'Bắc Kạn'], ['name' => 'Bạc Liêu'], ['name' => 'Bắc Ninh'], ['name' => 'Bến Tre'],
            ['name' => 'Bình Dương'], ['name' => 'Bình Định'], ['name' => 'Bình Phước'], ['name' => 'Bình Thuận'],
            ['name' => 'Cà Mau'], ['name' => 'Cao Bằng'], ['name' => 'Đắk Lắk'], ['name' => 'Đắk Nông'],
            ['name' => 'Điện Biên'], ['name' => 'Đồng Nai'], ['name' => 'Đồng Tháp'], ['name' => 'Gia Lai'],
            ['name' => 'Hà Giang'], ['name' => 'Hà Nam'], ['name' => 'Hà Tĩnh'], ['name' => 'Hải Dương'],
            ['name' => 'Hậu Giang'], ['name' => 'Hòa Bình'], ['name' => 'Hưng Yên'], ['name' => 'Khánh Hòa'],
            ['name' => 'Kiên Giang'], ['name' => 'Kon Tum'], ['name' => 'Lai Châu'], ['name' => 'Lâm Đồng'],
            ['name' => 'Lạng Sơn'], ['name' => 'Lào Cai'], ['name' => 'Long An'], ['name' => 'Nam Định'],
            ['name' => 'Nghệ An'], ['name' => 'Ninh Bình'], ['name' => 'Ninh Thuận'], ['name' => 'Phú Thọ'],
            ['name' => 'Quảng Bình'], ['name' => 'Quảng Nam'], ['name' => 'Quảng Ngãi'], ['name' => 'Quảng Ninh'],
            ['name' => 'Quảng Trị'], ['name' => 'Sóc Trăng'], ['name' => 'Sơn La'], ['name' => 'Tây Ninh'],
            ['name' => 'Thái Bình'], ['name' => 'Thái Nguyên'], ['name' => 'Thanh Hóa'], ['name' => 'Thừa Thiên Huế'],
            ['name' => 'Tiền Giang'], ['name' => 'Trà Vinh'], ['name' => 'Tuyên Quang'], ['name' => 'Vĩnh Long'],
            ['name' => 'Vĩnh Phúc'], ['name' => 'Yên Bái'], ['name' => 'Phú Yên'],
        ];
    }
}
