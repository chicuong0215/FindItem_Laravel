<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuanTriVien;
use Illuminate\Support\Facades\Hash;
use App\Models\BaiDang;
use App\Models\QuanTam;
use App\Models\Notifications;
use App\Models\Comments;

class HomeController extends Controller
{   
    public function index(){
        $lsBaiDang=BaiDang::all();
        return view('user.trang-chu',compact('lsBaiDang'));
    }
    public function indexTimDo(){
        $lsBaiDang=BaiDang::where('id_type', '=', 'find')->get();
        return view('user.trang-chu',compact('lsBaiDang'));
    }
    public function indexNhatDo(){
        $lsBaiDang=BaiDang::where('id_type', '=', 'loss')->get();
        return view('user.trang-chu',compact('lsBaiDang'));
    }

    public function dangNhap(){
        return view('user.dang-nhap');
    }
    public function xuLyDangNhap(Request $request)
    {
        $tk = QuanTriVien::where('username', '=',$request->username)->first();
        if($tk['stt']==1){
            $lsBaiDang=BaiDang::all();
            $credentials=$request->only('username','password');
            if(Auth::attempt($credentials)){
                return redirect()->route('profile');
            }else{
                return redirect()->back()->with("error","Đăng nhập không thành công!");
            }
           
        }
        else{
            return redirect()->back()->with("error","Tài khoản đã bị xóa!");
        }
        
    }
    public function dangKy(){
        return view('user.dang-ky');
    }
    public function xuLyDangKy(Request $request)
    {
        if($request->hasFile('background'))
        {
            $files = $request->file('background');
            $files->move('anhavatar',$files->getClientOriginalName(),'public');
        }
        $taiKhoan=QuanTriVien::create([
            'username'=>$request->tai_khoan,
            'pass'=>Hash::make($request->mat_khau),
            'permission'=>'0',
            'fullname'=>$request->ho_ten,
            'sex'=>$request->sex,
            'phone'=>$request->dien_thoai,
            'picture'=>$request->background->getClientOriginalName(),
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
        return view('user.thong-tin-ca-nhan');
    }

    public function thongBao(){
        $thongBao = Notifications::all();
        return view('user.thong-bao',['thongBao'=>$thongBao]);
    }
    public function doiMatKhau(){
        return view('user.doi-mat-khau');
    }
    public function xuLyDoiMatKhau(Request $request){
        QuanTriVien::where('username', '=', $request->username)->update(array('pass' => Hash::make($request->new_pass)));
        Auth::logout();
       return redirect()->route('trang-chu');  
    }
    public function updateInfo(Request $request){
        $quanTriVien = QuanTriVien::where('username','=',$request->id)->first();
        return view('user.cap-nhat-thong-tin',['quanTriVien'=>$quanTriVien]);
    }
    public function processUpdateInfo(Request $request){
        if($request->hasFile('background'))
        {
            $files = $request->file('background');
            $files->move('anhavatar',$files->getClientOriginalName(),'public');
        }
        QuanTriVien::where('username', '=', $request->id)->update(array('fullname' => $request->fullname,'phone'=>$request->phone,'address'=>$request->address, 'picture'=>$request->background->getClientOriginalName()));
       return redirect()->route('profile');  
    }
    public function quanTam(Request $request){
        if(Auth::user()!=null){
        $lsPost = QuanTam::where('id_account', '=', Auth::user()->username);
        return view('user.quan-tam',['lsBaiDang'=>$lsPost]);
        }
        return view('user.quan-tam');
        
    }
    public function xuLyQuanTam(Request $request){
        $baiDang=BaiDang::where('id', '=', $request->id)->first();
        $quanTam=QuanTam::create([
            'id_account'=>$baiDang['id_account'],
            'id_post'=>$baiDang['id'],
        ]);
        if(!empty($quanTam)){
            return redirect()->route('trang-chu');
        }
        return redirect()->route('trang-chu');
    }
   






    
    //////////////////////////////////
    //admin
    public function indexAdmin(){
        $lsBaiDang=BaiDang::all();
        return view('admin.trang-chu',compact('lsBaiDang'));
    }
    public function dangNhapAdmin(){
        return view('admin.dang-nhap');
    }
    public function xuLyDangNhapAdmin(Request $request)
    {
        $lsBaiDang=BaiDang::all();
        $credentials=$request->only('username','password');
        $permisstion = QuanTriVien::where('username','=',$request->username)->first();
        if($permisstion!=null){
            if($permisstion['permission']=='1'){
                if(Auth::attempt($credentials)){
                    return redirect()->route('trang-chu-admin');
                }else{
                    return redirect()->back()->with("error","Đăng nhập không thành công!"); 
                }
            }
            return redirect()->back()->with("error","Đăng nhập không thành công!"); 
        }
        else{
            return redirect()->back()->with("error","Đăng nhập không thành công!"); 
        }
        
    }

    public function dangKyAdmin(){
        return view('admin.dang-ky');
    }
    public function xuLyDangKyAdmin(Request $request)
    {
        if($request->key=='admin123'){
            $taiKhoan=QuanTriVien::create([
                'username'=>$request->username,
                'pass'=>Hash::make($request->password),
                'permission'=>1,
                'fullname'=>'admin',
                'picture'=>'admin',
                'sex'=>'1',
                'phone'=>'1',
                'address'=>'1',
            ]);
            if(!empty($taiKhoan)){
                #quay về trang danh sách tin tức
                return redirect()->route('dang-nhap-admin');
            }
            #Thông báo thêm không thành công
            return "Thêm mới tài khoản không thành công";
        }else{
            return "Thêm mới tài khoản không thành công";
        }
        
    }
    public function dangXuatAdmin(){
       Auth::logout();
       return redirect()->route('trang-chu-admin');
    }
    public function profileAdmin(){
        return view('admin.thong-tin-ca-nhan');
    }

    public function doiMatKhauAdmin(){
        return view('admin.doi-mat-khau');
    }
    public function xuLyDoiMatKhauAdmin(Request $request){
        QuanTriVien::where('username', '=', $request->username)->update(array('pass' => Hash::make($request->new_pass)));
        Auth::logout();
       return redirect()->route('trang-chu-admin');  
    }
    public function pheDuyet(Request $request){
        
        $check =BaiDang::where('id', '=', $request->id)->first();
        if($check['active']==0){
            BaiDang::where('id', '=', $request->id)->update(array('active' => 1));
        }
        return redirect()->route('trang-chu-admin');
        
    }
    public function pheDuyet2(Request $request){
        
        $check =BaiDang::where('id', '=', $request->id)->first();
        if($check['active']==0){
            BaiDang::where('id', '=', $request->id)->update(array('active' => 1));
        }
        return redirect()->route('chi-tiet-bai-dang-admin',['id'=>$request->id]);
        
    }
    public function xoaTaiKhoan(Request $request){
        $check =QuanTriVien::where('username', '=', $request->id)->first();
        if($check['stt']==1){
            QuanTriVien::where('username', '=', $request->id)->update(array('stt' => 0));
        }else{
            QuanTriVien::where('username', '=', $request->id)->update(array('stt' => 1));
        }
        return redirect()->route('quan-ly-tai-khoan');
    }
    public function quanLyTaiKhoan(){
        $quanTriVien = QuanTriVien::all();
        return view('admin.quan-ly-tai-khoan',['arr'=>$quanTriVien]);
    }
    public function thongBaoAdmin(){
        $thongBao = Notifications::all();
        return view('admin.thong-bao',['thongBao'=>$thongBao]);
    }
    public function xoaThongBao(Request $request){
        $result = Notifications::where('id','=', $request->id)->delete();
        return redirect()->route('thong-bao-admin');
    }
}