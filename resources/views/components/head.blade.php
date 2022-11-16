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
        <form>
            <input id="edt_search" name="edt_search" type="text" placeholder="Bạn tìm gì...">
            <button class="buy">Search</button>
        </form>
        <a href="{{route('dang-bai')}}"> <button id="cart" class="h1a">ĐĂNG BÀI</button></a>
    </div>
    <div id="head2">
        <a href="{{route('trang-chu')}}" id="phone" class="h2">BẢN TIN</a>
        <a href="{{route('tim-do')}}" id="phone" class="h2">TÌM ĐỒ</a>
        <a href="{{route('nhat-do')}}" id="phone" class="h2">NHẶT ĐỒ</a>
        <a href="{{route('profile')}}" id="laptop" class="h2">TRANG CÁ NHÂN</a>
        <a href="{{route('quan-tam')}}" id="tablet" class="h2">QUAN TÂM</a>
        <a href="{{route('bai-dang-cua-ban')}}" id="accessories" class="h2">BÀI ĐĂNG CỦA BẠN</a>
        <a href="{{route('thong-bao')}}" id="smartwatch" class="h2">THÔNG BÁO</a>

    </div>

    <!-- <script type="text/javascript" src="process.js"></script> -->
</body>

</html>