@include('components.head-admin')

<body style="text-align:left">
    <div class="main_device">
        <img src="/anhbaidang/{{$post['picture']}}" class="left" />
        <div class="right">
            <h4 class="name">Người đăng: {{$post['id_account']}}</h4>
            <h4 class="name">Tiêu đề: {{$post['title']}}</h4>
            <h5 class="details">Nội dung:<br />{{$post['content']}}</h5>
            <h5 class="details">Loại: {{$post['id_type']=='find'?'Tìm đồ':'Nhặt đồ'}}</h5>
            <h5 class="details"><b>Ngày đăng: {{$post['created_at']}}</b><br>
                <br>

            </h5>
            @if($post['active']==0)
            <a href="{{route('phe-duyet-2',['id'=>$post['id']])}}"><button
                    class="{{$post['active']==1?'buy':'buy2'}}"
                    style="margin-bottom: 10px;">{{$post['active']==1?'Đã phê duyệt':'Chưa phê duyệt'}}</button><a />
                @endif
                @if($post['active']==1)
                <a href="{{route('xoa-bai-dang-admin-2',['id'=>$post['id']])}}"><button class="buy"
                        style="margin-bottom: 10px;background-color:{{$post['stt']==1?'red':'blue'}}">{{$post['stt']==1?'Xóa bài đăng':'Khôi phục'}}</button></a>
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

        @foreach($comment as $data)
        <img src="/img/galaxys21.png" class="icon" />
        <span style="margin-left:10px;font-weight:bold">Tài khoản:
            {{$data['id_account']}}</span>
        @if($data['id_account_rep']!='null')
        <span style="color:blue;margin-left:10px">đã trả lời: <b>{{$data['id_account_rep']}}</b></span>
        @endif
        <div class="rate">
            <div style="display:inline">{{$data['content']}}</div>
            <form action="{{route('xl-binh-luan-rep')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$post['id']}}">

                <input type="hidden" name="rep" value="{{$data['id_account']}}">
                <br>
            </form>
            <a href="{{route('xoa-tra-loi',['id'=>$data['id'], 'id_post'=>$data['id_post']])}}"> <button class="buy"
                    style="background-color:red">Xóa trả lời</button></a>
        </div>
        <hr>
        @endforeach

    </div>
</body>