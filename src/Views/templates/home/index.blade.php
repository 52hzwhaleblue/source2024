@extends('layout')
@section('content')

@php
    /*
        ========== SNIPPETS ==========
        isNotEmpty
        gioithieu
        newsHot
    */
@endphp
@if($criteria->isNotEmpty())
    <div class="criteria-wrapper" style="overflow: hidden;" >
        <div class="wrap-content">
            <div class="owl-page owl-carousel owl-theme"
                data-items="screen:0|items:1|margin:10,screen:425|items:1|margin:10,screen:575|items:2|margin:10,screen:767|items:2|margin:10,screen:991|items:2|margin:20,screen:1199|items:4|margin:20"
                data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1"
                data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000" data-dots="1" data-animations=""
                data-nav="0" data-navcontainer="">
                @foreach($criteria as $k => $v)
                    @php $time = 0; $time += $k / 25 * 10; @endphp
                    <div class="criteria-item wow animate__fadeInUp" 
                    data-wow-duration="{{$time.'s'}}">
                        <div class="criteria-pic rotateY_img">
                            <img class="scale-img" 
                            onerror="this.src='{{thumbs('thumbs/59x59x1/assets/images/noimage.png')}}';" src="{{assets_photo('news','',$v->photo,'')}}" alt="{{$v->namevi}}">
                        </div>
                        <div class="criteria-info">
                            <p class="criteria-name"> {{$v["name$lang"]}} </p>
                            <p class="criteria-desc text-split"> {{$v["desc$lang"]}} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif   

@if($productListHot->isNotEmpty())
    <div class="productListHot-wrapper" style="overflow:hidden;">
        @foreach ($productListHot as $klist => $vlist)
            <div class="productListHot-item">
                <div class="wrap-content">
                    <div class="productListHot-heading">
                        <div class="productListHot-wrap">
                            <h3 class="productListHot-list text-split">
                                {{$vlist["name$lang"]}}
                            </h3>   
    
                            @if ($vlist->getCategoryCats()->get()->isNotEmpty())
                                <div class="productListHot-cats">
                                    @foreach ($vlist->getCategoryCats()->get() as $vcat)
                                        <div>
                                            <p class="productListHot-click"
                                            data-url="{{ url('load-product') }}"
                                            data-idl="{{$vlist['id']}}"
                                            data-idc="{{$vcat['id']}}"
                                            >
                                                {{$vcat["name$lang"]}}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="{{$vcat["slug$lang"]}}" class="cats-btn hover_xemthem">Xem tất cả</a>
                            @endif
                        </div>
                    </div>
    
                    @if ($vlist->getCategoryItems()->get()->isNotEmpty())
                        <div class="productListHot-brands">
                            <div class="productListHot-wrap">
                                @foreach($vlist->getCategoryItems()->get() as $vitem)
                                    @php $time = 0; $time += $k / 25 * 10; @endphp
                                    <a  href="{{$vitem["slug$lang"]}}"  class="productListHot-brand wow animate__fadeInUp" 
                                    data-wow-duration="{{$time.'s'}}">
                                        <img class="scale-img" 
                                        onerror="this.src='{{thumbs('thumbs/105x50x1/assets/images/noimage.png')}}';" 
                                        src="{{assets_photo('product','105x50x1',$vitem->photo,'thumbs')}}" alt="{{$vitem->namevi}}">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- @if($producBrandHot->isNotEmpty())
                        <div class="productListHot-brands">
                            <div class="productListHot-wrap">
                                @foreach($producBrandHot as $k => $v)
                                    @php $time = 0; $time += $k / 25 * 10; @endphp
                                    <a  href="{{$v["slug$lang"]}}"  class="productListHot-brand wow animate__fadeInUp" 
                                    data-wow-duration="{{$time.'s'}}">
                                        {{$v["name$lang"]}}     
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif --}}
    
                    {{-- load-product --}}
                    <div class="load-product load-product-{{$vlist['id']}}"></div>
                </div>
            </div>
            @if(!empty($vlist->banner))
                <a href="{{$vlist["slugvi"]}}" 
                class="productListHot-banner wow animate__fadeInUp" 
                data-wow-duration="1.4s">
                    <img class="scale-img w-100 h-100" 
                    onerror="this.src='{{thumbs('thumbs/1366x200x1/assets/images/noimage.png')}}';" src="{{assets_photo('product','1366x200x1',$vlist->banner,'thumbs')}}" alt="{{$vlist["namevi"]}}">
                </a>
            @endif
        @endforeach
    </div>
@endif

@if($partner->isNotEmpty())
    <div class="partner-wrapper" style="overflow: hidden;">
        <div class="wrap-content wow animate__fadeInUp" data-wow-duration="1.4s" >
            <div class="partner-owl" >
                <div class="owl-page owl-carousel owl-theme"
                    data-items="screen:0|items:2|margin:10,screen:425|items:3|margin:10,screen:575|items:4|margin:10,screen:767|items:5|margin:10,screen:991|items:6|margin:20,screen:1199|items:11|margin:10"
                    data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1"
                    data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000" data-dots="0" data-animations=""
                    data-nav="0" 
                    data-navtext = "<img src='assets/images/prev.png'> | <img src='assets/images/next.png'>"
                    data-navcontainer=".control-partner">
                    @foreach($partner as $k => $v)
                        @php $time = 0; $time += $k/2 +  0.5;  @endphp
                        <a 
                        class="partner-pic scale-img hover_sang3 wow animate__fadeInUp" data-wow-duration="{{$time.'S'}}"
                        href="{{$v['link']}}" >
                            <img class="w-100" onerror="this.src='{{thumbs('thumbs/110x60x1/assets/images/noimage.png')}}';" src="{{assets_photo('photo','110x60x1',$v->photo,'thumbs')}}" alt="{{$v->namevi}}"> 
                        </a>
                    @endforeach
                </div>
                <div class="control-partner control-owl transition"></div>
            </div>
        </div>
    </div>
@endif

<div class="baiviet-wrapper">
    <div class="wrap-content">
        <div class="baiviet-grid">
            @if ($cauhoithuonggap->isNotEmpty())
                <div class="baiviet-box wow animate__fadeInLeft" 
                data-wow-duration="1.4s">
                    <p class="baiviet-title">
                        <img src="assets/images/icon1.png" alt="icon1.png">
                        <span>Hướng dẫn - Câu hỏi thường gặp</span>                    
                    </p>
                    <div class="baiviet-slick">
                        @foreach ($cauhoithuonggap as $v)
                            <div class="baiviet-item">
                                <a href="{{$v["slug$lang"]}}" class="baiviet-pic scale-img">
                                    <img class="w-100" onerror="this.src='{{thumbs('thumbs/180x100x1/assets/images/noimage.png')}}';" src="{{assets_photo('news','180x100x1',$v->photo,'thumbs')}}" alt="{{$v->namevi}}"> 
                                </a>
                                <h3 class="baiviet-name">
                                    <a class="text-split" href="{{$v["slug$lang"]}}">
                                    {{$v["name$lang"]}}</a>
                                </h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($tailieukythuat->isNotEmpty())
                <div class="baiviet-box wow animate__fadeInUp" 
                data-wow-duration="1.4s">
                    <p class="baiviet-title">
                        <img src="assets/images/icon2.png" alt="icon2.png">
                        <span>TÀI LIỆU KỸ THUẬT</span>                    
                    </p>
                    <div class="baiviet-slick">
                        @foreach ($tailieukythuat as $v)
                            <div class="baiviet-item">
                                <a href="{{$v["slug$lang"]}}" class="baiviet-pic scale-img">
                                    <img class="w-100" onerror="this.src='{{thumbs('thumbs/180x100x1/assets/images/noimage.png')}}';" src="{{assets_photo('news','180x100x1',$v->photo,'thumbs')}}" alt="{{$v->namevi}}"> 
                                </a>
                                <h3 class="baiviet-name">
                                    <a class="text-split" href="{{$v["slug$lang"]}}">
                                    {{$v["name$lang"]}}</a>
                                </h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif 

            @if ($banggiasanpham->isNotEmpty())
                <div class="baiviet-box wow animate__bounceInRight" 
                data-wow-duration="1.4s">
                    <p class="baiviet-title">
                        <img src="assets/images/icon3.png" alt="icon3.png">
                        <span>BẢNG GIÁ SẢN PHẨM</span>                    
                    </p>
                    <div class="baiviet-slick">
                        @foreach ($banggiasanpham as $v)
                            <div class="baiviet-item">
                                <a href="{{$v["slug$lang"]}}" class="baiviet-pic scale-img">
                                    <img class="w-100" onerror="this.src='{{thumbs('thumbs/180x100x1/assets/images/noimage.png')}}';" src="{{assets_photo('news','180x100x1',$v->photo,'thumbs')}}" alt="{{$v->namevi}}"> 
                                </a>
                                <h3 class="baiviet-name">
                                    <a class="text-split" href="{{$v["slug$lang"]}}">
                                    {{$v["name$lang"]}}</a>
                                </h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif                        
        </div>
    </div>
</div>


@if($tagTuKhoa->isNotEmpty())
    <div class="tagTuKhoa-wrapper" style="overflow:hidden;">
        <div class="wrap-content">
            <div class="tagTuKhoa-items">
                @foreach ($tagTuKhoa as $v)
                    @php $time = 0; $time += $k / 25 * 10; @endphp
                    <a href="{{$v['link']}}" 
                    class="tagTuKhoa-name wow animate__fadeInRight"
                     data-wow-duration="1.4s"
                    >
                    <img src="assets/images/icon-tag.png" alt="icon-tag">
                        {{$v["name$lang"]}}
                    </a>
                @endforeach
            </div>
            
        </div>
    </div>
@endif

@endsection