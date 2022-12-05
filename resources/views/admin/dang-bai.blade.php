@include('components.head-admin')
<br />
<br />
@if(Auth::user())
<a href="{{route('profile-admin')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat-admin')}}" id="technology" class="h1">Thoát</a>
<br />
<br />
<div class="title">ĐĂNG THÔNG BÁO</div>
<div class="baidang">
    <div class="register-form">
        <div class="item-form">
            <form action="{{route('xl-dang-bai-admin')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{Auth::user()->username}}" name="username">
                <div class="form-group">
                    <div class="text">Nội dung</div>
                    <input name="content" class="input-rectangle">
                </div>
                <br />
                <img class="icon" src="/icons/lock.png" />
                <div class="text" style="display:inline-block">ẢNH</div>
                <br />
                <input type="file" name="background" class="input-rectangle" />

                <br />
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
<a href="{{route('dang-nhap-admin')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky-admin')}}" id="technology" class="h1">Cấp Tài Khoản Admin</a>
<a href="{{route('trang-chu')}}" id="technology" class="h1">Đăng Nhập với quyền người dùng</a>
@endif