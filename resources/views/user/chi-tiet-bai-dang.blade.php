@include('components.head')
<br />
<br />
@if(Auth::user()!=NULL)
<a href="{{route('thong-tin-ca-nhan')}}" id="technology" class="h1">Tài khoản: {{Auth::user()->username}}</a>
<a href="{{route('dang-xuat')}}" id="technology" class="h1">Thoát</a>
@else
<div class="text">Vui lòng đăng nhập để sử dụng đầy đủ tính năng</div>
<br />
<a href="{{route('dang-nhap')}}" id="technology" class="h1">Đăng Nhập</a>
<a href="{{route('dang-ky')}}" id="technology" class="h1">Đăng Ký</a>
@endif
<br />
<br />

<body style="text-align:center">
    <div class="main_device" style="text-align:left">
        @if($post['picture']!='null')
        <img src="anhbaidang/{{$post['picture']}}" class="left" />
        @else
        <i>Không có hình ảnh</i>
        @endif
        <div class="right">
            <a href="{{route('thong-tin-ca-nhan-2',['id'=>$post['account_id']])}}"><img
                    src="anhavatar/{{$post->user->picture}}" class="icon" /></a>
            <br>
            <b>Người đăng:</b> {{$post->user->username}}
            <h4 class="details"><b>Tiêu đề:</b> {{$post['title']}}</h4>
            <h4 class="details"><b>Nội dung:</b> {{$post['content']}}</h4>
            <h4 class="details"><b>Loại:</b> {{$post['type_id']==1?'Tìm đồ':'Nhặt đồ'}}</h4>
            <h4 class="details"><b>Địa chỉ:</b> {{$post['address']}}</h4>
            <b>Ngày đăng:</b> {{$post['created_at']}}<br>
            <br>
            @if(Auth::user()!=null)
            <a href="{{route('nhan-tin',['id'=>$post->account_id])}}"><button class="add">Nhắn tin</button></a>
            <button class="buy" onclick="">Quan tâm bài viết</button>
            @endif
        </div>
    </div>
    <hr>

    <div style="text-align:left">
        <!-- bình luận -->
        <h2 class="rate">Bình luận:</h2>

        <!-- parent -->
        <div class="rate">
            @if(Auth::user()!=NULL)
            <form action="{{route('xl-binh-luan')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2>Bình luận của bạn:</h2>
                <input type="hidden" name="id" value="{{$post['id']}}">
                <input type="text" name="content" class="input">
                <button class="buy">Đăng</button>
                <br>
            </form>
            @endif
            <hr>
            <!-- danh sách bình luận-->

            <div style="font-weight:bold">Danh sách bình luận:</div>
            <br>

            @foreach($comment as $data)
            <b>Tài khoản:</b> {{$data->user->username}}
            @if($data['account_rep_id']!=-1)
            <span style="color:blue">đã trả lời <b style="color:black">Tài khoản: </b><span
                    style="color:black">{{$data->userRep->username}}</span></span>
            @endif
            <div class="rate">
                <div class="rate2">{{$data['content']}}</div>
                <br>

                @if(Auth::user()!=NULL)
                <button class="add" onclick="rep({{$data['id']}})">Trả lời</button>
                @else
                <button class="add"> <a href="{{route('dang-nhap')}}"
                        style="color:while;text-decoration:none;font-weight:bold">Đăng nhập để bình luận </a></button>
                @endif
                <br>

                <form style="display:none" id="{{$data['id']}}" action="{{route('xl-binh-luan-rep')}}" method="POST">
                    @csrf
                    Nội dung
                    <br>
                    <br>
                    <input type="hidden" name="id" value="{{$post['id']}}">
                    <input type="hidden" name="rep" value="{{$data['account_id']}}">
                    <input type="text" name="content" class="input">
                    <button class="buy">Trả lời</button>
                    <br>
                </form>

            </div>
            <hr>
            @endforeach
        </div>
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
