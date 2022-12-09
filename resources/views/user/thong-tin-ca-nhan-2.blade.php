@include('components.head')
<br />
<br />
@if(Auth::user()!=NULL)
<a href="{{route('thong-tin-ca-nhan')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>
<br>
<br>
<div class="profile" style="text-align:left;padding-left:5%">
    <img src="anhavatar/{{$account['picture']}}" class="icon-avatar" />
    <div>
        <h1>Tài khoản: {{$account['username']}}</h1>
        <h3>Họ tên: {{$account['fullname']}}</h3>
        <h3>Ngày sinh: {{date('d/m/Y', strtotime($account['birthday']))}}</h3>
        <h3>Giới tính: {{$account['sex']==1?'Nam':'Nữ'}}</h3>
        <h3>Số điện thoại: {{$account['phone']}}</h3>
        <h3>Địa chỉ: {{$account['address']}}</h3>
    </div>
</div>
@else
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky')}}" id="technology" class="h1">Đăng Ký</a>
@endif