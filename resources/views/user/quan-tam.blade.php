@include('components.head')
<br />
<br />

@if(Auth::user())
<a href="{{route('thong-tin-ca-nhan')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>

<br />
<br />

@foreach ($lsPost as $data)
@csrf
<div id="listphone">
    <div class="item">
        </br>
        <img src="icons/image.png" class="icon" />
        <b>Người đăng: {{$data['id_post']}}</b>
        <h4 class="name">Tiêu đề:<br />{{$data['title']}}</h4>
        <h5 class="details">Nội dung:<br />{{$data['content']}}</h5>
        <img src="img/galaxys21.png" class="device" />
        <h5 class="name"></h5>
        <b>Ngày đăng: {{$data['created_at']}}</b>
        <br /><br />
        <button class="buy" style="margin-bottom: 10px">Bỏ quan tâm</button>
        <a href="{{route('chi-tiet-bai-dang',['id'=>$data['id']])}}"><button class="add" style="margin-bottom: 10px">Chi
                tiết</button></a>

    </div>
</div>

@endforeach
@else
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky')}}" id="technology" class="h1">Đăng Ký</a>
@endif