<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cấp tài khoản Admin</title>
    <link rel="stylesheet" href="/style2.css">
</head>

<body>
    <div>
        <div class="register-form">
            <form action="{{route('xl-dang-ky-admin')}}" method="post">
                @csrf
                <div class="item-form">
                    <div class="title">CẤP TÀI KHOẢN ADMIN</div>
                    <tr>
                        <div class="text">TÀI KHOẢN</div>
                        <div><img class="icon" src="/icons/person.png" />
                            <input type="text" placeholder="Nhập tài khoản" name="username" class="input" />
                        </div>
                        <br />
                        <div class="text">MÃ DÀNH CHO ADMIN</div>
                        <div>
                            <img class="icon" src="/icons/lock.png" />
                            <input input type="text" placeholder="default: cuong123" name="key" class="input" />
                        </div>
                        <br />
                        <div class="text">MẬT KHẨU</div>
                        <div>
                            <img class="icon" src="/icons/lock.png" />
                            <input placeholder="Nhập mật khẩu" id="pass1" name="password" class="input" />
                        </div>
                        <br />
                        <div class="text">NHẬP LẠI MẬT KHẨU</div>
                        <div>
                            <img class="icon" src="/icons/lock.png" />
                            <input placeholder="Nhập lại mật khẩu" type="text" name="re_password" class="input" />
                        </div>
                        <br />
                    </tr>
                    <a href="#"><button class="btn-feature" id="btn" type="submit">Tạo</button></a>
                </div>

            </form>
            <a href="{{route('trang-chu-admin')}}"><button class="btn-feature" id="btn" type="submit">Trở về</button></a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>