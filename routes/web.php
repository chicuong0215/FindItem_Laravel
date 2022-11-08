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
Route::get('/admin',[HomeController::class,'indexAdmin'])->name('trang-chu-admin');
Route::get('home-login',[HomeController::class,'index1'])->name('home-login');
Route::get('dang-nhap',[HomeController::class,'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('dang-nhap',[HomeController::class,'xuLyDangNhap'])->name('xl-dang-nhap')->middleware('guest');
Route::get('dang-ky',[HomeController::class,'dangKy'])->name('dang-ky')->middleware('guest');
Route::post('dang-ky',[HomeController::class,'xuLyDangKy'])->name('xl-dang-ky')->middleware('guest');
Route::get('dang-xuat',[HomeController::class,'dangXuat'])->name('dang-xuat')->middleware('auth');
Route::get('profile',[HomeController::class,'profile'])->name('profile');
Route::get('dang-bai',[BaiDangController::class,'create'])->name('dang-bai');
Route::post('dang-bai',[BaiDangController::class,'store'])->name('xl-dang-bai');
Route::get('chi-tiet-bai-dang',[BaiDangController::class,'edit'])->name('chi-tiet-bai-dang');
Route::get('bai-dang-cua-ban',[BaiDangController::class,'baiDangCuaBan'])->name('bai-dang-cua-ban');
Route::get('thong-bao',[HomeController::class,'thongBao'])->name('thong-bao');
Route::get('doi-mat-khau',[HomeController::class,'doiMatKhau'])->name('doi-mat-khau');
Route::post('doi-mat-khau',[HomeController::class,'xuLyDoiMatKhau'])->name('xl-doi-mat-khau');


Route::get('chinh-sua-bai-dang',[BaiDangController::class,'chinhSua'])->name('chinh-sua-bai-dang');

