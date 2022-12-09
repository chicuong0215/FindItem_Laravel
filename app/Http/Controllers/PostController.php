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
    public function dangBai()
    {
        return view('user.dang-bai');
    }

    public function xuLyDangBai(Request $request)
    {
        if(empty($request->title) || empty($request->content) || empty($request->address)){
            return redirect()->back()->with("error","Vui lòng nhập và chọn đầy đủ thông tin!");
        }else{
            if($request->hasFile('background'))
        {
            $files = $request->file('background');

            if($files->getClientOriginalName()!=null){
                $files->move('anhbaidang',$files->getClientOriginalName(),'public');
                $post=Posts::create([
                    'id_account'=>$request->username,
                    'id_type'=>$request->id_type,
                    'title'=>$request->title,
                    'content'=>$request->content,
                    'picture'=>$request->background->getClientOriginalName(),
                    'address'=>$request->address,

                ]);
                if(!empty($post)){
                    return redirect()->route('bai-dang-cua-ban');
                }
            }
        }else{
            $post=Posts::create([
                'id_account'=>$request->username,
                'id_type'=>$request->id_type,
                'title'=>$request->title,
                'content'=>$request->content,
                'picture'=>"null",
                'address'=>$request->address,

            ]);
            if(!empty($post)){
                return redirect()->route('bai-dang-cua-ban');
            }
        }

        return redirect()->route('bai-dang-cua-ban');
        }
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
        if(empty($request->title) || empty($request->content) || empty($request->address)){
            return redirect()->back()->with("error","Vui lòng nhập và chọn đầy đủ thông tin!");
        }else{
            if($request->hasFile('background'))
            {
                $files = $request->file('background');
                $files->move('anhbaidang',$files->getClientOriginalName(),'public');

                $update = Posts::where('id', '=', $request->id)->update(array('title' => $request->title,'content'=>$request->content,'address'=>$request->address, 'id_type'=>$request->id_type, 'picture'=>$request->background->getClientOriginalName()));
                if(!empty($post)){
                return redirect()->route('chi-tiet-bai-dang-cua-ban',['id'=> $request->id]);
                }
            }
            else{
                $update = Posts::where('id', '=', $request->id)->update(array('title' => $request->title,'content'=>$request->content,'address'=>$request->address, 'id_type'=>$request->id_type));
                if(!empty($post)){
                    return redirect()->route('chi-tiet-bai-dang-cua-ban',['id'=> $request->id]);
                }
            }

            return redirect()->route('chi-tiet-bai-dang-cua-ban',['id'=> $request->id]);
        }
    }

    public function chiTietBaiDang(Request $request){
        $post=Posts::where('id', '=', $request->id)->first();
        $comment=Comments::where('id_post', '=', $request->id)->get();
        return view('user.chi-tiet-bai-dang',['post'=>$post,'comment'=>$comment]);
    }

    public function chiTietBaiDang2(Request $request){
        $post=Posts::where('id', '=', $request->id)->first();
        $comment=Comments::where('id_post', '=', $request->id)->get();
        return view('user.chi-tiet-bai-dang-cua-ban',['post'=>$post,'comment'=>$comment]);
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

    //binh luan
    public function xuLyBinhLuan(Request $request){
        $comment=Comments::create(
            [
                'id_post'=>$request->id,
                'id_account'=>Auth::user()->id,
                'content'=>$request->content,
                'id_account_rep'=>-1
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
                'id_account'=>Auth::user()->id,
                'content'=>$request->content,
                'id_account_rep'=>$request->rep
            ]
        );
        if(!empty($comment)){
            return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
        }
        return redirect()->route('chi-tiet-bai-dang',['id'=>$request->id]);
    }


    //admin
    //bai dang
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

    public function chiTietBaiDangAdmin(Request $request){
        $post=Posts::where('id', '=', $request->id)->first();
        $comment=Comments::where('id_post', '=', $request->id)->get();
        return view('admin.chi-tiet-bai-dang',['post'=>$post,'comment'=>$comment]);
    }

    public function xoaTraLoi(Request $request){
        $result = Comments::where('id','=',$request->id)->delete();
        return redirect()->route('chi-tiet-bai-dang-admin',['id'=>$request->id_post]);
    }

    //thong bao
    public function dangBaiAdmin()
    {
        return view('admin.dang-bai');
    }

    public function xuLyDangBaiAdmin(Request $request){
        if(empty($request->content) || empty($request->background)){
            return redirect()->back()->with("error","Vui lòng nhập và chọn đầy đủ thông tin!");
        }else{
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
                return redirect()->route('thong-bao-admin');
            }
            return redirect()->route('thong-bao-admin');
        }

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
