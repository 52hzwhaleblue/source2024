<header class="header-wrapper z-100">
    <div class="header-top">
        <div class="wrap-content flex flex-wrap items-center justify-between">
            <div>
                <a href="tel:{{$optSetting['hotline']}}" class="hotline-header">
                    {{Func::formatPhone($optSetting['hotline'])}}
                </a>
                <a href="mailto:{{$optSetting['email']}}" class="email-header">
                    {{$optSetting['email']}}
                </a>                
            </div>

            <div class="menu-link">
                <a href="">Trang chủ</a>
                <a href="gioi-thieu">Giới thiệu</a>
                <a href="lien-he">Liên hệ</a>
            </div>
        </div>
    </div>
    <div class="header-box">
        <div class="wrap-content flex flex-wrap items-center justify-between">
                <a id="hamburger" href="#menu" title="Menu"><span></span></a>
                <a class="logo-mm d-none" href="">
                    <img 
                    onerror="this.src='{{ thumbs('thumbs/80x80x1/assets/images/noimage.png') }}';"
                    src="{{ assets_photo('photo', '80x80x1', $logo->photo,'thumbs') }}" alt="{{ $setting->namevi }}">
                </a>
                <div class="logo-info">
                    <a class="logo-header peShiner" href="">
                        <img 
                        onerror="this.src='{{ thumbs('thumbs/80x80x1/assets/images/noimage.png') }}';"
                        src="{{ assets_photo('photo', '80x80x1', $logo->photo,'thumbs') }}" alt="{{ $setting->namevi }}">
                    </a>
                    <p class="logo-name"> {{ $logo["name$lang"] }} </p>
                </div>

                <div class="header-mid">
                    <p class="logo-desc"> 
                        <span class="text-wrapper">
                            <span class="letters">{{ $slogan["name$lang"] }}</span>
                        </span> 
                    </p>
                    <div class="search">
                        <div class="search-flex flex items-center justify-between">
                            <input type="text" id="keyword" class="search-auto flex-1" placeholder="Bạn cần tìm gì"
                                onkeypress="doEnter(event,'keyword');">
                            <i class="fal fa-search"></i>                                
                            <p class="mb-0" onclick="onSearch('keyword');">
                                Tìm kiếm
                            </p>
                        </div>
                        <div class="show-search"></div>
                    </div>
                </div>
                <a href="gio-hang" class="cart-head">
                    <div class="img">
                        <img src="assets/images/cart1.png" alt="cart1.png">
                    </div>
                    <span class="text-cart">Giỏ hàng</span> 
                    <b class="" >
                        <span class="count-cart">
                            {{Cart::count()}} 
                        </span>
                        sản phẩm
                    </b>
                </a>
                <div class="search-icon d-none">
                    <img src="assets/images/search-icon.png" alt="search-icon">
                </div>
                <div class="search2 w-clear">
                    <input type="text" id="keyword" placeholder="Nhập từ khóa tìm kiếm"
                        onkeypress="doEnter(event,'keyword');"
                        value="<?= (!empty($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" />
                    <p onclick="onSearch('keyword');">
                        <i class="fal fa-search"></i> 
                    </p>
                </div>
        </div>
    </div>

    <div class="menu-wrapper">
        @include('layout.menu')
        @include('layout.mmenu')
    </div>
</header>