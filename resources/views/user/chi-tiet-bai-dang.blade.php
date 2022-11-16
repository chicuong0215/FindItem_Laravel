@include('components.head')

<body style="text-align:left">
    <div class="main_device">
        <img src="img/galaxys21.png" class="left" />
        <div class="right">
        <h4 class="name">Người đăng: {{$baiDang['id_account']}}</h4>
            <h4 class="name">Tiêu đề: {{$baiDang['title']}}</h4>
            <h5 class="details">Nội dung:<br />{{$baiDang['content']}}</h5>
            <h5 class="details">Loại: {{$baiDang['id_type']=='find'?'Tìm đồ':'Nhặt đồ'}}</h5>
            <h5 class="details"><b>Ngày đăng: {{$baiDang['created_at']}}</b><br>
                <br>
                
            </h5>
            <button class="add" onclick="">Nhắn tin</button>
            <button class="buy" onclick="">Quan tâm bài viết</button>
        </div>
        <img src="" class="bg" />
    </div>
    <hr>
    <h2 class="rate">Bình luận:</h2>
    <p class="content_rate">
        ..............................
        <br />
        ..............................
        <br />
        ..............................
        <br />
        ..............................
        <br />
        ..............................
        <br />
        ..............................
        <br />
        ..............................
        <br />
        ..............................
        <br />
        ..............................
        <br />
        ..............................
        <br />
    </p>
</body>