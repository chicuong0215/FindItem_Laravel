@include('components.head')
<br />
<br />
@if(Auth::user()!=NULL)
<a href="{{route('thong-tin-ca-nhan')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>
<br />
<br />
<div class="title">CHỈNH SỬA BÀI ĐĂNG</div>
<div class="post">
    <div class="register-form">
        <div class="item-form">
            <form action="{{route('xl-chinh-sua-bai-dang')}}" method="POST">
                @csrf
                <input type="hidden" value="{{Auth::user()->username}}" name="username">
                <input type="hidden" value="{{$post['id']}}" name="id">
                <div class="form-group">
                    <div class="text">Tiêu đề</div>
                    <br />
                    <input type="text" class="input" name="title" value="{{$post['title']}}">
                </div>
                <br />
                <div class="form-group text">
                    <div class="text">Loại tin</div>
                    <input name="id_type" type="radio" value="loss"> Tin mất đồ <br>
                    <input name="id_type" type="radio" value="find"> Tin nhặt đồ
                </div>
                <br />
                <div class="form-group">
                    <div class="text">Nội dung</div>
                    <textarea name="content" class="input-rectangle">{{$post['content']}}</textarea>
                </div>
                <br />
                <div class="form-group">
                    <div class="text">Địa chỉ liên hệ</div>
                    <input type="text" name="address" class="input-rectangle" value="{{$post['content']}}">
                </div>
                <br />
                <img class="icon" src="icons/lock.png" />
                <div class="text" style="display:inline-block">ẢNH</div>
                <br />
                <input type="file" name="background" class="input-rectangle" />

                <br />
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
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
@endif