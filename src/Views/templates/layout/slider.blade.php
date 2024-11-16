
<div class="slideshow">
    <div class="wrap-content">
        <div class="slideshow-owl">
            <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:1" data-rewind="1" data-autoplay="1"
            data-loop="0" data-lazyload="0" data-mousedrag="0" data-touchdrag="0" data-smartspeed="800" data-autoplayspeed="800"
            data-autoplaytimeout="5000" data-dots="0"
            data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
            data-nav="1" data-navcontainer=".control-slideshow">
            @foreach ($slider as $v)
                <div class="slideshow-item block" owl-item-animation>
                    <a class="slideshow-image " href="" target="_blank" title="{{ $v['namevi'] }}">
                        <picture>
                            <source media="(max-width: 640px)" srcset="{{ assets_photo('photo','640x260x1',$v['photo'],'thumbs') }}">
                            <img class="w-100" onerror="this.src='assets/images/noimage.png';"
                                src="{{ assets_photo('photo','1030x400x1',$v['photo'],'thumbs') }}" alt="{{ $v['namevi'] }}"
                                title="{{ $v['namevi'] }}" />
                        </picture>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="control-slideshow control-owl transition"></div>
        </div>
    </div>
</div>
