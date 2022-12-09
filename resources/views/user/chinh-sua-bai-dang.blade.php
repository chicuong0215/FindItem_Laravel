@include('components.head')
<br />
<br />
@if (Auth::user() != null)
    <a href="{{ route('thong-tin-ca-nhan') }}" id="technology" class="h1">Tài khoản: {{ Auth::user()->username }}</a>
    <a href="{{ route('dang-xuat') }}" id="technology" class="h1">Thoát</a>
    <br />
    <br />
    <div class="title">CHỈNH SỬA BÀI ĐĂNG</div>
    <div class="post">
        <div class="register-form">
            <div class="item-form">
                <form action="{{ route('xl-chinh-sua-bai-dang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->username }}" name="username">
                    <input type="hidden" value="{{ $post['id'] }}" name="id">
                    <div class="form-group">
                        <div class="text">Tiêu đề</div>
                        <br />
                        <input type="text" class="input" name="title" value="{{ $post['title'] }}">
                    </div>
                    <br />
                    <div>
                        <select class="input" name="id_type">
                            <option class="input" value="1">Tin tìm đồ</option>
                            @if ($post['id_type'] == 0)
                                <option class="input" value="0" selected>Tin nhặt đồ</option>
                            @else
                                <option class="input" value="0">Tin nhặt đồ</option>
                            @endif
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <div class="text">Nội dung</div>
                        <textarea name="content" class="input-rectangle">{{ $post['content'] }}</textarea>
                    </div>
                    <br />
                    <div class="form-group">
                        <div class="text">Địa chỉ liên hệ</div>
                        <textarea type="text" name="address" class="input-rectangle">{{ $post['address'] }}</textarea>
                    </div>
                    <br />
                    <img class="icon" src="icons/lock.png" />
                    <div class="text" style="display:inline-block">ẢNH</div>
                    <br />
                    <input type="file" name="background" class="input-rectangle" />
                    <br />
                    @if (session('error'))
                        <p>{{ session('error') }}</p>
                    @endif
                    <div class="form-group tm-text-right text">
                        <button type="submit" class="btn-feature">Cập Nhật</button>
                    </div>
                </form>
                <div class="item-form">
                </div>
            </div>


        </div>

    </div>

    </div>
@else
    <div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
    <br />
    <a href="{{ route('dang-nhap') }}" id="technology" class="h1">Đăng Nhập</a>
@endif
