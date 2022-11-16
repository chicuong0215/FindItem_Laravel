@include('components.head-admin')
<br />
<br />

<?php
try{
    $check =Auth::user()->id;
?>
<a href="{{route('profile-admin')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat-admin')}}" id="technology" class="h1">Thoát</a>
<br>
<br>
<?php
            foreach ($lsBaiDang as $data) {
            ?>
@csrf
<div id="listphone">
    <div class="item">
        </br>
        <img src="icons/image.png" class="icon" />
        <b>Người đăng: {{$data['id_account']}}</b>
        <h4 class="name">Tiêu đề:<br />{{$data['title']}}</h4>
        <h5 class="details">Nội dung:<br />{{$data['content']}}</h5>
        <img src="img/galaxys21.png" class="device" />
        <h5 class="name"></h5>
        <b>Ngày đăng: {{$data['created_at']}}</b>
        <br /><br />
        @if($data['active']==0)
        <a href="{{route('phe-duyet',['id'=>$data['id']])}}"><button class="{{$data['active']==1?'buy':'buy2'}}" style="margin-bottom: 10px;">{{$data['active']==1?'Đã phê duyệt':'Chưa phê duyệt'}}</button><a/>
        @endif
        @if($data['active']==1)
            <a href="{{route('xoa-bai-dang',['id'=>$data['id']])}}"><button class="buy" style="margin-bottom: 10px;background-color:{{$data['stt']==1?'red':'blue'}}">{{$data['stt']==1?'Xóa bài đăng':'Khôi phục'}}</button></a>
            @endif
        <a href="{{route('chi-tiet-bai-dang-admin',['id'=>$data['id']])}}"><button class="add"
                style="margin-bottom: 10px">Chi tiết</button></a>
    </div>
</div>
<?php } ?>
<?php
}catch(Exception $e){
?>
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap-admin')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky-admin')}}" id="technology" class="h1">Cấp Tài Khoản Admin</a>
<a href="{{route('trang-chu')}}" id="technology" class="h1">Đăng Nhập Với Quyền Người Dùng</a>
<?php
}
?>
<br />
<br />