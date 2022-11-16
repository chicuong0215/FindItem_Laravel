@include('components.head')
<br />
<br />
<?php
try{
    $check =Auth::user()->id;
    ?>
<a href="{{route('profile')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>
<br />
<br />
<div class="title">THÔNG TIN BÀI ĐĂNG</div>
<div class="baidang">
    <div class="register-form">
        <div class="item-form">
        <form action="{{route('xl-dang-bai')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{Auth::user()->username}}" name="username">
                <div class="form-group">
                    <div class="text">Tiêu đề</div>
                    <br />
                    <input type="text" class="input" name="title">
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
                    <textarea name="content" class="input-rectangle"></textarea>
                </div>
                <br />
                <div class="form-group">
                    <div class="text">Địa chỉ liên hệ</div>
                    <input type="text" name="address" class="input-rectangle">
                </div>
                <br />
                     <div class="text" style="display:inline-block">ẢNH</div>
                <br/>
                <input type="file" name="background" class="input-rectangle" />
                        
                <br />
                                  <img class="icon" src="icons/lock.png" />
               
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
<?php

}catch(Exception $e){
    ?>
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
<?php
}

?>