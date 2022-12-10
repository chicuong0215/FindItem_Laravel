@include('components.head')
<br />
<br />

@if (Auth::user())
    <a href="{{ route('thong-tin-ca-nhan') }}" id="technology" class="h1">Tài khoản: {{ Auth::user()->username }}</a>
    <a href="{{ route('dang-xuat') }}" id="technology" class="h1">Thoát</a>
    <br />
    <br />
    <div id="listphone2">
        @foreach ($lsPost as $data)
            @if ($data['account_id'] == Auth::user()->id && $data['stt'] == 1)
                @csrf
                <div class="item2">
                    <i>{{ $data['active'] != 1 ? 'Đang chờ phê duyệt' : '' }}</i>
                    <h4 class="details"><b>Tiêu đề:</b> {{ $data['title'] }}</h4>
                    <h4 class="details"><b>Nội dung:</b> {{ $data['content'] }}</h4>
                    <h4 class="details"><b>Loại:</b> {{ $data['type_id'] == 'find' ? 'Tìm đồ' : 'Nhặt đồ' }}</h4>
                    <h4 class="details"><b>Địa chỉ:</b> {{ $data['address'] }}</h4>
                    @foreach(explode('/',$data->picture) as $img)
                    @if ($data['picture'] != 'null')
                        <img src="anhbaidang/{{ $img }}" class="icon" />
                    @else
                        <i>Không có hình ảnh</i>
                    @endif
                    @endforeach
                    <h5 class="name"></h5>
                    <b>Ngày đăng:</b> {{ $data['created_at'] }}
                    <br /><br />
                    <a href="{{ route('chinh-sua-bai-dang', ['id' => $data['id']]) }}"><button class="buy"
                            style="margin-bottom: 10px">Chỉnh sửa bài đăng</button></a>
                    <a href="{{ route('chi-tiet-bai-dang-cua-ban', ['id' => $data['id']]) }}"><button class="add"
                            style="margin-bottom: 10px">Chi tiết</button></a>
                    <a href="{{ route('xoa-bai-dang', ['id' => $data['id']]) }}"><button class="buy"
                            style="margin-bottom: 10px;background-color:red">Xóa bài đăng</button></a>

                </div>
            @endif
        @endforeach
    </div>
@else
    <div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
    <br />
    <a href="{{ route('dang-nhap') }}" id="technology" class="h1">Đăng Nhập</a>
    <a href="{{ route('dang-ky') }}" id="technology" class="h1">Đăng Ký</a>
@endif
