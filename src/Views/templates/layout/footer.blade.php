<footer class="footer-wrapper">
    <div class="footer-article">
        <div class="wrap-content d-flex flex-wrap justify-content-between align-items-start">
            <div class="footer-news text-center wow animate__fadeInUp"
            data-wow-duration="1.4s"
            >
                <a class="logo-footer d-block text-center m-auto peShiner" href="">
                    <img 
                    onerror="this.src='{{ thumbs('thumbs/140x140x1/assets/images/noimage.png') }}';"
                    src="{{ assets_photo('photo', '140x140x1', $logo->photo,'thumbs') }}" alt="{{ $setting->namevi }}">
                </a>
            </div>
            <div class="footer-news wow animate__fadeInDown" data-wow-duration="1.4s"
            >
                <div class="footer-title"> thông tin liên hệ </div>
                <div class="footer-desc"> 
                    {!! htmlspecialchars_decode($footer["desc$lang"] ?? "") !!}
                </div>               
            </div>

            <div class="footer-news wow animate__fadeInUp"
            data-wow-duration="1.4s"
            >
                <p class="footer-title"> chính sách </p>
                <ul class="footer-ul">
                    @foreach ($policies as $v)
                        <li>
                            <a href="{{$v["slug$lang"]}}">{{$v["name$lang"]}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-news wow animate__fadeInUp" data-wow-duration="1.4s">
                <div class="fb-page" data-href="<?= $optSetting["fanpage"] ?>" data-tabs="timeline" data-width="312" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="<?= $optSetting["fanpage"] ?>" class="fb-xfbml-parse-ignore">
                        <a href="<?= $optSetting["fanpage"] ?>">Facebook</a>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-powered">
        <div class="wrap-content">
            <p class="copyright  text-black text-[13px] mb-0">{{$setting['namevi']}}. All rights reserved. Design by
                NiNa Co.,Ltd</p>
            <div class="statistic">
                <span>Đang Online: {{ Statistic::getOnline() }} </span>
                <span>Truy cập ngày: {{ Statistic::getTodayRecord() }} </span>
                <span>Truy cập tháng: {{ Statistic::getMonthRecord() }} </span>
                <span>Tổng truy cập: {{ Statistic::getTotalRecord() }} </span> 
            </div>                
        </div>
    </div>
    <div class="footer-map">
        {!! Func::decodeHtmlChars($optSetting['coords_iframe']??'') !!}
    </div>

    <a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="https://zalo.me/<?= preg_replace('/[^0-9]/', '', $optSetting['zalo']); ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i>
            <img src="assets/images/zl.png" alt="zl.png" width="35"  height="35">
        </i>
    </a>
    <a class="btn-phone btn-frame text-decoration-none" href="{{ $optSetting['link_googlemaps'] }}">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i>
            <img src="assets/images/chiduong.png" alt="chiduong.png" width="35"  height="35">
        </i>
    </a>   
</footer>
