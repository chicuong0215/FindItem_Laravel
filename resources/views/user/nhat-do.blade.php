@include('components.head')
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
<div id="listphone">
    @foreach($lsPost as $data)
    <div class="item">
        <a href="{{route('thong-tin-ca-nhan-2',['id'=>$data['id_account']])}}"><img
                src="anhavatar/{{$data->user->picture}}" class="icon" /></a>
        <h4><b>Người đăng:</b> {{$data->user->username}}</h4>
        <h4 class="details"><b>Tiêu đề:</b> {{$data['title']}}</h4>
        <h4 class="details"><b>Nội dung:</b> {{$data['content']}}</h4>
        <h4 class="details"><b>Loại:</b> {{$data['id_type']==1?'Tìm đồ':'Nhặt đồ'}}</h4>
        <h4 class="details"><b>Địa chỉ:</b> {{$data['address']}}</h4>
        @if($data['picture']!='null')
        <img src="anhbaidang/{{$data['picture']}}" class="device" />
        @else
        <i>Không có hình ảnh</i>
        @endif
        <h5 class="name"></h5>
        <b>Ngày đăng:</b> {{$data['created_at']}}
        <br /><br />
        <a href="{{route('xl-quan-tam',['id'=>$data['id']])}}"><button class="buy" style="margin-bottom: 10px">Quan
                tâm</button></a>
        <a href="{{route('chi-tiet-bai-dang',['id'=>$data['id']])}}"><button class="add" style="margin-bottom: 10px">Chi
                tiết</button></a>
    </div>
    @endforeach
</div>
<br>
<br>
<a href="{{route('trang-chu',['page'=>1])}}"><button class="add" style="margin-bottom: 10px">1</button></a>
<a href="{{route('trang-chu',['page'=>2])}}"><button class="buy" style="margin-bottom: 10px">2</button></a>
<a href="{{route('trang-chu',['page'=>3])}}"><button class="buy" style="margin-bottom: 10px">3</button></a>
<a href="{{route('trang-chu',['page'=>4])}}"><button class="buy" style="margin-bottom: 10px">4</button></a>
