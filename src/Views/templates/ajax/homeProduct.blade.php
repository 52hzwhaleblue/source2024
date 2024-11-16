@if (!empty($productAjax))
    <div class="productAjax-grid">
        <a href="{{$productList["slugvi"]}}" 
        class="productAjax-banner scale-img hover_sang1 wow animate__bounceInLeft" 
        data-wow-duration="1.4s"
        >
            <img class="scale-img w-100 h-100" 
            onerror="this.src='{{thumbs('thumbs/405x280x1/assets/images/noimage.png')}}';" src="{{assets_photo('product','405x280x1',$productList->photo,'thumbs')}}" alt="{{$productList["namevi"]}}">
        </a>

        @foreach ($productAjax as $k => $v)
            @php $time = 0; $time += $k / 25 * 10; @endphp
            <div class="product wow animate__fadeInUp" data-wow-duration="{{$time.'s'}}">
                <div class="pic-product">
                    <a class="scale-img" href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                        title="{{ $v['namevi'] }}">
                        <img onerror="this.src='{{ thumbs('thumbs/540x540x1/assets/images/noimage.png') }}';"
                            src="{{ assets_photo('product', '540x540x1', $v['photo'], 'thumbs') }}" alt="{{ $v['namevi'] }}">
                    </a>
                </div>
                <h3 class="name-product">
                    <a class="text-split text-decoration-none" href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                        title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a>
                </h3>
                <p class="price-product">
                    @if (empty($v->sale_price))
                        @if (empty($v->regular_price))
                            <span class="price-new">Liên hệ</span>
                        @else
                            <span class="price-new">{{ Func::formatMoney($v->regular_price) }}</span>
                        @endif

                        @else
                            <span class="price-new">{{ Func::formatMoney($v->sale_price) }}</span>
                            <span class="price-old">{{ Func::formatMoney($v->regular_price) }}</span>
                            <span class="price-per">-{{ $v->discount }}%</span>
                    @endif
                </p>
            </div>        
        @endforeach
    </div>
@endif