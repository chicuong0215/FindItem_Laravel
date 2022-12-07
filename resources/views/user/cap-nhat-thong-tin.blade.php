<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <div class="register-form">
            <form action="{{ route('xl-cap-nhat-thong-tin')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="item-form">
                    <input type="hidden" value="{{Auth::user()->username}}" name="id" />
                    <div class="title">CẬP NHẬT THÔNG TIN</div>
                    <tr>

                        <div class="text">HỌ TÊN</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <input input type="text" placeholder="Nhập họ tên" name="ho_ten" class="input"
                                value="{{$account['fullname']}}" />
                        </div>
                        <br />

                        <div class="text">SỐ ĐIỆN THOẠI</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <input placeholder="Nhập số điện thoại" type="text" name="phone" class="input"
                                value="{{$account['phone']}}" />
                        </div>
                        <br />
                        @if(session('error'))
                        <p>{{session('error')}}</p>
                        @endif
                    </tr>
                    <button class="btn-feature" id="btn" type="submit">Cập Nhật</button>
                </div>

                <div class="item-form">
                    <tr>
                        <div class="text">NGÀY SINH</div>
                        <div><img class="icon" src="icons/person.png" />
                            <input type="date" name="birthday" class="input" value="{{$account['birthday']}}" />
                        </div>
                        <br />
                        <div class="text">GIỚI TÍNH</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />

                            <select name="sex" id="sex" class="input">
                                <option class="input" value="1">Nam</option>
                                @if($account['sex']==0)
                                <option class="input" value="0" selected>Nữ</option>
                                @else
                                <option class="input" value="0">Nữ</option>
                                @endif
                            </select>

                        </div>
                        <br />
                        <div class="text">ĐỊA CHỈ</div>
                        <div>
                            <img class="icon" src="icons/lock.png" />
                            <input placeholder="Nhập địa chỉ" type="text" name="address" class="input"
                                value="{{$account['address']}}" />
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
            <a href="{{route('thong-tin-ca-nhan')}}"><button class="btn-feature" id="btn" type="submit">Trở
                    về</button></a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>