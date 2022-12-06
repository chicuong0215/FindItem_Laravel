<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounts;
use Illuminate\Support\Facades\Hash;
use App\Models\Posts;
use App\Models\Cares;
use App\Models\Notifications;
use App\Models\Comments;

class HomeController extends Controller
{
    public function index(Request $request){
        $lsPost=Posts::where('active','=',1)->where('stt','=',1)->paginate(3);
        return view('user.trang-chu',['lsPost'=>$lsPost,'page'=>$request->page]);
    }

    public function indexTimDo(){
        $lsPost=Posts::where('id_type', '=', 'find')->where('active','=',1)->where('stt','=',1)->paginate(3);
        return view('user.tim-do',compact('lsPost'));
    }

    public function indexNhatDo(){
        $lsPost=Posts::where('id_type', '=', 'loss')->where('active','=',1)->where('stt','=',1)->paginate(3);
        return view('user.nhat-do',compact('lsPost'));
    }

    public function dangNhap(){
        return view('user.dang-nhap');
    }

    public function xuLyDangNhap(Request $request)
    {
        if(Accounts::where('username', '=',$request->username)->where('stt','=','1')->first()!=NULL){
                $credentials=$request->only('username','password');
                if(Auth::attempt($credentials)){
                    return redirect()->route('thong-tin-ca-nhan');
                }else{
                    return redirect()->back()->with("error","Đăng nhập không thành công!");
                }
        }else{
            return redirect()->back()->with("error","Tài khoản không tồn tại trên hệ thống!");
        }
        
    }

    public function dangKy(){
        return view('user.dang-ky');
    }

    public function xuLyDangKy(Request $request)
    {
        if(Accounts::where('username', '=',$request->username)->first()!=NULL){
            if($request->hasFile('background'))
            {
                $files = $request->file('background');
                $files->move('anhavatar',$files->getClientOriginalName(),'public');
            }
            $taiKhoan=Accounts::create([
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
                return redirect()->route('dang-nhap');
            }
            return "Thêm mới tài khoản không thành công";
        }else{
            return redirect()->back()->with("error","Tài khoản đã tồn tại!");
        }
        
    }

    public function dangXuat(){
       Auth::logout();
       return redirect()->route('trang-chu');
    }

    public function thongTinCaNhan(){
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
        Accounts::where('username', '=', $request->username)->update(array('pass' => Hash::make($request->new_pass)));
        Auth::logout();
       return redirect()->route('trang-chu');  
    }

    public function capNhatThongTin(Request $request){
        $account = Accounts::where('username','=',$request->id)->first();
        return view('user.cap-nhat-thong-tin',['account'=>$account]);
    }

    public function xuLyCapNhatThongTin(Request $request){
        if($request->hasFile('background'))
        {
            $files = $request->file('background');
            $files->move('anhavatar',$files->getClientOriginalName(),'public');
        }
        Accounts::where('username', '=', $request->id)->update(array('fullname' => $request->fullname,'phone'=>$request->phone,'address'=>$request->address, 'picture'=>$request->background->getClientOriginalName()));
       return redirect()->route('thong-tin-ca-nhan');  
    }

    public function quanTam(Request $request){
        if(Auth::user()!=null){
        $lsPost = Cares::where('id_account', '=', Auth::user()->username);
        return view('user.quan-tam',['lsPost'=>$lsPost]);
        }
        return view('user.quan-tam');
        
    }

    public function xuLyQuanTam(Request $request){
        $post=Posts::where('id', '=', $request->id)->first();
        $quanTam=Cares::create([
            'id_account'=>$post['id_account'],
            'id_post'=>$post['id'],
        ]);
        if(!empty($quanTam)){
            return redirect()->route('trang-chu');
        }
        return redirect()->route('trang-chu');
    }
    
    //////////////////////////////////
    //admin
    public function indexAdmin(){
        $lsPost=Posts::all();
        return view('admin.trang-chu',compact('lsPost'));
    }

    public function dangNhapAdmin(){
        return view('admin.dang-nhap');
    }

    public function xuLyDangNhapAdmin(Request $request)
    {
        $lsPost=Posts::all();
        $credentials=$request->only('username','password');
        $permisstion = Accounts::where('username','=',$request->username)->first();
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
            $taiKhoan=Accounts::create([
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
        Accounts::where('username', '=', $request->username)->update(array('pass' => Hash::make($request->new_pass)));
        Auth::logout();
       return redirect()->route('trang-chu-admin');  
    }

    public function pheDuyet(Request $request){
        
        $check =Posts::where('id', '=', $request->id)->first();
        if($check['active']==0){
            Posts::where('id', '=', $request->id)->update(array('active' => 1));
        }
        return redirect()->route('trang-chu-admin');
    }

    public function pheDuyet2(Request $request){
        $check =Posts::where('id', '=', $request->id)->first();
        if($check['active']==0){
            Posts::where('id', '=', $request->id)->update(array('active' => 1));
        }
        return redirect()->route('chi-tiet-bai-dang-admin',['id'=>$request->id]);
    }

    public function xoaTaiKhoan(Request $request){
        $check =Accounts::where('username', '=', $request->id)->first();
        if($check['stt']==1){
            Accounts::where('username', '=', $request->id)->update(array('stt' => 0));
        }else{
            Accounts::where('username', '=', $request->id)->update(array('stt' => 1));
        }
        return redirect()->route('quan-ly-tai-khoan');
    }

    public function quanLyTaiKhoan(){
        $account = Accounts::all();
        return view('admin.quan-ly-tai-khoan',['arr'=>$account]);
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