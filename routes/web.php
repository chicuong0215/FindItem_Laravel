<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BaiDangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('trang-chu');
Route::get('nhat-do',[HomeController::class,'indexNhatDo'])->name('nhat-do');
Route::get('tim-do',[HomeController::class,'indexTimDo'])->name('tim-do');

Route::get('qt',[HomeController::class,'xuLyQuanTam'])->name('xl-quan-tam');

Route::get('dang-nhap',[HomeController::class,'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('dang-nhap',[HomeController::class,'xuLyDangNhap'])->name('xl-dang-nhap')->middleware('guest');

Route::get('dang-ky',[HomeController::class,'dangKy'])->name('dang-ky')->middleware('guest');
Route::post('dang-ky',[HomeController::class,'xuLyDangKy'])->name('xl-dang-ky')->middleware('guest');

Route::get('dang-xuat',[HomeController::class,'dangXuat'])->name('dang-xuat')->middleware('auth');

Route::get('cap-nhat-thong-tin',[HomeController::class,'updateInfo'])->name('cap-nhat-thong-tin');
Route::post('cap-nhat-thong-tin',[HomeController::class,'processUpdateInfo'])->name('xl-cap-nhat-thong-tin');

Route::get('quan-tam',[HomeController::class,'quanTam'])->name('quan-tam');

Route::get('profile',[HomeController::class,'profile'])->name('profile');

Route::get('dang-bai',[BaiDangController::class,'create'])->name('dang-bai');
Route::post('dang-bai',[BaiDangController::class,'store'])->name('xl-dang-bai');

Route::get('chi-tiet-bai-dang',[BaiDangController::class,'info'])->name('chi-tiet-bai-dang');
Route::get('chi-tiet-bai-dang-cua-ban',[BaiDangController::class,'info2'])->name('chi-tiet-bai-dang-cua-ban');

Route::get('bai-dang-cua-ban',[BaiDangController::class,'baiDangCuaBan'])->name('bai-dang-cua-ban');
Route::get('thong-bao',[HomeController::class,'thongBao'])->name('thong-bao');

Route::get('doi-mat-khau',[HomeController::class,'doiMatKhau'])->name('doi-mat-khau');
Route::post('doi-mat-khau',[HomeController::class,'xuLyDoiMatKhau'])->name('xl-doi-mat-khau');


Route::get('chinh-sua-bai-dang',[BaiDangController::class,'chinhSua'])->name('chinh-sua-bai-dang');
Route::post('chinh-sua-bai-dang',[BaiDangController::class,'xuLyChinhSua'])->name('xl-chinh-sua-bai-dang');



///////////////////////////////////////////////////////////////////////
//admin

Route::get('admin',[HomeController::class,'indexAdmin'])->name('trang-chu-admin');

Route::get('admin/dang-nhap',[HomeController::class,'dangNhapAdmin'])->name('dang-nhap-admin')->middleware('guest');
Route::post('admin/dang-nhap',[HomeController::class,'xuLyDangNhapAdmin'])->name('xl-dang-nhap-admin')->middleware('guest');

Route::get('admin/dang-ky',[HomeController::class,'dangKyAdmin'])->name('dang-ky-admin')->middleware('guest');
Route::post('admin/dang-ky',[HomeController::class,'xuLyDangKyAdmin'])->name('xl-dang-ky-admin')->middleware('guest');

Route::get('dang-xuat-admin',[HomeController::class,'dangXuatAdmin'])->name('dang-xuat-admin')->middleware('auth');

Route::get('admin/profile',[HomeController::class,'profileAdmin'])->name('profile-admin');

Route::get('admin/dang-bai',[BaiDangController::class,'create2'])->name('dang-bai-admin');
Route::post('admin/dang-bai',[BaiDangController::class,'store2'])->name('xl-dang-bai-admin');


Route::get('admin/quan-ly-tai-khoan',[HomeController::class,'quanLyTaiKhoan'])->name('quan-ly-tai-khoan');

Route::get('chi-tiet-bai-dang-admin',[BaiDangController::class,'infoAdmin'])->name('chi-tiet-bai-dang-admin');


Route::get('doi-mat-khau-admin',[HomeController::class,'doiMatKhauAdmin'])->name('doi-mat-khau-admin');
Route::post('doi-mat-khau-admin',[HomeController::class,'xuLyDoiMatKhauAdmin'])->name('xl-doi-mat-khau-admin');

Route::get('phe-duyet',[HomeController::class,'pheDuyet'])->name('phe-duyet');
Route::get('phe-duyet2',[HomeController::class,'pheDuyet2'])->name('phe-duyet-2');

Route::get('xoa-bai-dang',[BaiDangController::class,'xoaBaiDang'])->name('xoa-bai-dang');
Route::get('xoa-bai-dang-2',[BaiDangController::class,'xoaBaiDang2'])->name('xoa-bai-dang-2');


Route::get('xoa-tai-khoan',[HomeController::class,'xoaTaiKhoan'])->name('xoa-tai-khoan');