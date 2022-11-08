<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiDang;
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
        return view('dang-bai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dang-bai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lsBaiDang=BaiDang::all();
        $dt = new DateTime();
        $dt2 = $dt->format('dmY');
        $baiDang=BaiDang::create([
            'id'=>"acc_".$dt2,
            'id_post'=>"acc_".$dt2,
            'id_account'=>$request->username,
            'id_type'=>$request->id_type,
            'id_object'=>$request->title,
            'title'=>$request->title,
            'content'=>$request->content,   
            'picture'=>$request->title,
            'address'=>$request->address,
        ]);
        if(!empty($baiDang)){
            #quay về trang danh sách tin tức
            // return view('trang-chu',compact('lsBaiDang'));
            return redirect()->route('trang-chu');
        }
        #Thông báo thêm không thành công
        return redirect()->route('trang-chu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$baiDang=BaiDang::find($id);
        return view('chi-tiet-bai-dang',compact('baiDang'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile(){
        return view('chi-tiet-bai-dang');
    }
    public function edit(Request $request)
    {
        $baiDang = BaiDang::all();
        return view('chi-tiet-bai-dang', ['baiDang'=>$baiDang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function baiDangCuaBan(){
        $lsBaiDang = BaiDang::all();
        return view('bai-dang-cua-ban', ['lsBaiDang'=>$lsBaiDang]);
    } 
    public function chinhSua(){
        return view('chinh-sua-bai-dang');
    }
}