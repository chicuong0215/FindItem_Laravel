<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

Route::get('/tim-kiem',[HomeController::class,'xuLyTimKiem'])->name('xl-tim-kiem');
Route::get('/tim-kiem-admin',[HomeController::class,'xuLyTimKiemAdmin'])->name('xl-tim-kiem-2');

Route::get('nhat-do',[HomeController::class,'indexNhatDo'])->name('nhat-do');
Route::get('tim-do',[HomeController::class,'indexTimDo'])->name('tim-do');

Route::get('qt',[HomeController::class,'xuLyQuanTam'])->name('xl-quan-tam');
Route::get('qt2',[HomeController::class,'xuLyQuanTam2'])->name('xl-quan-tam-2');

Route::get('dang-nhap',[HomeController::class,'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('dang-nhap',[HomeController::class,'xuLyDangNhap'])->name('xl-dang-nhap')->middleware('guest');

Route::get('dang-ky',[HomeController::class,'dangKy'])->name('dang-ky')->middleware('guest');
Route::post('dang-ky',[HomeController::class,'xuLyDangKy'])->name('xl-dang-ky')->middleware('guest');

Route::get('dang-xuat',[HomeController::class,'dangXuat'])->name('dang-xuat')->middleware('auth');

Route::get('cap-nhat-thong-tin',[HomeController::class,'capNhatThongTin'])->name('cap-nhat-thong-tin');
Route::post('cap-nhat-thong-tin',[HomeController::class,'xuLyCapNhatThongTin'])->name('xl-cap-nhat-thong-tin');

Route::get('quan-tam',[HomeController::class,'quanTam'])->name('quan-tam');

Route::get('thong-tin-ca-nhan',[HomeController::class,'thongTinCaNhan'])->name('thong-tin-ca-nhan');

Route::get('thong-tin-ca-nhan-2',[HomeController::class,'thongTinCaNhan2'])->name('thong-tin-ca-nhan-2');

Route::get('dang-bai',[PostController::class,'dangBai'])->name('dang-bai');
Route::post('dang-bai',[PostController::class,'xuLyDangBai'])->name('xl-dang-bai');

Route::get('chi-tiet-bai-dang',[PostController::class,'chiTietBaiDang'])->name('chi-tiet-bai-dang');
Route::get('chi-tiet-bai-dang-cua-ban',[PostController::class,'chiTietBaiDang2'])->name('chi-tiet-bai-dang-cua-ban');

Route::get('bai-dang-cua-ban',[PostController::class,'baiDangCuaBan'])->name('bai-dang-cua-ban');
Route::get('thong-bao',[HomeController::class,'thongBao'])->name('thong-bao');

Route::get('doi-mat-khau',[HomeController::class,'doiMatKhau'])->name('doi-mat-khau');
Route::post('doi-mat-khau',[HomeController::class,'xuLyDoiMatKhau'])->name('xl-doi-mat-khau');


Route::get('chinh-sua-bai-dang',[PostController::class,'chinhSua'])->name('chinh-sua-bai-dang');
Route::post('chinh-sua-bai-dang',[PostController::class,'xuLyChinhSua'])->name('xl-chinh-sua-bai-dang');

Route::get('xoa-bai-dang',[PostController::class,'xoaBaiDang'])->name('xoa-bai-dang');
Route::get('xoa-bai-dang-2',[PostController::class,'xoaBaiDang2'])->name('xoa-bai-dang-2');

Route::post('binh-luan',[PostController::class,'xuLyBinhLuan'])->name('xl-binh-luan');
Route::post('binh-luan-rep',[PostController::class,'xuLyBinhLuanRep'])->name('xl-binh-luan-rep');



///////////////////////////////////////////////////////////////////////
//admin

Route::get('admin',[HomeController::class,'indexAdmin'])->name('trang-chu-admin');

Route::get('admin/dang-nhap',[HomeController::class,'dangNhapAdmin'])->name('dang-nhap-admin')->middleware('guest');
Route::post('admin/dang-nhap',[HomeController::class,'xuLyDangNhapAdmin'])->name('xl-dang-nhap-admin')->middleware('guest');

Route::get('admin/dang-ky',[HomeController::class,'dangKyAdmin'])->name('dang-ky-admin')->middleware('guest');
Route::post('admin/dang-ky',[HomeController::class,'xuLyDangKyAdmin'])->name('xl-dang-ky-admin')->middleware('guest');

Route::get('admin/dang-xuat',[HomeController::class,'dangXuatAdmin'])->name('dang-xuat-admin')->middleware('auth');

Route::get('admin/thong-tin-tai-khoan',[HomeController::class,'profileAdmin'])->name('profile-admin');



Route::get('admin/quan-ly-tai-khoan',[HomeController::class,'quanLyTaiKhoan'])->name('quan-ly-tai-khoan');



Route::get('admin/doi-mat-khau',[HomeController::class,'doiMatKhauAdmin'])->name('doi-mat-khau-admin');
Route::post('admin/doi-mat-khau',[HomeController::class,'xuLyDoiMatKhauAdmin'])->name('xl-doi-mat-khau-admin');

Route::get('admin/phe-duyet',[HomeController::class,'pheDuyet'])->name('phe-duyet');
Route::get('admin/phe-duyet2',[HomeController::class,'pheDuyet2'])->name('phe-duyet-2');

Route::get('admin/xoa-tai-khoan',[HomeController::class,'xoaTaiKhoan'])->name('xoa-tai-khoan');

Route::get('admin/dang-bai',[PostController::class,'dangBaiAdmin'])->name('dang-bai-admin');
Route::post('admin/dang-bai',[PostController::class,'xuLyDangBaiAdmin'])->name('xl-dang-bai-admin');

Route::get('admin/xoa-bai-dang-admin',[PostController::class,'xoaBaiDangAdmin'])->name('xoa-bai-dang-admin');
Route::get('admin/xoa-bai-dang-admin-2',[PostController::class,'xoaBaiDangAdmin2'])->name('xoa-bai-dang-admin-2');

Route::get('admin/chi-tiet-bai-dang',[PostController::class,'chiTietBaiDangAdmin'])->name('chi-tiet-bai-dang-admin');
Route::get('admin/thong-bao',[PostController::class,'thongBaoAdmin'])->name('thong-bao-admin');

Route::get('admin/xoa-thong-bao',[PostController::class,'xoaThongBao'])->name('xoa-thong-bao');

Route::get('admin/xoa-tra-loi',[PostController::class,'xoaTraLoi'])->name('xoa-tra-loi');
