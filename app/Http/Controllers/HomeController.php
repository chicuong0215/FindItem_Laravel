<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuanTriVien;
use Illuminate\Support\Facades\Hash;
use App\Models\BaiDang;

class HomeController extends Controller
{   
    public function index(){
        $lsBaiDang=BaiDang::all();
        return view('trang-chu',compact('lsBaiDang'));
    }
    public function indexAdmin(){
        $lsBaiDang=BaiDang::all();
        return view('trang-chu-admin',compact('lsBaiDang'));
    }
    public function index1(){
        $lsBaiDang=BaiDang::all();
        return view('home-login',compact('lsBaiDang'));
    }
    public function dangNhap(){
        return view('dang-nhap');
    }
    public function xuLyDangNhap(Request $request)
    {
        $lsBaiDang=BaiDang::all();
        $credentials=$request->only('id','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('profile');
        }
        return redirect()->back()->with("error","Đăng nhập không thành công!");
    }
    public function dangKy(){
        return view('dang-ky');
    }
    public function xuLyDangKy(Request $request)
    {
        $taiKhoan=QuanTriVien::create([
            'id'=>$request->tai_khoan,
            'username'=>$request->tai_khoan,
            'pass'=>Hash::make($request->mat_khau),
            'fullname'=>$request->ho_ten,
            'sex'=>$request->sex,
            'phone'=>$request->dien_thoai,
            'birthday'=>$request->birthday,
            'address'=>$request->address,
        ]);
        if(!empty($taiKhoan)){
            #quay về trang danh sách tin tức
            return redirect()->route('dang-nhap');
        }
        #Thông báo thêm không thành công
        return "Thêm mới tài khoản không thành công";
    }
    public function dangXuat(){
       Auth::logout();
       return redirect()->route('trang-chu');
    }
    public function profile(){
        return view('thong-tin-ca-nhan');
    }
   
    public function thongBao(){
        return view('thong-bao');
    }
    public function doiMatKhau(){
        return view('doi-mat-khau');
    }
    public function xuLyDoiMatKhau(Request $request){
        QuanTriVien::where('username', '=', $request->username)->update(array('pass' => Hash::make($request->new_pass)));
        Auth::logout();
       return redirect()->route('trang-chu');  
    }
}