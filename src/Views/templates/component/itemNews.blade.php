<div class="item_tt">
    <a class="img card-image block overflow-hidden aspect-[390/290]" href="{{url('slugweb',['slug'=>$news->slugvi])}}" title="{{$news->namevi}}">
        <img class="w-full  transition-all group-hover:scale-[1.1]" onerror="this.src='{{thumbs('thumbs/390x290x1/assets/images/noimage.png')}}';" src="{{assets_photo('news','390x290x1',$news->photo,'thumbs')}}" alt="{{$news->namevi}}">
    </a>
    <div class="tttt">
        <span>Ngày đăng: {{\Carbon\Carbon::parse($news->created_at)->format('d/m/Y')}} - by Admin</span>
        <h3><a class="ten text-split text-decoration-none " href="{{url('slugweb',['slug'=>$news->slugvi])}}" title="{{$news->namevi}}">{{$news->namevi}}</a></h3> 
        {!! $slot !!}
    </div>
</div>