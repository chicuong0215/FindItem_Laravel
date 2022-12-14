<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="img/logoPHP.png">
    <title>Tìm đồ</title>
</head>

<body>
    <div id="head1">
        <a href="{{route('trang-chu')}}" id="main"><img src="img/logoPHP.png" id="logo" /></a>
        <form action="{{route('xl-tim-kiem')}}" method="get">
            <input id="edt_search" name="search" type="text" placeholder="Tìm bài đăng theo tiêu đề">
            <button class="buy">Search</button>
        </form>
        <a href="{{route('dang-bai')}}"> <button id="cart" class="h1a">ĐĂNG BÀI</button></a>
    </div>
    <div id="head2">
        <a href="{{route('trang-chu')}}" id="trangchu" class="h2">BẢN TIN</a>
        <a href="{{route('tim-do')}}" id="timdo" class="h2">TÌM ĐỒ</a>
        <a href="{{route('nhat-do')}}" id="nhatdo" class="h2">NHẶT ĐỒ</a>
        <a href="{{route('thong-tin-ca-nhan')}}" id="trangcanhan" class="h2">TRANG CÁ NHÂN</a>
        <a href="{{route('quan-tam')}}" id="quantam" class="h2">QUAN TÂM</a>
        <a href="{{route('bai-dang-cua-ban')}}" id="baidangcuaban" class="h2">BÀI ĐĂNG CỦA BẠN</a>
        <a href="{{route('thong-bao')}}" id="thongbao" class="h2">THÔNG BÁO</a>

    </div>

    <!-- <script type="text/javascript" src="process.js"></script> -->
</body>

</html>
