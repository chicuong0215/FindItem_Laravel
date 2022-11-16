<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | Admin</title>
    <link rel="stylesheet" href="/style2.css">
</head>

<body>
    <div class="container">
        <div class="login-form">
            <form action="{{ route('xl-dang-nhap-admin')}}" method="post">
                @csrf
                <div class="title">ĐĂNG NHẬP VỚI TÀI KHOẢN ADMIN</div>
                <div class="input-form">
                    <form action="{{ route('xl-dang-nhap-admin')}}" method="POST">
                        @csrf
                        <div class="text">TÀI KHOẢN</div>
                        <div><img class="icon" src="/icons/person.png" />
                            <input type="text" placeholder="Nhập tài khoản" id="username" class="input"
                                name="username" />
                        </div>
                        <br />
                        <div class="text">MẬT KHẨU</div>
                        <div>
                            <img class="icon" src="/icons/lock.png" />
                            <input type="password" placeholder="Nhập mật khẩu" id="pass" class="input"
                                name="password" />
                        </div>
                        <br />
                        <button class="btn-feature">Đăng Nhập</button>
                    </form>
                </div>

            </form>
            @if(session('error'))
            <p>{{session('error')}}</p>
            @endif
        </div>
        <a href="{{route('dang-ky-admin')}}"><button class="btn-feature2">Cấp Tài Khoản Admin</button></a>
        <!-- <a href="#"><button class="btn-feature">Quên Mật Khẩu</button></a> -->
        <a href="{{route('trang-chu-admin')}}"><button class="btn-feature">Trở Về</button></a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>