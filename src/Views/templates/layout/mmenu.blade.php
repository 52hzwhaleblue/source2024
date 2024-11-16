<nav id="menu">
    <ul>
        <li><a href="" 
            class="transition @if(@$com == '' || @$com == 'index') {{'active'}}  @endif "> 
            Trang chủ
        </a></li>

        <li><a href="gioi-thieu" 
            class="transition @if(@$com == 'gioi-thieu') {{'active'}}  @endif "> 
            Giới thiệu
        </a></li>

        <li><a href="san-pham" 
            class="transition @if(@$com == 'san-pham') {{'active'}}  @endif "> 
            Sản phẩm
            <ul>
                @foreach ($listProductMenu ?? [] as $vlist)
                    <li x-data="{ open: false }" x-on:mouseover="open = true" x-on:mouseleave="open = false"><a
                            class="transition group-hover:text-[#fed402]"
                            href="{{ url('slugweb', ['slug' => $vlist['slugvi']]) }}"
                            title="{{ $vlist['namevi'] }}">{{ $vlist['namevi'] }}
                            {!! $vlist->getCategoryCats()->get()->isNotEmpty() ? '<span class="icon-down">&#8250;</span>' : '' !!}</a>
                        @if ($vlist->getCategoryCats()->get()->isNotEmpty())
                            <ul x-show="open" x-transition>
                                @foreach ($vlist->getCategoryCats()->get() ?? [] as $vcat)
                                    <li>
                                        <a class="transition group-hover:text-[#fed402]"
                                            href="{{ url('slugweb', ['slug' => $vcat['slugvi']]) }}"
                                            title="{{ $vcat['namevi'] }}">{{ $vcat['namevi'] }} <span>Xem tất cả
                                                &#8250;</span></a>
                                        <ul>
                                            @foreach ($vcat->getCategoryItems()->get() ?? [] as $vitem)
                                                <li>
                                                    <a class="transition group-hover:text-[#fed402]"
                                                        href="{{ url('slugweb', ['slug' => $vitem['slugvi']]) }}"
                                                        title="{{ $vitem['namevi'] }}">{{ $vitem['namevi'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach                
            </ul>

        </a></li>
        <li class="line"></li>
        <li><a href="thuong-hieu" 
            class="transition @if(@$com == 'thuong-hieu') {{'active'}}  @endif "> 
            Thương hiệu
        </a></li>   
        <li class="line"></li>
        
        <li><a href="khuyen-mai" 
            class="transition @if(@$com == 'khuyen-mai') {{'active'}}  @endif "> 
            Khuyến mãi
        </a></li> 
        <li class="line"></li>

        <li><a href="bang-gia-san-pham" 
            class="transition @if(@$com == 'bang-gia-san-pham') {{'active'}}  @endif "> 
            Bảng giá
        </a></li>   
        <li class="line"></li>

        <li><a href="tin-tuc" 
            class="transition @if(@$com == 'tin-tuc') {{'active'}}  @endif "> 
            Tin tức
        </a></li> 
        <li class="line"></li>

        <li><a href="lien-he" 
            class="transition @if(@$com == 'lien-he') {{'active'}}  @endif "> 
            Liên hệ
        </a></li> 
    </ul>
</nav>
