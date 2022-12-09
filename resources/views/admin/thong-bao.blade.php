@include('components.head-admin')
<br />
<br />
@if(Auth::user())
<a href="{{route('profile-admin')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat-admin')}}" id="technology" class="h1">Thoát</a>
<br>
<br>
@else
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap-admin')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky-admin')}}" id="technology" class="h1">Cấp Tài Khoản Admin</a>
<a href="{{route('trang-chu')}}" id="technology" class="h1">Đăng Nhập Với Quyền Người Dùng</a>
<br>
<br>
@endif
@foreach($thongBao as $data)
<div class="line">
    <img src="/anhthongbao/{{$data['picture']}}" class="imgnews" />
    <h3 class="contentnews">{{$data['content']}}</h3>
    <br>
    <br>
    <a href="{{route('xoa-thong-bao',['id'=>$data['id']])}}"><button class="buy" style="margin-bottom: 10px;background-color:red">Xóa thông báo</button></a>
</div>
@endforeach
