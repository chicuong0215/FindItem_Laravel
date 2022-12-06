@include('components.head')
<br />
<br />

<?php
try{
    $check =Auth::user()->id;
?>
<a href="{{route('thong-tin-ca-nhan')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>
<br />
<br />
<div id="listphone2">
<?php
            foreach ($lsPost as $data) {
                if($data['id_account']==Auth::user()->username&&$data['stt']==1){
                
            ?>
@csrf

    <div class="item2">
        </br>
        <img src="anhavatar/{{Auth::user()->picture}}" class="icon" />
        <b>Người đăng: {{$data['id_account']}}</b>
        <h4 class="name">Tiêu đề: {{$data['title']}}</h4>
        <h5 class="details">Nội dung: {{$data['content']}} -  Địa chỉ:<br />{{$data['address']}}</h5>
        <img src="anhbaidang/{{ $data['picture'] }}" width="100px" heigh="100px"/>
        <h5 class="name"></h5>
        <b>Ngày đăng: {{$data['created_at']}}</b>
        <br /><br />
        <a href="{{route('chinh-sua-bai-dang',['id'=>$data['id']])}}"><button class="buy"
                style="margin-bottom: 10px">Chỉnh sửa bài đăng</button></a>
        <a href="{{route('chi-tiet-bai-dang-cua-ban',['id'=>$data['id']])}}"><button class="add"
                style="margin-bottom: 10px">Chi tiết</button></a>
        <a href="{{route('xoa-bai-dang',['id'=>$data['id']])}}"><button class="buy"
                style="margin-bottom: 10px;background-color:red">Xóa bài đăng</button></a>
 
</div>
<?php }} ?>
</div>
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