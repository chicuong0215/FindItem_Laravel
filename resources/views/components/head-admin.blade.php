<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="shortcut icon" href="img/logoPHP.png">
    <title>Tìm đồ</title>
</head>

<body>
    <div id="head1">
        <a href="{{route('trang-chu-admin')}}" id="main"><img src="img/logoPHP.png" id="logo" /></a>
        <form>
            <input id="edt_search" name="edt_search" type="text" placeholder="Bạn tìm gì...">
            <button class="buy">Search</button>
        </form>
    </div>
    <div id="head2">
        <a href="{{route('trang-chu-admin')}}" id="phone" class="h2">BẢN TIN</a>
        <a href="#" id="laptop" class="h2">TRANG CÁ NHÂN</a>
        <a href="#" id="accessories" class="h2">BÀI ĐĂNG CỦA BẠN</a>
        <a href="#" id="smartwatch" class="h2">GÓC CẢNH GIÁC</a>

    </div>

    <script type="text/javascript" src="process.js"></script>
</body>

</html>