<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập|Tìm Đồ</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="login-form">
            <form action="{{ route('xl-dang-nhap')}}" method="post">
                @csrf
                <div class="title">ĐĂNG NHẬP</div>
                <div class="input-form">
                    <form action="{{ route('xl-dang-nhap')}}" method="POST">
                        @csrf
                        <div class="text">TÀI KHOẢN</div>
                        <div><img class="icon" src="icons/person.png" />
                            <input type="text" placeholder="Nhập username" id="username" class="input"
                                name="id" />
                        </div>
                        <br />
                        <div class="text">MẬT KHẨU</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
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
        <a href="{{route('dang-ky')}}"><button class="btn-feature">Đăng Ký</button></a>
        <a href="#"><button class="btn-feature">Quên Mật Khẩu</button></a>
        <a href="{{route('trang-chu')}}"><button class="btn-feature">Lướt Tin</button></a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>