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
<?php
            foreach ($lsBaiDang as $data) {
                if($data['id_account']==Auth::user()->username){
            ?>
@csrf
<div id="listphone">
    <div class="item">
        </br>
        <img src="icons/image.png" class="icon" />
        <b>Người đăng: {{$data['id_account']}}</b>
        <h4 class="name">Tiêu đề:<br />{{$data['title']}}</h4>
        <h5 class="details">Nội dung:<br />{{$data['content']}}</h5>
        <h5 class="details">Địa chỉ:<br />{{$data['address']}}</h5>
        <img src="img/galaxys21.png" class="device" />
        <h5 class="name"></h5>
        <b>Ngày đăng: {{$data['created_at']}}</b>
        <br /><br />5
        <a href="{{route('chinh-sua-bai-dang',['id'=>$data['id']])}}"><button class="buy"
                style="margin-bottom: 10px">Chỉnh sửa bài đăng</button></a>
        <a href="{{route('chi-tiet-bai-dang-cua-ban',['id'=>$data['id']])}}"><button class="add"
                style="margin-bottom: 10px">Chi tiết</button></a>
    </div>
</div>
<?php }} ?>

<?php
}catch(Exception $e){
?>
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky')}}" id="technology" class="h1">Đăng Ký</a>
<a href="{{route('trang-chu-admin')}}" id="technology" class="h1">Đăng nhập với quyền quản trị viên</a>
<?php
}
?>