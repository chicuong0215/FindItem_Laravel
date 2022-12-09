<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style2.css">
    <title>Mật Khẩu Mới|Tìm Đồ</title>
</head>

<body>
    <div class="title">MẬT KHẨU MỚI</div>
    <div class="input-form">

        <form action="{{ route('xl-doi-mat-khau-admin')}}" method="POST">
            @csrf
            <input type="hidden" name="username" value="{{Auth::user()->username}}">
            <div class="text">MẬT KHẨU CŨ</div>
            <div><img class="icon" src="/icons/person.png" />
                <input type="text" name="password" class="input" />
            </div>
            <br />
            <div class="text">MẬT KHẨU MỚI</div>
            <div>
                <img class="icon" src="/icons/lock.png" />
                <input type="text" name="new_password" class="input" />
            </div>
            <br />
            <div class="text">NHẬP LẠI MẬT KHẨU</div>
            <div>
                <img class="icon" src="/icons/lock.png" />
                <input type="text" name="renew_password" class="input" />
            </div>
            <br />
            @if(session('error'))
            <p>{{session('error')}}</p>
            @endif
            <button type="submit" class="btn-feature" style="width:300px">Thay Đổi Mật Khẩu</button>
        </form>
    </div>
    <a href="{{route('profile-admin')}}"><button class="btn-feature-2">Trở Về</button></a>
</body>

</html>
