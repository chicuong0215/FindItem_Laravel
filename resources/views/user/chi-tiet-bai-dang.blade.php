@include('components.head')

<body style="text-align:left">
    <div class="main_device">
        <img src="anhbaidang/{{$post['picture']}}" class="left" />
        <div class="right">
            <img src="anhavatar/" class="icon" />
            <br>
            <b>Người đăng:</b> {{$post['id_account']}}
            <h4 class="details"><b>Tiêu đề:</b> {{$post['title']}}</h4>
            <h4 class="details"><b>Nội dung:</b> {{$post['content']}}</h4>
            <h4 class="details"><b>Loại:</b> {{$post['id_type']=='find'?'Tìm đồ':'Nhặt đồ'}}</h4>
            <h4 class="details"><b>Nội dung:</b> {{$post['content']}}</h4>
            <b>Ngày đăng:</b> {{$post['created_at']}}<br>
            <br>
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
            <input type="hidden" name="id" value="{{$post['id']}}">
            <input type="text" name="content" class="input">
            <button class="buy">Đăng</button>
            <br>
        </form>
        <hr>
        <!-- danh sách bình luận-->

        <div style="font-weight:bold">Danh sách bình luận:</div>
        <br>

        @foreach($comment as $data)
        <b>Tài khoản:</b> {{$data['id_account']}}
        @if($data['id_account_rep']!='null')
        <span style="color:blue">đã trả lời <b style="color:black">Tài khoản: </b><span
                style="color:black">{{$data['id_account_rep']}}</span></span>
        @endif
        <div class="rate">
            <div class="rate2">{{$data['content']}}</div>
            <!-- <img src="img/galaxys21.png" width="100px" height="100px" /> -->
            <br>
            <button class="add" onclick="rep({{$data['id']}})">Trả lời</button>
            <br>
            <form style="display:none" id="{{$data['id']}}" action="{{route('xl-binh-luan-rep')}}" method="POST">
            @csrf
                Nội dung
                <br>
                <br>
                <input type="hidden" name="id" value="{{$post['id']}}">
                <input type="hidden" name="rep" value="{{$data['id_account']}}">
                <input type="text" name="content" class="input">
                <button class="buy">Trả lời</button>
                <br>
            </form>
        </div>
        <hr>
        @endforeach
    </div>
    <script>
    function rep(id) {
        var e = document.getElementById(id);
        if (e.style.display == 'none') {
            e.style.display = 'block';
        } else {
            e.style.display = 'none';
        }
    }
    </script>

</body>