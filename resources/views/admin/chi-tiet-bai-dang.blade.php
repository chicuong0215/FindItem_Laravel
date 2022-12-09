@include('components.head-admin')

<body style="text-align:center">
    <div class="main_device">
        @if ($post->picture != 'null')
            <img src="/anhbaidang/{{ $post->picture }}" class="left" />
        @else
            <i>Không có hình ảnh</i>
        @endif
        <div class="right">
            <img src="/anhavatar/{{ $post->user->picture }}" class="icon" />
            <br>
            <b>Người đăng:</b> {{ $post->user->username }}
            <h4 class="details"><b>Tiêu đề:</b> {{ $post['title'] }}</h4>
            <h4 class="details"><b>Nội dung:</b> {{ $post['content'] }}</h4>
            <h4 class="details"><b>Loại:</b> {{ $post['type_id'] == 1 ? 'Tìm đồ' : 'Nhặt đồ' }}</h4>
            <h4 class="details"><b>Nội dung:</b> {{ $post['content'] }}</h4>
            <b>Ngày đăng:</b> {{ $post['created_at'] }}<br>
            <br>
            @if ($post['active'] == 0)
                <a href="{{ route('phe-duyet-2', ['id' => $post['id']]) }}"><button
                        class="{{ $post['active'] == 1 ? 'buy' : 'buy2' }}"
                        style="margin-bottom: 10px;">{{ $post['active'] == 1 ? 'Đã phê duyệt' : 'Chưa phê duyệt' }}</button><a />
            @endif
            @if ($post['active'] == 1)
                <a href="{{ route('xoa-bai-dang-admin-2', ['id' => $post['id']]) }}"><button class="buy"
                        style="margin-bottom: 10px;background-color:{{ $post['stt'] == 1 ? 'red' : 'blue' }}">{{ $post['stt'] == 1 ? 'Xóa bài đăng' : 'Khôi phục' }}</button></a>
            @endif
        </div>
        <img src="" class="bg" />
    </div>
    <hr>


    <!-- bình luận -->
    <div style="text-align: left">
        <h2 class="rate">Bình luận:</h2>


        <!-- parent -->
        <div class="rate">

            <!-- danh sách bình luận-->

            <div style="font-weight:bold">Danh sách bình luận:</div>

            @foreach ($comment as $data)
                <img src="/anhavatar/{{ $data->user->picture }}" class="icon" />
                <span style="margin-left:10px">Tài khoản:
                    <b>{{ $data->user->fullname }}</b></span>
                @if ($data['id_account_rep'] != -1)
                    <span style="margin-left:10px">đã trả lời: <b>{{ $data->user->fullname }}</b></span>
                @endif
                <div class="rate">
                    <div style="display:inline">{{ $data['content'] }}</div>
                    <a href="{{ route('xoa-tra-loi', ['id' => $data['id'], 'post_id' => $data['post_id']]) }}"> <button
                            class="buy" style="background-color:red">Xóa trả lời</button></a>
                </div>
                <hr>
            @endforeach

        </div>
    </div>
</body>
