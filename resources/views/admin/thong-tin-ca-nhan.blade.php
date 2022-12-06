@include('components.head-admin')
<br />
<br />

@if(Auth::user())
<a href="{{route('profile-admin')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat-admin')}}" id="technology" class="h1">Thoát</a>

<br />
<br />

<div class="profile" style="text-align:left;padding-left:5%">
    <img src="/icons/image.png" class="icon-avatar" />
    <div>
        <h1>Tài khoản: {{Auth::user()->username}}</h1>
    </div>
    <a href="{{route('doi-mat-khau-admin')}}"><button class="add" style="margin-bottom: 10px">Đổi mật khẩu</button></a>
</div>
@else
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
    <br/>   
<a href="{{route('dang-nhap-admin')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky-admin')}}" id="technology" class="h1">Đăng Ký</a>
<a href="{{route('trang-chu-admin')}}" id="technology" class="h1">Đăng nhập với quyền quản trị viên</a>
@endif