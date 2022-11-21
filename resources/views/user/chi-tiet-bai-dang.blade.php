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



    <!-- bình luận -->
    <h2 class="rate">Bình luận:</h2>


    <!-- parent -->
    <div class="rate">

        <form action="{{route('xl-binh-luan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Bình luận của bạn:</h2>
            <input type="hidden" name="id" value="{{$baiDang['id']}}">
            <input type="text" name="content" class="input-rectangle">
            <br><br>
            <input type="file" name="picture" class="input-rectangle">
            <br><br>
            <button class="buy">Đăng</button>
            <br>
        </form>
        <hr>
        <!-- danh sách bình luận-->

        <div style="font-weight:bold">Danh sách bình luận:</div>

        <?php
        foreach($binhLuan as $data){
            ?>

        <img src="img/galaxys21.png" class="icon" />
        <span style="margin-left:10px;font-weight:bold">Tài khoản:
            {{$data['id_account']}}</span>
            @if($data['id_account_rep']!='null')
                <span style="color:blue;margin-left:10px">đã trả lời: <b>{{$data['id_account_rep']}}</b></span>
                @endif
        <div class="rate">
            <div class="rate2">{{$data['content']}}</div>
            <!-- <img src="img/galaxys21.png" width="100px" height="100px" /> -->
            <br>
            <form action="{{route('xl-binh-luan-rep')}}" method="POST" enctype="multipart/form-data">
                @csrf
                Nội dung
                <input type="hidden" name="id" value="{{$baiDang['id']}}">
                
                <input type="hidden" name="rep" value="{{$data['id_account']}}">
                <input type="text" name="content" class="">
                Chọn hình
                <input type="file" name="picture" class="">
                <button class="buy">Trả lời</button>
                
                <br>
            </form>
        </div>
        <hr>
        <?php } ?>

    </div>

</body>