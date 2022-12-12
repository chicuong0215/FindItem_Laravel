<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style2.css">
    <link rel="shortcut icon" href="/img/logoPHP.png">
    <title>Tìm đồ | Admin</title>
</head>

<body>
    <div id="head1">
        <a href="{{route('trang-chu-admin')}}" id="main"><img src="/img/logoPHP.png" id="logo" /></a>
        <form action="{{route('xl-tim-kiem-2')}}" method="get">
            <input id="edt_search" name="search" type="text" placeholder="Tìm bài đăng theo tiêu đề">
            <button class="buy">Search</button>
        </form>
    </div>
    <div id="head2">
        <a href="{{route('trang-chu-admin')}}" id="duyetbai" class="h2">DUYỆT BÀI</a>
        <a href="{{route('dang-bai-admin')}}" id="dangbai" class="h2">ĐĂNG THÔNG BÁO</a>
        <a href="{{route('thong-bao-admin')}}" id="thongbao" class="h2">DANH SÁCH THÔNG BÁO</a>
        <a href="{{route('quan-ly-tai-khoan')}}" id="quanlytaikhoan" class="h2">QUẢN LÝ TÀI KHOẢN</a>


    </div>

    <script type="text/javascript" src="process.js"></script>
</body>

</html>
