<div class="w-menu" 
    x-data="{ isFixed: false , open: {{ (@$com != 'trang-chu') ? "false" : "true" }} }" 
    x-init="
        if (!['index', '/'].includes('{{ request()->path() }}')) {
            window.addEventListener('scroll', () => {
                isFixed = window.scrollY > 0;
                open = false;       
            })
            open = false;       
        }else{
            window.addEventListener('scroll', () => {
                isFixed = window.scrollY > 420;
                open = !isFixed;
            })
        }
    "
     x-bind:class="isFixed ? 'fix-head' : '' "
     >
    <div class="menu">
        <div class="wrap-content">
            <div class="menu-head-left"
            @php 

            @endphp
                x-on:click="
                    if (!['index', '/'].includes('{{ request()->path() }}')) {
                        open = !open  
                    }else{
                        isFixed && (open = !open)
                    }                        
                "
                x-on:mouseover="open = true" x-on:mouseleave="open = false"
                >
                <p class="title-menu" >
                    <span>Danh mục sản phẩm</span>
                </p>
                <div class="menu-product-list" x-show="open" x-transition>
                    <ul id="style-3" >
                        @foreach ($productListMenu ?? [] as $vlist)
                            <li x-data="{ open: false }" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                                <a
                                    class="transition group-hover:text-[#fed402]"
                                    href="{{ url('slugweb', ['slug' => $vlist['slugvi']]) }}"
                                    title="{{ $vlist['namevi'] }}">
                                    {{ $vlist['namevi'] }}
                                    {!! $vlist->getCategoryCats()->get()->isNotEmpty() ? '<span class="icon-down">&#8250;</span>' : '' !!}
                                </a>
                                
                                @if ($vlist->getCategoryCats()->get()->isNotEmpty())
                                    <ul x-show="open" x-transition>
                                        @foreach ($vlist->getCategoryCats()->get() ?? [] as $vcat)
                                            <li>
                                                <a class="transition group-hover:text-[#fed402]"
                                                    href="{{ url('slugweb', ['slug' => $vcat['slugvi']]) }}"
                                                    title="{{ $vcat['namevi'] }}">{{ $vcat['namevi'] }}</a>
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
                </div>
            </div>
            
            <ul class="ul-main flex flex-wrap items-center justify-between">
                <li><a href="san-pham" 
                    class="transition @if(@$com == 'san-pham') {{'active'}}  @endif "> 
                    Sản phẩm
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
        </div>
    </div>
</div>


