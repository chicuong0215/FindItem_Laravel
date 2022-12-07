@include('components.head-admin')
<br />
<br />

@if(Auth::user())
<a href="{{route('profile-admin')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat-admin')}}" id="technology" class="h1">Thoát</a>
<br />
<br />
@foreach ($arr as $data)
@if($data['permission']=='0')
@csrf
<div class="line">
    <img src="/anhavatar/{{$data['picture']}}" class="icon" />
    <br>
    <div class="">
        <b>Tài khoản: </b>{{$data['username']}}
        <br>
        <b>Họ và tên: </b> {{$data['fullname']}}
        <br>
        <b>Giới tính: </b>{{$data['sex']==1?'Nam':'Nữ'}}
        <br>
        <b>Điện thoại: </b>{{$data['phone']}}
        <br>
        <b>Sinh nhật: </b>{{date('d/m/Y', strtotime($data['birthday']))}}
        <br>
        <b>Ngày tạo: </b>{{$data['created_at']}}
    </div>
    <br>
    <a href="{{route('xoa-tai-khoan',['id'=>$data['username']])}}"><button class="buy"
            style="margin-bottom: 10px;background-color:{{$data['stt']==1?'red':'blue'}}">{{$data['stt']==1?'Xóa tài khoản':'Khôi phục tài khoản'}}</button></a>
</div>
@endif
@endforeach
@else
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap-admin')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky-admin')}}" id="technology" class="h1">Cấp Tài Khoản Admin</a>
<a href="{{route('trang-chu')}}" id="technology" class="h1">Đăng Nhập với quyền người dùng</a>
@endif