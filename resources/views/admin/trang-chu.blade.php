@include('components.head-admin')
<br />
<br />
@if (Auth::user())
    <a href="{{ route('profile-admin') }}" id="technology" class="h1">Tài khoản: {{ Auth::user()->username }}</a>
    <a href="{{ route('dang-xuat-admin') }}" id="technology" class="h1">Thoát</a>
    <br>
    <br>
    <div id="listphone2">
        @foreach ($lsPost as $data)
            <div class="line">
                <br>
                <img src="/anhavatar/{{$data->user->picture}}" class="icon" />
                <br>
                <b>Người đăng: </b>{{ $data->user->username }}
                <br>
                <b>Tiêu đề: </b>{{ $data['title'] }}
                <br>
                <b>Nội dung: </b>{{ $data['content'] }}
                <br>
                <b>Loại: </b> {{ $data['id_type'] == 1 ? 'Tìm đồ' : 'Nhặt đồ' }}
                <br>
                <b>Địa chỉ: </b>{{ $data['address'] }}
                <br>
                <b>Ngày đăng: </b>{{ $data['created_at'] }}
                <br>
                <br>
                @if ($data['picture'] != 'null')
                    <img src="anhbaidang/{{ $data['picture'] }}" width="100px" height="100px" />
                @else
                    <i>Không có ảnh!</i>
                @endif
                <br /><br />
                @if ($data['active'] == 0)
                    <a href="{{ route('phe-duyet', ['id' => $data['id']]) }}"><button
                            class="{{ $data['active'] == 1 ? 'buy' : 'buy2' }}"
                            style="margin-bottom: 10px;">{{ $data['active'] == 1 ? 'Đã phê duyệt' : 'Chưa phê duyệt' }}</button></a>
                @endif

                @if ($data['active'] == 1)
                    <a href="{{ route('xoa-bai-dang-admin', ['id' => $data['id']]) }}"><button class="buy"
                            style="margin-bottom: 10px;background-color:{{ $data['stt'] == 1 ? 'red' : 'blue' }}">{{ $data['stt'] == 1 ? 'Xóa bài đăng' : 'Khôi phục' }}</button></a>
                @endif
                <a href="{{ route('chi-tiet-bai-dang-admin', ['id' => $data['id']]) }}"><button class="add"
                        style="margin-bottom: 10px">Chi tiết</button></a>
            </div>
        @endforeach
    </div>
@else
    <div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
    <br />
    <a href="{{ route('dang-nhap-admin') }}" id="technology" class="h1">Đăng Nhập</a>
    <a href="{{ route('dang-ky-admin') }}" id="technology" class="h1">Cấp Tài Khoản Admin</a>
    <a href="{{ route('trang-chu') }}" id="technology" class="h1">Đăng Nhập Với Quyền Người Dùng</a>
@endif
<br />
<br />
