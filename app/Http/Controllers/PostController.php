<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Notifications;
use App\Models\Comments;
use App\Models\Accounts;
use Illuminate\Support\Facades\Auth;
use DateTime;

class PostController extends Controller
{
    public function index()
    {
        return view('user.dang-bai');
    }

    public function dangBai()
    {
        return view('user.dang-bai');
    }

    public function xuLyDangBai(Request $request)
    {
        $lsPost=Posts::all();
        $dt = new DateTime();
        $dt2 = $dt->format('dmY');
        if($request->hasFile('background'))
        {
            $files = $request->file('background');
            $files->move('anhbaidang',$files->getClientOriginalName(),'public');
        }
        $post=Posts::create([
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
        if(!empty($post)){
            #quay về trang danh sách tin tức
            // return view('trang-chu',compact('lsPost'));
            return redirect()->route('bai-dang-cua-ban');
        }
        #Thông báo thêm không thành công
        return redirect()->route('bai-dang-cua-ban');
    }

    public function edit(Request $request)
    {
        $post = Posts::all();
        return view('user.chi-tiet-bai-dang', ['post'=>$post]);
    }

    public function baiDangCuaBan(){
        $lsPost = Posts::all();
        return view('user.bai-dang-cua-ban', ['lsPost'=>$lsPost]);
    } 
    public function chinhSua(Request $request){
        $post = Posts::where('id','=',$request->id)->first();
        return view('user.chinh-sua-bai-dang',['post'=>$post]);
    }
    public function xuLyChinhSua(Request $request){
        Posts::where('id', '=', $request->id)->update(array('title' => $request->title,
    'content'=>$request->content,'address'=>$request->address));
       return redirect()->route('bai-dang-cua-ban');  
    }
    public function chiTietBaiDang(Request $request){
        $post=Posts::where('id', '=', $request->id)->first();
        $comment=Comments::where('id_post', '=', $request->id)->get();
        $taiKhoan=Accounts::all();
        return view('user.chi-tiet-bai-dang',['post'=>$post,'comment'=>$comment, 'taiKhoan'=>$taiKhoan]);
    }
    public function chiTietBaiDang2(Request $request){
        $post=Posts::where('id', '=', $request->id)->first();
        return view('user.chi-tiet-bai-dang-cua-ban',['post'=>$post]);
    }

    public function xoaBaiDang(Request $request){
        $check =Posts::where('id', '=', $request->id)->first();
        if($check['stt']==1){
            Posts::where('id', '=', $request->id)->update(array('stt' => 0));
        }else{
            Posts::where('id', '=', $request->id)->update(array('stt' => 1));
        }
        return redirect()->route('bai-dang-cua-ban');
    }
    public function xoaBaiDang2(Request $request){
        $check =Posts::where('id', '=', $request->id)->first();
        if($check['stt']==1){
            Posts::where('id', '=', $request->id)->update(array('stt' => 0));
        }else{
            Posts::where('id', '=', $request->id)->update(array('stt' => 1));
        }
        return redirect()->route('bai-dang-cua-ban',['id'=>$request->id]);
    }
    public function xuLyBinhLuan(Request $request){
        $comment=Comments::create(
            [
                'id_post'=>$request->id,
                'id_account'=>Auth::user()->username,
                'content'=>$request->content,
                'picture'=>'null',
                'id_account_rep'=>'null'
            ]
        );
        if(!empty($comment)){
            return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
        }
        return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
    }

    public function xuLyBinhLuanRep(Request $request){
        $comment=Comments::create(
            [
                'id_post'=>$request->id,
                'id_account'=>Auth::user()->username,
                'content'=>$request->content,
                'picture'=>'null',
                'id_account_rep'=>$request->rep
            ]
        );
        if(!empty($comment)){
            return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
        }
        return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
    }


    //admin
    public function xoaBaiDangAdmin(Request $request){
        $check =Posts::where('id', '=', $request->id)->first();
        if($check['stt']==1){
            Posts::where('id', '=', $request->id)->update(array('stt' => 0));
        }else{
            Posts::where('id', '=', $request->id)->update(array('stt' => 1));
        }
        return redirect()->route('trang-chu-admin');
    }
    public function xoaBaiDangAdmin2(Request $request){
        $check =Posts::where('id', '=', $request->id)->first();
        if($check['stt']==1){
            Posts::where('id', '=', $request->id)->update(array('stt' => 0));
        }else{
            Posts::where('id', '=', $request->id)->update(array('stt' => 1));
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
            // return view('trang-chu',compact('lsPost'));
            return redirect()->route('thong-bao-admin');
        }
        #Thông báo thêm không thành công
        return redirect()->route('thong-bao-admin');
    }
    public function chiTietBaiDangAdmin(Request $request){
        $post=Posts::where('id', '=', $request->id)->first();
        $comment=Comments::where('id_post', '=', $request->id)->get();
        $taiKhoan=Accounts::all();
        return view('admin.chi-tiet-bai-dang',['post'=>$post,'comment'=>$comment, 'taiKhoan'=>$taiKhoan]);
    }
    public function xoaTraLoi(Request $request){
        $result = Comments::where('id','=',$request->id)->delete();
        return redirect()->route('chi-tiet-bai-dang-admin',['id'=>$request->id_post]);
    }
}