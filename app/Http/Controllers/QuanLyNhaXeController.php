<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaXe;
use App\Models\TaiKhoan;
use App\Models\ChuyenXe;
use App\Models\VeDaDat;
use App\Models\Review;
use Illuminate\Support\Facades\Session;

class QuanLyNhaXeController extends Controller
{

    private function stripVietnamese($str)
    {
        $str = mb_strtolower($str, 'UTF-8');
        $unicode = [
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ'
        ];

        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/u", $nonUnicode, $str);
        }

        // Chuẩn hóa khoảng trắng
        $str = trim(preg_replace('/\s+/', ' ', $str));
        return $str;
    }

    public function show(Request $request)
    {
        $limit = 5;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $limit;

        $search = $request->query('search');
        $infoAcc = TaiKhoan::find(Session::get('user')->id);

        if (!empty($search)) {
            $searchNormalized = $this->stripVietnamese($search);

            $filtered = NhaXe::all()->filter(function ($nhaxe) use ($searchNormalized) {
                $nameWords = explode(' ', $this->stripVietnamese($nhaxe->name));
                $searchWords = explode(' ', $searchNormalized);

                // Kiểm tra tất cả từ trong search phải xuất hiện nguyên vẹn trong tên
                foreach ($searchWords as $word) {
                    if (!in_array($word, $nameWords)) {
                        return false;
                    }
                }
                return true;
            })->values();

            $count = $filtered->count();
            $nhaxes = $filtered->slice($offset, $limit);
        } else {
            $count = NhaXe::count();
            $nhaxes = NhaXe::orderBy('id', 'ASC')->offset($offset)->limit($limit)->get();
        }

        return view('admin.quanlynhaxe', [
            'nhaxes' => $nhaxes,
            'currentPage' => $page,
            'totalPage' => ceil($count / $limit),
            'infoAcc' => $infoAcc,
            'search' => $search,
        ]);
    }



    public function editNhaXe($id)
    {
        $nhaxe = NhaXe::findOrFail($id);

        $phoneNos = is_array($nhaxe->phoneNo) ? $nhaxe->phoneNo : [];
        $addresses = is_array($nhaxe->address) ? $nhaxe->address : [];
        $mainRoutes = is_array($nhaxe->mainRoute) ? $nhaxe->mainRoute : [];

        $phongve = [];
        $maxCount = max(count($phoneNos), count($addresses), count($mainRoutes));
        for ($i = 0; $i < $maxCount; $i++) {
            $phongve[] = [
                'phoneNo' => $phoneNos[$i] ?? '',
                'address' => $addresses[$i] ?? '',
                'mainRoute' => $mainRoutes[$i] ?? '',
                'chontinh' => $this->getTinhThanh(),
            ];
        }

        $infoAcc = TaiKhoan::find(Session::get('user')->id);

        // Lấy danh sách tài khoản có isCarCompany = 1
        $carCompanyAccounts = TaiKhoan::where('isCarCompany', 1)->get();

        return view('admin.quanlychitietnhaxe', [
            'phongves' => $phongve,
            'infoAcc' => $infoAcc,
            'chitietnhaxe' => $nhaxe,
            'carCompanyAccounts' => $carCompanyAccounts,
        ]);
    }


    public function updateNhaXe(Request $request, $id)
    {
        $nhaxe = NhaXe::findOrFail($id);
        $files = $request->file('files', []);

        if ($request->checkavt === 'avt' && $request->checkjours === 'jour' && count($files) > 2) {
            $img_avatar = 'images/nhaxe/' . $files[0]->getClientOriginalName();
            $files[0]->move(public_path('images/nhaxe'), $files[0]->getClientOriginalName());

            $img_jours = [];
            for ($i = 1; $i < count($files); $i++) {
                $filename = $files[$i]->getClientOriginalName();
                $files[$i]->move(public_path('images/chuyenxe'), $filename);
                $img_jours[] = 'images/chuyenxe/' . $filename;
            }

            $nhaxe->imageCarCom = $img_avatar;
            $nhaxe->imageJours = $img_jours;
        } elseif ($request->checkavt === 'avt' && count($files) > 0) {
            $img_avatar = 'images/nhaxe/' . $files[0]->getClientOriginalName();
            $files[0]->move(public_path('images/nhaxe'), $files[0]->getClientOriginalName());
            $nhaxe->imageCarCom = $img_avatar;
        } elseif ($request->checkjours === 'jour' && count($files) > 0) {
            $img_jours = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('images/chuyenxe'), $filename);
                $img_jours[] = 'images/chuyenxe/' . $filename;
            }
            $nhaxe->imageJours = $img_jours;
        }
        $nhaxe->updatedAt = now();

        $nhaxe->fill([
            'name' => $request->name,
            'phoneNo' => is_array($request->phoneNo) ? $request->phoneNo : [],
            'address' => is_array($request->address) ? $request->address : [],
            'mainRoute' => is_array($request->mainRoute) ? $request->mainRoute : [],
            'description' => $request->description,
            'policy' => $request->policy,
            'managerId' => $request->managerId,
        ]);

        $nhaxe->save();

        return redirect('/dashboard/quanlynhaxe');
    }

    public function deleteNhaXe(Request $request)
    {
        $id = $request->id;

        // Tìm nhà xe theo ID
        $nhaXe = NhaXe::findOrFail($id);

        // Xóa các chuyến xe liên quan đến nhà xe
        foreach ($nhaXe->chuyenXes as $chuyenXe) {
            // Xóa vé đã đặt liên quan đến chuyến xe
            $chuyenXe->veDaDats()->delete();

            // Xóa chuyến xe
            $chuyenXe->delete();
        }

        // Xóa các đánh giá liên quan đến nhà xe
        $nhaXe->reviews()->delete();

        // Cuối cùng, xóa nhà xe
        $nhaXe->delete();

        // Xóa vé không liên kết với chuyến xe (nếu có)
        VeDaDat::whereNull('jourId')->delete();

        return redirect()->back()->with('success', 'Nhà xe và các chuyến xe liên quan đã được xóa!');
    }


    public function themNhaXe()
    {
        $infoAcc = TaiKhoan::find(Session::get('user')->id);

        // Lấy danh sách tài khoản có isCarCompany = 1
        $carCompanyAccounts = TaiKhoan::where('isCarCompany', 1)->get();

        return view('admin.themnhaxe', [
            'tinhThanh' => $this->getTinhThanh(),
            'infoAcc' => $infoAcc,
            'carCompanyAccounts' => $carCompanyAccounts,
        ]);
    }


    public function addNhaXe(Request $request)
    {
        $img_avatar = null;
        if ($request->hasFile('image')) {
            $img_avatar = 'images/nhaxe/' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/nhaxe'), $request->file('image')->getClientOriginalName());
        }

        $img_jours = [];
        if ($request->hasFile('imageJours')) {
            foreach ($request->file('imageJours') as $img) {
                $filename = 'images/chuyenxe/' . $img->getClientOriginalName();
                $img->move(public_path('images/chuyenxe'), $img->getClientOriginalName());
                $img_jours[] = $filename;
            }
        }


        NhaXe::create([
            'name' => $request->name,
            'phoneNo' => is_array($request->phoneNo) ? $request->phoneNo : [$request->phoneNo],
            'address' => is_array($request->address) ? $request->address : [$request->address],
            'mainRoute' => $request->mainRoute,
            'description' => $request->description,
            'policy' => $request->policy,
            'imageCarCom' => $img_avatar,
            'imageJours' => $img_jours,
            'managerId' => $request->managerId,
            'createdAt' => now(),
            'updatedAt' => now(),
        ]);

        return redirect('/dashboard/quanlynhaxe');
    }




    private function getTinhThanh()
    {
        return [
            ['name' => 'Hà Nội'],
            ['name' => 'Hồ Chí Minh'],
            ['name' => 'Hải Phòng'],
            ['name' => 'Đà Nẵng'],
            ['name' => 'Cần Thơ'],
            ['name' => 'An Giang'],
            ['name' => 'Bà Rịa - Vũng Tàu'],
            ['name' => 'Bắc Giang'],
            ['name' => 'Bắc Kạn'],
            ['name' => 'Bạc Liêu'],
            ['name' => 'Bắc Ninh'],
            ['name' => 'Bến Tre'],
            ['name' => 'Bình Dương'],
            ['name' => 'Bình Định'],
            ['name' => 'Bình Phước'],
            ['name' => 'Bình Thuận'],
            ['name' => 'Cà Mau'],
            ['name' => 'Cao Bằng'],
            ['name' => 'Đắk Lắk'],
            ['name' => 'Đắk Nông'],
            ['name' => 'Điện Biên'],
            ['name' => 'Đồng Nai'],
            ['name' => 'Đồng Tháp'],
            ['name' => 'Gia Lai'],
            ['name' => 'Hà Giang'],
            ['name' => 'Hà Nam'],
            ['name' => 'Hà Tĩnh'],
            ['name' => 'Hải Dương'],
            ['name' => 'Hậu Giang'],
            ['name' => 'Hòa Bình'],
            ['name' => 'Hưng Yên'],
            ['name' => 'Khánh Hòa'],
            ['name' => 'Kiên Giang'],
            ['name' => 'Kon Tum'],
            ['name' => 'Lai Châu'],
            ['name' => 'Lâm Đồng'],
            ['name' => 'Lạng Sơn'],
            ['name' => 'Lào Cai'],
            ['name' => 'Long An'],
            ['name' => 'Nam Định'],
            ['name' => 'Nghệ An'],
            ['name' => 'Ninh Bình'],
            ['name' => 'Ninh Thuận'],
            ['name' => 'Phú Thọ'],
            ['name' => 'Quảng Bình'],
            ['name' => 'Quảng Nam'],
            ['name' => 'Quảng Ngãi'],
            ['name' => 'Quảng Ninh'],
            ['name' => 'Quảng Trị'],
            ['name' => 'Sóc Trăng'],
            ['name' => 'Sơn La'],
            ['name' => 'Tây Ninh'],
            ['name' => 'Thái Bình'],
            ['name' => 'Thái Nguyên'],
            ['name' => 'Thanh Hóa'],
            ['name' => 'Thừa Thiên Huế'],
            ['name' => 'Tiền Giang'],
            ['name' => 'Trà Vinh'],
            ['name' => 'Tuyên Quang'],
            ['name' => 'Vĩnh Long'],
            ['name' => 'Vĩnh Phúc'],
            ['name' => 'Yên Bái'],
            ['name' => 'Phú Yên'],
        ];
    }

}
