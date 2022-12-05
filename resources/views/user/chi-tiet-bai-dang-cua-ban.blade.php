@include('components.head')

<body style="text-align:left">
    <div class="main_device">
        <img src="anhbaidang/{{$baiDang['picture']}}" class="left" />
        <div class="right">
        <h4 class="name">Người đăng: {{$baiDang['id_account']}}</h4>
            <h4 class="name">Tiêu đề: {{$baiDang['title']}}</h4>
            <h5 class="details">Nội dung:<br />{{$baiDang['content']}}</h5>
            <h5 class="details"><b>Ngày đăng: {{$baiDang['created_at']}}</b><br>
                <br>
                
            </h5>
            <a href="{{route('chinh-sua-bai-dang',['id'=>$baiDang['id']])}}"><button class="buy" onclick="">Chỉnh sửa</button></a>
            <a href="{{route('xoa-bai-dang-2',['id'=>$baiDang['id']])}}"><button class="buy"
                style="margin-bottom: 10px;background-color:red">Xóa bài đăng</button></a>
        </div>
        <img src="" class="bg" />
    </div>
    <hr>
    <h2 class="rate">Bình luận:</h2>
    <p class="content_rate">
        
        <br />
        ..............................
        <br />
        ..............................
        <br />
    </p>
</body>