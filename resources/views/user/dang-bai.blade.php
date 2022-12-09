@include('components.head')
<br />
<br />
@if(Auth::user()!=NULL)
<a href="{{route('thong-tin-ca-nhan')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>
<br />
<br />
<div class="title">THÔNG TIN BÀI ĐĂNG</div>
<div class="baidang">
    <div class="register-form">
        <div class="item-form">
            <form action="{{route('xl-dang-bai')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{Auth::user()->id}}" name="username">
                <div class="form-group">
                    <div class="text">Tiêu đề</div>
                    <br />
                    <input type="text" class="input" name="title">
                </div>
                <br />
                <div>
                    <select class="input" name="type_id">
                        <option class="input" value="1">Tin tìm đồ
                        </option>
                        <option class="input" value="0">Tin nhặt đồ
                        </option>
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <div class="text">Nội dung</div>
                    <textarea name="content" class="input-rectangle"></textarea>
                </div>
                <br />
                <div class="form-group">
                    <div class="text">Địa chỉ liên hệ</div>
                    <input type="text" name="address" class="input-rectangle">
                </div>
                <br />
                <div class="text" style="display:inline-block">ẢNH</div>
                <br />
                <input type="file" name="background" class="input-rectangle" />

                <br />
                @if(session('error'))
                <p>{{session('error')}}</p>
                @endif

                <div class="form-group tm-text-right text">
                    <button type="submit" class="btn-feature">Đăng Bài</button>
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
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky')}}" id="technology" class="h1">Đăng Ký</a>
@endif
