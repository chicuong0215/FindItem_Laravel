@include('components.head')
<br />
<br />
@if (Auth::user() != null)
    <a href="{{ route('thong-tin-ca-nhan') }}" id="technology" class="h1">Tài khoản: {{ Auth::user()->username }}</a>
    <a href="{{ route('dang-xuat') }}" id="technology" class="h1">Thoát</a>
    <div id="listphone2">
        @foreach ($lsCare as $data)
            <div class="item2">
                <a href="{{ route('thong-tin-ca-nhan-2', ['id' => $data->post->id_account]) }}"><img
                        src="anhavatar/{{ $data->post->user->picture }}" class="icon" /></a>
                <h4><b>Người đăng:</b> {{ $data->post->user->fullname }}</h4>
                <h4 class="details"><b>Tiêu đề:</b> {{ $data->post->title }}</h4>
                <h4 class="details"><b>Nội dung:</b> {{ $data->post->content }}</h4>
                <h4 class="details"><b>Loại:</b> {{ $data->post->id_type == 1 ? 'Tìm đồ' : 'Nhặt đồ' }}</h4>
                <h4 class="details"><b>Địa chỉ:</b> {{ $data->post->address }}</h4>
                @if ($data->post->picture != 'null')
                    <img src="anhbaidang/{{ $data->post->picture }}" class="device" />
                @else
                    <i>Không có hình ảnh</i>
                @endif
                <h5 class="name"></h5>
                <b>Ngày đăng:</b> {{ $data->created_at }}
                <br /><br />
                @if (Auth::user() != null)
                    <a href="{{ route('xl-quan-tam-2', ['id' => $data->id_post]) }}"><button class="buy"
                            style="margin-bottom: 10px">{{ $data->stt == 1 ? 'Bỏ quan tâm' : 'Quan tâm' }}</button></a>
                @endif
                <a href="{{ route('chi-tiet-bai-dang', ['id' => $data->id_post]) }}"><button class="add"
                        style="margin-bottom: 10px">Chi
                        tiết</button></a>
            </div>
        @endforeach
    </div>
    <br>
    <a href="{{ route('trang-chu', ['page' => 1]) }}"><button class="add" style="margin-bottom: 10px">1</button></a>
    <a href="{{ route('trang-chu', ['page' => 2]) }}"><button class="buy" style="margin-bottom: 10px">2</button></a>
    <a href="{{ route('trang-chu', ['page' => 3]) }}"><button class="buy" style="margin-bottom: 10px">3</button></a>
    <a href="{{ route('trang-chu', ['page' => 4]) }}"><button class="buy" style="margin-bottom: 10px">4</button></a>
@else
    <div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
    <br />
    <a href="{{ route('dang-nhap') }}" id="technology" class="h1">Đăng Nhập</a>
    <a href="{{ route('dang-ky') }}" id="technology" class="h1">Đăng Ký</a>
@endif
