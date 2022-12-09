@include('components.head')
<br />
<br />
@if (Auth::user() != null)
    <a href="{{ route('thong-tin-ca-nhan') }}" id="technology" class="h1">Tài khoản: {{ Auth::user()->username }}</a>
    <a href="{{ route('dang-xuat') }}" id="technology" class="h1">Thoát</a>
@else
    <div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
    <br />
    <a href="{{ route('dang-nhap') }}" id="technology" class="h1">Đăng Nhập</a>
    <a href="{{ route('dang-ky') }}" id="technology" class="h1">Đăng Ký</a>
@endif
<br />
<br />

<body>
    <div class="main_device2" style="padding: 50px">
        <i>Bạn đang nhắn tin với tài khoản <b>{{ $account2['fullname'] }}</b></i>
        @foreach ($lsMessage as $data)
            <div>
                <div style="text-align: left">
                    <a href=""><img src="anhavatar/{{ $account2->picture }}" class="icon" /></a>
                    <b>{{ $account2->fullname }}</b>
                    <div class="input" style="padding: 10px; margin: 10px; border-radius: 10px; width: 100%">
                        {{ $data->content2 }}<br><i>Thời gian</i></div>
                </div>
                <br>
                <div style="text-align: right">
                    <b>{{ $account1->fullname }}</b>
                    <a href=""><img src="anhavatar/{{ $account1->picture }}" class="icon" /></a>
                    <div class="input" style="padding:10px; margin: 10px; border-radius: 10px; width: 100%">
                        {{ $data->content }}<br><i style="font-size: 12px">{{ $data->created_at }}</i>
                    </div>
                </div>
                <br>
            </div>
        @endforeach
        @if (Auth::user() != null)
            <form action="{{ route('xl-nhan-tin') }}" method="POST">
                @csrf
                <input value="{{ $account1->id }}" type="hidden" name="account1">
                <input value="{{ $account2->id }}" type="hidden" name="account2">
                <input type="text" class="input" style="border-radius: 10px;" name="message">
                <button class="add">Gửi</button>
            </form>
        @endif
    </div>

</body>
