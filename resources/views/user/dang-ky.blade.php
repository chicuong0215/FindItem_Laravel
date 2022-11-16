<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <div class="register-form">
            <form action="{{ route('xl-dang-ky')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="item-form">
                    <div class="title">ĐĂNG KÝ</div>
                    <tr>
                        <div class="text">TÀI KHOẢN</div>
                        <div><img class="icon" src="icons/person.png" />
                            <input type="text" placeholder="Nhập username" name="tai_khoan" class="input" />
                        </div>
                        <br />
                        <div class="text">HỌ TÊN</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <input input type="text" placeholder="Nhập họ tên" name="ho_ten" class="input" />
                        </div>
                        <br />
                        <div class="text">MẬT KHẨU</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <input placeholder="Nhập mật khẩu" id="pass1" name="mat_khau" class="input" />
                        </div>
                        <br />
                        <div class="text">NHẬP LẠI MẬT KHẨU</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <input placeholder="Nhập lại mật khẩu" type="text" name="re_password" class="input" />
                        </div>
                        <br />
                        <div class="text">SỐ ĐIỆN THOẠI</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <input placeholder="Nhập số điện thoại" type="text" name="dien_thoai" class="input" />
                        </div>
                        <br />
                    </tr>
                    <a href="#"><button class="btn-feature" id="btn" type="submit">Đăng Ký</button></a>
                </div>

                <div class="item-form">
                    <tr>
                        <div class="text">NGÀY SINH</div>
                        <div><img class="icon" src="icons/person.png" />
                            <input type="date" name="birthday" class="input"/>
                        </div>
                        <br />
                        <div class="text">GIỚI TÍNH</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <select name="sex" id="sex" class="input">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>
                        <br />
                        <div class="text">ĐỊA CHỈ</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <input placeholder="Nhập địa chỉ" type="text" name="address" class="input" />
                        </div>
                        <br />
                        <div class="text">ẢNH</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <input type="file" name="background" class="input-rectangle" />
                        </div>
                        <br />
                    </tr>
                    
                </div>
            </form>
            <a href="{{route('trang-chu')}}"><button class="btn-feature" id="btn" type="submit">Trở về</button></a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>