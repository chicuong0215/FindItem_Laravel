<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounts;
use Illuminate\Support\Facades\Hash;
use App\Models\Posts;
use App\Models\Message;
use App\Models\Cares;
use App\Models\Notifications;
use App\Models\Comments;

class HomeController extends Controller
{
    public function index(Request $request){
        if(Auth::user()!=null){
            if(Auth::user()->permission==1){
                Auth::logout();
                return redirect()->route('trang-chu');
            }
        }
        $lsPost=Posts::where('active','=',1)->where('stt','=',1)->paginate(5);
        return view('user.trang-chu',['lsPost'=>$lsPost,'page'=>$request->page]);
    }
    public function xuLyTimKiem(Request $request){
        if($request->search!=null){
            $lsPost=Posts::where('title','=',$request->search)->where('active','=',1)->where('stt','=',1)->paginate(5);
            return view('user.trang-chu',['lsPost'=>$lsPost,'page'=>$request->page]);
        }else{
            $lsPost=Posts::where('active','=',1)->where('stt','=',1)->paginate(5);
            return view('user.trang-chu',['lsPost'=>$lsPost,'page'=>$request->page]);
        }

    }
    public function xuLyTimKiemAdmin(Request $request){
        if($request->search!=null){
            $lsPost=Posts::where('title','=',$request->search)->get();
            return view('admin.trang-chu',['lsPost'=>$lsPost]);
        }else{
            $lsPost=Posts::all();
            return view('admin.trang-chu',['lsPost'=>$lsPost]);
        }

    }

    public function indexTimDo(){
        $lsPost = Posts::where([
            'type_id'=> 1,
            'active'=> 1,
            'stt' => 1
        ])->paginate(3);
        return view('user.tim-do',compact('lsPost'));
    }

    public function indexNhatDo(){
        $lsPost=Posts::where('type_id', '=', '0')->where('active','=',1)->where('stt','=',1)->paginate(3);
        return view('user.nhat-do',compact('lsPost'));
    }

    public function dangNhap(){
        return view('user.dang-nhap');
    }

    public function xuLyDangNhap(Request $request)
    {
        if(empty($request->username) || empty($request->password)){
            return redirect()->back()->with("error","Nhập đầy đủ thông tin!");
        }else{
            $account = Accounts::where('username', '=',$request->username)->where('stt','=','1')->where('permission','=','0')->first();

            if($account!=null){

                if($account['active']==0){
                    return redirect()->back()->with("error","Tài khoản chưa được kích hoạt!");
                }

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

    }

    public function dangKy(){
        return view('user.dang-ky');
    }

    public function xuLyDangKy(Request $request)
    {
        if(empty($request->tai_khoan)||
        empty($request->ho_ten) ||
        empty($request->mat_khau)||
        empty($request->re_password||
        empty($request->dien_thoai)||
        empty($request->birthday)||
        empty($request->sex)||
        empty($request->address))){
            return redirect()->back()->with("error","Vui lòng nhập và chọn đầy đủ thông tin!");
        }else{
            if($request->mat_khau != $request->re_password){
                return redirect()->back()->with("error","Mật khẩu nhập lại không đúng!");
            }else{
                if($request->hasFile('background'))
            {
                $files = $request->file('background');

                if($files->getClientOriginalName()!=null){
                    $files->move('anhavatar',$files->getClientOriginalName(),'public');

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
                }
                return redirect()->back()->with("error","Vui lòng nhập và chọn đầy đủ thông tin!");
            }
            return redirect()->back()->with("error","Vui lòng nhập và chọn đầy đủ thông tin!");
            }
        }

    }

    public function dangXuat(){
       Auth::logout();
       return redirect()->route('trang-chu');
    }

    public function thongTinCaNhan(){
        return view('user.thong-tin-ca-nhan');
    }
    public function thongTinCaNhan2(Request $request){
        $account = Accounts::where('id', '=', $request->id)->first();
        return view('user.thong-tin-ca-nhan-2',['account'=>$account]);
    }

    public function thongBao(){
        $thongBao = Notifications::all();
        return view('user.thong-bao',['thongBao'=>$thongBao]);
    }

    public function doiMatKhau(){
        return view('user.doi-mat-khau');
    }

    public function xuLyDoiMatKhau(Request $request){
        if(empty($request->password) || empty($request->new_password) || empty($request->renew_password) ){
            return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin!');
        }
        else{
            if($request->new_password != $request->renew_password){
                return redirect()->back()->with('error','Mật khẩu nhập lại không đúng!');
            }else{
                $account = Accounts::where('id', '=', Auth::user()->id)->first();

                $check = Hash::check($request->password, $account['pass']);
                if($check){
                    $result = Accounts::where('id', '=', Auth::user()->id)->update([
                        'pass'=> Hash::make($request->new_password)
                    ]);
                    if(!empty($result)){
                        return redirect()->route('thong-tin-ca-nhan');
                    }
                    return redirect()->route('thong-tin-ca-nhan');
                }else{
                    return redirect()->back()->with('error', 'Mật khẩu cũ không đúng!');
                }
            }
        }
    }

    public function capNhatThongTin(Request $request){
        $account = Accounts::where('id','=',$request->id)->first();
        return view('user.cap-nhat-thong-tin',['account'=>$account]);
    }

    public function xuLyCapNhatThongTin(Request $request){
        if(empty($request->ho_ten)||
        empty($request->phone)||
        empty($request->birthday)||
        empty($request->address)){
            return redirect()->back()->with("error","Vui lòng nhập và chọn đầy đủ thông tin!");
        }
        else{
            if($request->hasFile('background'))
            {
                $files = $request->file('background');

                if($files->getClientOriginalName()!=null){
                    $files->move('anhavatar',$files->getClientOriginalName(),'public');

                    Accounts::where('username', '=', $request->id)->update(
                        array('fullname' => $request->ho_ten,
                        'phone'=>$request->phone,
                        'birthday'=>$request->birthday,
                        'address'=>$request->address,
                        'sex'=>$request->sex,
                        'picture'=>$request->background->getClientOriginalName())
                    );
                    return redirect()->route('thong-tin-ca-nhan');
                }
            }else{
                Accounts::where('username', '=', $request->id)->update(
                    array('fullname' => $request->ho_ten,
                    'phone'=>$request->phone,
                    'birthday'=>$request->birthday,
                    'address'=>$request->address,
                    'sex'=>$request->sex)
                );
                return redirect()->route('thong-tin-ca-nhan');
            }

        }

    }

    public function quanTam(Request $request){
        if(Auth::user()!=null){
        $lsCare = Cares::where('account_id', '=', Auth::user()->id)->where('stt','=',1)->get();
        return view('user.quan-tam',['lsCare'=>$lsCare]);
        }
        return view('user.quan-tam');
    }

    public function xuLyQuanTam(Request $request){
        $check = Cares::where('post_id','=', $request->id)->where('account_id','=', Auth::user()->id)->first();
        if($check==null){
            $quanTam=Cares::create([
                'account_id'=>Auth::user()->id,
                'post_id'=>$request->id,
            ]);
            if(!empty($quanTam)){
                return redirect()->route('trang-chu');
            }
            return redirect()->route('trang-chu');
        }else{
            if($check['stt']==1){
                Cares::where('post_id','=', $request->id)->where('account_id','=', Auth::user()->id)->update(
                    array('stt'=> 0)
                );
            }else{
                Cares::where('post_id','=', $request->id)->where('account_id','=', Auth::user()->id)->update(
                    array('stt'=> 1)
                );
            }
            return redirect()->route('trang-chu');
        }

    }
    public function xuLyQuanTam2(Request $request){
        $check = Cares::where('post_id','=', $request->id)->where('account_id','=', Auth::user()->id)->first();
        if($check==null){
            $quanTam=Cares::create([
                'account_id'=>Auth::user()->id,
                'post_id'=>$request->id,
            ]);
            if(!empty($quanTam)){
                return redirect()->route('quan-tam');
            }
            return redirect()->route('quan-tam');
        }else{
            if($check['stt']==1){
                Cares::where('post_id','=', $request->id)->where('account_id','=', Auth::user()->id)->update(
                    array('stt'=> 0)
                );
            }else{
                Cares::where('post_id','=', $request->id)->where('account_id','=', Auth::user()->id)->update(
                    array('stt'=> 1)
                );
            }
            return redirect()->route('quan-tam');
        }

    }
    public function nhanTin(Request $request){
        $account = Accounts::where('id', '=', $request->id)->first();

        return view('user.nhan-tin',['lsMessage'=>$lsMessage, 'account'=>$account]);
    }
    public function xuLyNhanTin(Request $request){
        $acc1=Auth::user()->id;
        $acc2=$request->$request->id;
        $key = $acc1+$acc2;

        $check = Message::where('key',$key);
        if($check){
            dd("true");
        }else{
            dd('false');
        }
        // $result = Message::create([
        //     'account_id'=>$request->account1,
        //     'account_2_id'=>$request->account2,
        //     'content'=>$request->message,
        //     'content_2'=>''
        // ]);

        // if(!empty($result)){
        //     return redirect()->route('nhan-tin',['id'=>$request->account2]);
        // }
        // return redirect()->route('nhan-tin',['id', $request->account2]);
    }





    //////////////////////////////////
    //admin
    //////////////////////////////////

    public function indexAdmin(){
        if(Auth::user()!=null){
            if(Auth::user()->permission==0){
                Auth::logout();
                return redirect()->route('trang-chu-admin');
            }
        }
        $lsPost=Posts::all();
        return view('admin.trang-chu',compact('lsPost'));
    }

    public function dangNhapAdmin(){
        return view('admin.dang-nhap');
    }

    public function xuLyDangNhapAdmin(Request $request)
    {
        if(empty($request->username) || empty($request->password)){
            return redirect()->back()->with("error","Nhập đầy đủ thông tin!");
        }
        else{
            $account = Accounts::where('username','=',$request->username)->where('permission', '=', '1')->first();
            if($account!=null){
                $credentials=$request->only('username','password');
                if(Auth::attempt($credentials)){
                    return redirect()->route('trang-chu-admin');
                }else{
                    return redirect()->back()->with("error","Đăng nhập không thành công!");
                }
            }
            else{
                return redirect()->back()->with("error","Tài khoản không tồn tại trên hệ thống!");
            }
        }

    }

    public function dangKyAdmin(){
        return view('admin.dang-ky');
    }

    public function xuLyDangKyAdmin(Request $request)
    {
        if(
        empty($request->username)||
        empty($request->key)||
        empty($request->password)||
        empty($request->re_password)){
            return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin!');
        }else{
            if($request->key=='admin123'){
                if($request->password != $request->re_password){
                    return redirect()->back()->with('error', 'Mật khẩu nhập lại không đúng!');
                }else{
                    $taiKhoan=Accounts::create([
                        'username'=>$request->username,
                        'pass'=>Hash::make($request->password),
                        'permission'=>1,
                        'fullname'=>'admin',
                        'picture'=>'admin',
                        'sex'=>'1',
                        'phone'=>'1',
                        'address'=>'1',
                        'active'=>1
                    ]);
                    if(!empty($taiKhoan)){
                        return redirect()->route('dang-nhap-admin');
                    }
                }
            }else{
                return redirect()->back()->with('error', 'Sai key');
            }
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
        if(empty($request->password) || empty($request->new_password) || empty($request->renew_password) ){
            return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin!');
        }
        else{
            if($request->new_password != $request->renew_password){
                return redirect()->back()->with('error','Mật khẩu nhập lại không đúng!');
            }else{
                $account = Accounts::where('id', '=', Auth::user()->id)->first();

                $check = Hash::check($request->password, $account['pass']);
                if($check){
                    $result = Accounts::where('id', '=', Auth::user()->id)->update([
                        'pass'=> Hash::make($request->new_password)
                    ]);
                    if(!empty($result)){
                        return redirect()->route('profile-admin');
                    }
                    return redirect()->route('profile-admin');
                }else{
                    return redirect()->back()->with('error', 'Mật khẩu cũ không đúng!');
                }
            }
        }
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
    public function xuLyKichHoatTaiKhoan(Request $request){
        $result = Accounts::where('id','=',$request->id)
        ->update(
            [
                'active'=>1
            ]
        );
        if(!empty($result)){
            return redirect()->route('quan-ly-tai-khoan');
        }
        return redirect()->route('quan-ly-tai-khoan');
    }

}
