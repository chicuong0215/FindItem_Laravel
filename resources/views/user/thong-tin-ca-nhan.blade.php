@include('components.head')
<br />
<br />
@if(Auth::user()!=NULL)
<a href="{{route('thong-tin-ca-nhan')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>
<br>
<br>
<div class="profile" style="text-align:left;padding-left:5%">
    <img src="anhavatar/{{Auth::user()->picture}}" class="icon-avatar" />
    <div>
        <h1>Họ tên: {{Auth::user()->fullname}}</h1>
        <h3>Ngày sinh: {{date('d/m/Y', strtotime(Auth::user()->birthday))}}</h3>
        <h3>Giới tính: {{Auth::user()->sex==1?'Nam':'Nữ'}}</h3>
        <h3>Số điện thoại: {{Auth::user()->phone}}</h3>
        <h3>Địa chỉ: {{Auth::user()->address}}</h3>
    </div>

    <a href="{{route('cap-nhat-thong-tin',['id'=>Auth::user()->username])}}"><button class="buy"
            style="margin-bottom: 10px">Cập nhật thông tin</button></a>
    <a href="{{route('doi-mat-khau')}}"><button class="add" style="margin-bottom: 10px">Đổi mật khẩu</button></a>
</div>
@else
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky')}}" id="technology" class="h1">Đăng Ký</a>
@endif