@include('components.head')
<br />
<br />

<?php
try{
    $check =Auth::user()->id;
?>
<a href="{{route('profile')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>
<br />
<br />

<div class="profile" style="text-align:left;padding-left:5%">
    <img src="icons/image.png" class="icon-avatar" />
    <div>
        <h1>Họ tên: {{Auth::user()->fullname}}</h1>
        <h3>Ngày sinh: {{Auth::user()->birthday}}</h3>
        <h3>Giới tính: {{Auth::user()->sex==1?'Nam':'Nữ'}}</h3>
        <h3>Số điện thoại: {{Auth::user()->phone}}</h3>
        <h3>Địa chỉ: {{Auth::user()->address}}</h3>
        <a href="#"><button class="btn-feature" >Xóa tài khoản</button></a>
    </div>

    <a href="{{route('cap-nhat-thong-tin',['id'=>Auth::user()->username])}}"><button class="buy" style="margin-bottom: 10px">Cập nhật thông tin</button></a>
    <a href="{{route('doi-mat-khau')}}"><button class="add" style="margin-bottom: 10px">Đổi mật khẩu</button></a>
</div>
<?php
}catch(Exception $e){
?>
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
    <br/>   
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky')}}" id="technology" class="h1">Đăng Ký</a>
<a href="{{route('trang-chu-admin')}}" id="technology" class="h1">Đăng nhập với quyền quản trị viên</a>
<?php
}
?>