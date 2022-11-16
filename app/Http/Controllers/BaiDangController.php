<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiDang;
use App\Models\Notifications;
use App\Models\Comments;
use App\Models\QuanTriVien;
use Illuminate\Support\Facades\Auth;
use DateTime;

class BaiDangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dang-bai');
    }

    /**s
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dangBai()
    {
        return view('user.dang-bai');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function xuLyDangBai(Request $request)
    {
        $lsBaiDang=BaiDang::all();
        $dt = new DateTime();
        $dt2 = $dt->format('dmY');
        if($request->hasFile('background'))
        {
            $files = $request->file('background');
            $files->move('anhbaidang',$files->getClientOriginalName(),'public');
        }
        $baiDang=BaiDang::create([
            'id'=>"acc_".$dt2,
            'id_post'=>"acc_".$dt2,
            'id_account'=>$request->username,
            'id_type'=>$request->id_type,
            'id_object'=>$request->title,
            'title'=>$request->title,
            'content'=>$request->content,   
            'picture'=>$request->background->getClientOriginalName(),
            'address'=>$request->address,
           
        ]);
        if(!empty($baiDang)){
            #quay về trang danh sách tin tức
            // return view('trang-chu',compact('lsBaiDang'));
            return redirect()->route('bai-dang-cua-ban');
        }
        #Thông báo thêm không thành công
        return redirect()->route('bai-dang-cua-ban');
    }

    public function edit(Request $request)
    {
        $baiDang = BaiDang::all();
        return view('user.chi-tiet-bai-dang', ['baiDang'=>$baiDang]);
    }


    public function baiDangCuaBan(){
        $lsBaiDang = BaiDang::all();
        return view('user.bai-dang-cua-ban', ['lsBaiDang'=>$lsBaiDang]);
    } 
    public function chinhSua(Request $request){
        $baiDang = BaiDang::where('id','=',$request->id)->first();
        return view('user.chinh-sua-bai-dang',['baiDang'=>$baiDang]);
    }
    public function xuLyChinhSua(Request $request){
        BaiDang::where('id', '=', $request->id)->update(array('title' => $request->title,
    'content'=>$request->content,'address'=>$request->address));
       return redirect()->route('bai-dang-cua-ban');  
    }
    public function chiTietBaiDang(Request $request){
        $baiDang=BaiDang::where('id', '=', $request->id)->first();
        $binhLuan=Comments::where('id_post', '=', $request->id)->get();
        $taiKhoan=QuanTriVien::all();
        return view('user.chi-tiet-bai-dang',['baiDang'=>$baiDang,'binhLuan'=>$binhLuan, 'taiKhoan'=>$taiKhoan]);
    }
    public function chiTietBaiDang2(Request $request){
        $baiDang=BaiDang::where('id', '=', $request->id)->first();
        return view('user.chi-tiet-bai-dang-cua-ban',['baiDang'=>$baiDang]);
    }

    public function xoaBaiDang(Request $request){
        $check =BaiDang::where('id', '=', $request->id)->first();
        if($check['stt']==1){
            BaiDang::where('id', '=', $request->id)->update(array('stt' => 0));
        }else{
            BaiDang::where('id', '=', $request->id)->update(array('stt' => 1));
        }
        return redirect()->route('bai-dang-cua-ban');
    }
    public function xoaBaiDang2(Request $request){
        $check =BaiDang::where('id', '=', $request->id)->first();
        if($check['stt']==1){
            BaiDang::where('id', '=', $request->id)->update(array('stt' => 0));
        }else{
            BaiDang::where('id', '=', $request->id)->update(array('stt' => 1));
        }
        return redirect()->route('bai-dang-cua-ban',['id'=>$request->id]);
    }
    public function xuLyBinhLuan(Request $request){
        $binhLuan=Comments::create(
            [
                'id_post'=>$request->id,
                'id_account'=>Auth::user()->username,
                'content'=>$request->content,
                'picture'=>'null',
                'id_account_rep'=>'null'
            ]
        );
        if(!empty($binhLuan)){
            return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
        }
        return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
    }

    public function xuLyBinhLuanRep(Request $request){
        $binhLuan=Comments::create(
            [
                'id_post'=>$request->id,
                'id_account'=>Auth::user()->username,
                'content'=>$request->content,
                'picture'=>'null',
                'id_account_rep'=>$request->rep
            ]
        );
        if(!empty($binhLuan)){
            return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
        }
        return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
    }



    //admin
    public function xoaBaiDangAdmin(Request $request){
        $check =BaiDang::where('id', '=', $request->id)->first();
        if($check['stt']==1){
            BaiDang::where('id', '=', $request->id)->update(array('stt' => 0));
        }else{
            BaiDang::where('id', '=', $request->id)->update(array('stt' => 1));
        }
        return redirect()->route('trang-chu-admin');
    }
    public function xoaBaiDangAdmin2(Request $request){
        $check =BaiDang::where('id', '=', $request->id)->first();
        if($check['stt']==1){
            BaiDang::where('id', '=', $request->id)->update(array('stt' => 0));
        }else{
            BaiDang::where('id', '=', $request->id)->update(array('stt' => 1));
        }
        return redirect()->route('chi-tiet-bai-dang-admin',['id'=>$request->id]);
    }

    
    public function dangBaiAdmin()
    {
        return view('admin.dang-bai');
    }
    public function xuLyDangBaiAdmin(Request $request){
        if($request->hasFile('background'))
        {
            $files = $request->file('background');
            $files->move('anhthongbao',$files->getClientOriginalName(),'public');
        }
        $thongBao=Notifications::create([
            'content'=>$request->content,
            'picture'=>$request->background->getClientOriginalName(),
        ]);
        if(!empty($thongBao)){
            #quay về trang danh sách tin tức
            // return view('trang-chu',compact('lsBaiDang'));
            return redirect()->route('thong-bao-admin');
        }
        #Thông báo thêm không thành công
        return redirect()->route('thong-bao-admin');
    }
    public function chiTietBaiDangAdmin(Request $request){
        $baiDang=BaiDang::where('id', '=', $request->id)->first();
        $binhLuan=Comments::where('id_post', '=', $request->id)->get();
        $taiKhoan=QuanTriVien::all();
        return view('admin.chi-tiet-bai-dang',['baiDang'=>$baiDang,'binhLuan'=>$binhLuan, 'taiKhoan'=>$taiKhoan]);
    }
    public function xoaTraLoi(Request $request){
        $result = Comments::where('id','=',$request->id)->delete();
        return redirect()->route('chi-tiet-bai-dang-admin',['id'=>$request->id_post]);
    }
}