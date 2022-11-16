@include('components.head-admin')

<body style="text-align:left">
    <div class="main_device">
        <img src="/anhbaidang/{{$baiDang['picture']}}" class="left" />
        <div class="right">
            <h4 class="name">Người đăng: {{$baiDang['id_account']}}</h4>
            <h4 class="name">Tiêu đề: {{$baiDang['title']}}</h4>
            <h5 class="details">Nội dung:<br />{{$baiDang['content']}}</h5>
            <h5 class="details">Loại: {{$baiDang['id_type']=='find'?'Tìm đồ':'Nhặt đồ'}}</h5>
            <h5 class="details"><b>Ngày đăng: {{$baiDang['created_at']}}</b><br>
                <br>

            </h5>
            @if($baiDang['active']==0)
        <a href="{{route('phe-duyet-2',['id'=>$baiDang['id']])}}"><button class="{{$baiDang['active']==1?'buy':'buy2'}}" style="margin-bottom: 10px;">{{$baiDang['active']==1?'Đã phê duyệt':'Chưa phê duyệt'}}</button><a/>
        @endif
        @if($baiDang['active']==1)
            <a href="{{route('xoa-bai-dang-admin-2',['id'=>$baiDang['id']])}}"><button class="buy" style="margin-bottom: 10px;background-color:{{$baiDang['stt']==1?'red':'blue'}}">{{$baiDang['stt']==1?'Xóa bài đăng':'Khôi phục'}}</button></a>
            @endif
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