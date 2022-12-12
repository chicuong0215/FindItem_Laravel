@include('components.head')
<style>
    #thongbao{
        background-color: white
    }
    </style>
<br />
<br />
@if(Auth::user()!=NULL)
<a href="{{route('thong-tin-ca-nhan')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>
@else
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky')}}" id="technology" class="h1">Đăng Ký</a>
@endif
<br />
<br />
@foreach($thongBao as $data)
<div class="line">
    <img src="/anhthongbao/{{$data['picture']}}" class="imgnews" />
    <h3 class="contentnews">{{$data['content']}}</h3>
</div>
@endforeach
