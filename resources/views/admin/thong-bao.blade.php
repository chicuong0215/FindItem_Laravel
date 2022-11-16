@include('components.head-admin')

@foreach($thongBao as $data)
<div class="line">
    <img src="/anhthongbao/{{$data['picture']}}" class="imgnews" />
    <h3 class="contentnews">{{$data['content']}}</h3>
    <br>
    <a href="{{route('xoa-thong-bao',['id'=>$data['id']])}}"><button class="buy" style="margin-bottom: 10px;background-color:red">Xóa thông báo</button></a>
</div>
@endforeach