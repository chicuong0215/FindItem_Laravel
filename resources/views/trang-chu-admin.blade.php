@include('components.head-admin')
<br />
<br />

<?php
try{
    $check =Auth::user()->id;
?>
<a href="#" id="technology" class="h1">{{Auth::user()->fullname}}</a>
<a href="#" id="technology" class="h1">Thoát</a>
<?php
}catch(Exception $e){
?>
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
    <br/>   
<a href="#" id="technology" class="h1">Đăng Nhập</a>
<?php
}
?>
<br />
<br />
<?php
            foreach ($lsBaiDang as $data) {
            ?>
@csrf
<div id="listphone">
    <a href="{{route('chi-tiet-bai-dang',['id'=>$data['id_post']])}}" class="item">
        </br>
        <img src="icons/image.png" class="icon" />
        <b>Người đăng: {{$data['id_account']}}</b>
        <h4 class="name">Tiêu đề:<br />{{$data['title']}}</h4>
        <h5 class="details">Nội dung:<br />{{$data['content']}}</h5>
        <img src="img/galaxys21.png" class="device" />
        <h5 class="name"></h5>
        <b>Ngày đăng: {{$data['created_at']}}</b>
        <br /><br />
        <button class="buy" style="margin-bottom: 10px">Theo dõi</button>
        <button class="add" style="margin-bottom: 10px">Chi tiết</button>
    </a>
</div>
<?php } ?>