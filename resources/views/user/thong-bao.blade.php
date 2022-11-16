@include('components.head')

@foreach($thongBao as $data)
<div class="line">
    <img src="/anhthongbao/{{$data['picture']}}" class="imgnews" />
    <h3 class="contentnews">{{$data['content']}}</h3>
</div>
@endforeach