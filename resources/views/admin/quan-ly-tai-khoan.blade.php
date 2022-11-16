@include('components.head-admin')
<br />
<br />

<?php
try{
    $check =Auth::user()->id;
?>
<a href="{{route('profile-admin')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat-admin')}}" id="technology" class="h1">Thoát</a>
<br />
<br />
<?php
            foreach ($arr as $data) {
                if($data['permission']=='0'){
            ?>
@csrf
<div id="">
    <hr />
    <img src="/anhavatar/{{$data['picture']}}" class="icon" />
    <b>Tài khoản: {{$data['username']}}</b>
    <div class="">Họ và tên: {{$data['fullname']}} - Giới tính: {{$data['sex']==1?'Nam':'Nữ'}} - Điện thoại: {{$data['phone']}} - Sinh nhật: {{$data['birthday']}}</div>
    <a href="{{route('xoa-tai-khoan',['id'=>$data['username']])}}"><button class="buy" style="margin-bottom: 10px;background-color:{{$data['stt']==1?'red':'blue'}}">{{$data['stt']==1?'Xóa tài khoản':'Khôi phục tài khoản'}}</button></a>
</div>
<?php }} ?>
<?php
}catch(Exception $e){
?>
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap-admin')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky-admin')}}" id="technology" class="h1">Cấp Tài Khoản Admin</a>
<a href="{{route('trang-chu')}}" id="technology" class="h1">Đăng Nhập với quyền người dùng</a>
<?php
}
?>
