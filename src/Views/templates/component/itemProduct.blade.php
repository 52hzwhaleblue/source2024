@if($com == 'thuong-hieu')
    <div class="product wow animate__fadeInUp" data-wow-duration="{{$time}}">
        <div class="pic-product">
            <a class="scale-img d-block" href="{{ url('slugweb', ['slug' => $product["slug$lang"]]) }}"
                title="{{ $product["name$lang"] }}">
                <img onerror="this.src='{{ thumbs('thumbs/540x540x1/assets/images/noimage.png') }}';"
                    src="{{ assets_photo('product', '540x540x2', $product['photo'], 'thumbs') }}" alt="{{ $product["name$lang"] }}">
            </a>
        </div>
        <h3 class="name-product">
            <a class="text-split text-decoration-none" href="{{ url('slugweb', ['slug' => $product["slug$lang"]]) }}"
                title="{{ $product["name$lang"] }}">{{ $product["name$lang"] }}</a>
        </h3>
    </div>
@else
    <div class="product">
        <div class="pic-product">
            <a class="scale-img img block aspect-[300/200]" href="{{ url('slugweb', ['slug' => $product['slugvi']]) }}"
                title="{{ $product['namevi'] }}">
                <img onerror="this.src='{{ thumbs('thumbs/300x200x1/assets/images/noimage.png') }}';"
                    src="{{ assets_photo('product', '300x200x1', $product['photo'], 'thumbs') }}" alt="{{ $product['namevi'] }}">
            </a>
        </div>
        <h3 class="name-product">
            <a class="text-split text-decoration-none" href="{{ url('slugweb', ['slug' => $product['slugvi']]) }}"
                title="{{ $product['namevi'] }}">{{ $product['namevi'] }}</a>
        </h3>
        <p class="price-product">

            @if (empty($product->sale_price))
                @if (empty($product->regular_price))
                    <span class="price-new">Liên hệ</span>
                @else
                    <span class="price-new">{{ Func::formatMoney($product->regular_price) }}</span>
                @endif
            @else
                <span class="price-old">{{ Func::formatMoney($product->regular_price) }}</span>
                <span class="price-new">{{ Func::formatMoney($product->sale_price) }}</span>
                <span class="price-per">(-{{ $product->discount }}%)</span>
            @endif
        </p>
    </div>
@endif
