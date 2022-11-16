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
            <a href="{{route('phe-duyet-2',['id'=>$baiDang['id']])}}"><button
                    class="{{$baiDang['active']==1?'buy':'buy2'}}"
                    style="margin-bottom: 10px;">{{$baiDang['active']==1?'Đã phê duyệt':'Chưa phê duyệt'}}</button><a />
                @endif
                @if($baiDang['active']==1)
                <a href="{{route('xoa-bai-dang-admin-2',['id'=>$baiDang['id']])}}"><button class="buy"
                        style="margin-bottom: 10px;background-color:{{$baiDang['stt']==1?'red':'blue'}}">{{$baiDang['stt']==1?'Xóa bài đăng':'Khôi phục'}}</button></a>
                @endif
        </div>
        <img src="" class="bg" />
    </div>
    <hr>


    <!-- bình luận -->
    <h2 class="rate">Bình luận:</h2>


    <!-- parent -->
    <div class="rate">

        <!-- danh sách bình luận-->

        <div style="font-weight:bold">Danh sách bình luận:</div>

        <?php
        foreach($binhLuan as $data){
            ?>

        <img src="/img/galaxys21.png" class="icon" />
        <span style="margin-left:10px;font-weight:bold">Tài khoản:
            {{$data['id_account']}}</span>
        @if($data['id_account_rep']!='null')
        <span style="color:blue;margin-left:10px">đã trả lời: <b>{{$data['id_account_rep']}}</b></span>
        @endif
        <div class="rate">
            <div>{{$data['content']}}</div>
            <img src="/img/galaxys21.png" width="100px" height="100px" />
            <br>
            <form action="{{route('xl-binh-luan-rep')}}" method="POST" enctype="multipart/form-data">
                @csrf
                Nội dung
                <input type="hidden" name="id" value="{{$baiDang['id']}}">

                <input type="hidden" name="rep" value="{{$data['id_account']}}">
                <input type="text" name="content" class="">
                Chọn hình
                <input type="file" name="picture" class="">
                <br>
            </form>
            <a href="{{route('xoa-tra-loi',['id'=>$data['id'], 'id_post'=>$data['id_post']])}}"> <button class="buy" style="background-color:red">Xóa trả lời</button></a>
        </div>
        <hr>
        <?php } ?>

    </div>
</body>