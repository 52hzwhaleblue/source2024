@extends('layout')
@section('content')
    <section x-data>
        <div class="wrap-main my-4 mx-auto max-w-[1200px] w-[calc(100%_-_20px)]">
            <div class="grid-pro-detail">
                <div class="left-pro-detail">
                    <div class="slick_photo1  overflow-hidden">
                        <a id="Zoom-1" class="MagicZoom"
                            data-options="zoomMode: false; hint: off; rightClick: true; selectorTrigger: click; expandCaption: false; history: false;"
                            href="{{ assets_photo('product', '', $rowDetail['photo']) }}" title="{{ $rowDetail['namevi'] }}">
                            <img class=""
                                onerror="this.src='{{ thumbs('thumbs/540x540x1/assets/images/noimage.png') }}';"
                                src="{{ assets_photo('product', '540x540x1', $rowDetail['photo'], 'thumbs') }}"
                                alt="{{ $rowDetail['namevi'] }}">
                        </a>
                    </div>
                    
                    @if($rowDetailPhoto->isNotEmpty())
                        <div class="album-product my-2 mt-3">
                            <div class="slick in-page" data-dots="0" data-infinite="0" data-arrows="0" data-autoplay='0'
                                data-slidesDefault="4:1" data-lg-items='4:1' data-md-items='4:1' data-sm-items='4:1'
                                data-xs-items="4:1" data-vertical="0">
                                <a class="thumb-pro-detail border-[1px] rounded-[8px]  mx-2" data-zoom-id="Zoom-1"
                                    href="{{ assets_photo('product', '', $rowDetail['photo']) }}"
                                    title="{{ $rowDetail['namevi'] }}"
                                    data-image="{{ assets_photo('product', '710x440x1', $rowDetail['photo'], 'thumbs') }}"><img
                                        class=" !mb-0 !pb-0 !border-0"
                                        onerror="this.src='{{ thumbs('thumbs/710x440x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('product', '710x440x1', $rowDetail['photo'], 'thumbs') }}"
                                        alt="{{ $rowDetail['namevi'] }}"></a>
                                @foreach ($rowDetailPhoto as $v)
                                    <a class="thumb-pro-detail border-[1px] rounded-[8px]  mx-2" data-zoom-id="Zoom-1"
                                        href="{{ assets_photo('product', '', $v['photo']) }}"
                                        title="{{ $rowDetail['namevi'] }}"
                                        data-image="{{ assets_photo('product', '710x440x1', $v['photo'], 'thumbs') }}"><img
                                            class=" !mb-0 !pb-0 !border-0"
                                            onerror="this.src='{{ thumbs('thumbs/710x440x1/assets/images/noimage.png') }}';"
                                            src="{{ assets_photo('product', '710x440x1', $v['photo'], 'thumbs') }}"
                                            alt="{{ $rowDetail['namevi'] }}"></a>
                                @endforeach
                            </div>
                        </div>
                    @endif


                    <ul class="nav ul-actions" role="tablist">
                        @if ($rowDetailPhoto1->isNotEmpty())
                            <li id="tab-den-title" @click="$dispatch('showts', {type:'tab2'})" class="cursor-pointer tab has-icon" role="presentation">
                                <a  role="tab" aria-selected="false" aria-controls="tab-den-product"
                                    tabindex="-1" class="box__tabr">
                                    <img class=""
                                        onerror="this.src='{{ thumbs('thumbs/70x43x2/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('product', '70x43x2', $rowDetail['photo'], 'thumbs') }}"
                                        alt="{{ $rowDetail['namevi'] }}">
                                </a>
                                <p>Đen</p>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="right-pro-detail">
                    <ul class="attr-pro-detail">
                        <li>
                            <h1 class="title-pro-detail capitalize text-[25px] py-[10px] block">{{ $rowDetail['namevi'] }}</h1>
                        </li>
                        <li>
                            <label class="attr-label-pro-detail font-medium mr-[5px]">
                                Mã sản phẩm:
                            </label>
                            <span class="code-pro-detail"></span>
                        </li>
                        <li class="flex mb-2 items-baseline">
                            <label class="attr-label-pro-detail font-medium mr-[5px]">Giá:</label>
                            <div class="attr-content-pro-detail">
                                @if ($rowDetail['sale_price'])
                                    <span
                                        class="price-new-pro-detail">{{ Func::formatMoney($rowDetail['sale_price']) }}</span>
                                    <span
                                        class="price-old-pro-detail">{{ Func::formatMoney($rowDetail['regular_price']) }}</span>
                                @else
                                    <span
                                        class="price-new-pro-detail">{{ $rowDetail['regular_price'] ? Func::formatMoney($rowDetail['regular_price']) : 'Liên hệ' }}</span>
                                @endif
                            </div>
                        </li>
                        <li class="flex mb-2 items-baseline" >
                            <label class="attr-label-pro-detail"> Lượt xem:</label>
                            <div class="attr-content-pro-detail"><?= $rowDetail['view'] ?></div>
                        </li>    
                        
                        <li>
                            <label class="attr-label-pro-detail"> Mô tả:</label>
                            <div class="attr-desc-pro-detail">
                                {!! htmlspecialchars_decode( $rowDetail['descvi'] ?? "") !!}
                            </div>
                        </li>
                    </ul>

                    @if ($listProperties->isNotEmpty())
                        <p class="mb-2" >Loại sản phẩm: </p>
                        @foreach ($listProperties as $key => $list)
                            @if (count($list[1]) > 0)
                                <div class="grid-properties mb-4">
                                    @foreach ($list[1] as $key => $value)
                                        <span class="properties {{ $key == 0 ? 'active' : '' }}"
                                            data-product="{{ $rowDetail['id'] }}" data-id="{{ $value['id'] }}"
                                            data-list="{{ $list[0]['id'] }}">{{ $value['namevi'] }}</span>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    @endif

                    @if(config("type.order"))
                        <div class="cart-pro-detail mt-3">
                            <div class="attr-content-pro-detail d-block">
                                <div class="quantity-pro-detail">
                                    <span class="quantity-minus-pro-detail">-</span>
                                    <input type="text" class="qty-pro !outline-none !shadow-none !ring-0" min="1"
                                        value="1" readonly="">
                                    <span class="quantity-plus-pro-detail">+</span>
                                </div>
                            </div>
                            <a class="transition addcart text-decoration-none addnow" data-id="{{ $rowDetail['id'] }}" data-action="addnow">
                                Thêm vào giỏ hàng
                            </a>
                        </div>
                     @endif

                    @if(config("type.order"))
                        <div class="cart-pro-detail">
                            <a class="transition flex-1 addcart text-decoration-none buynow" data-id="{{ $rowDetail['id'] }}"
                                data-action="buynow">
                                <span>Mua ngay</span>
                                <span>Gọi điện xác nhận và giao hàng tận nơi</span>
                            </a>
                        </div>
                    @endif                     

                </div>
                <div class="tabs-pro-detail w-100">
                    <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-pro-detail-tab" data-bs-toggle="tab" href="#info-pro-detail" role="tab">
                                Thông tin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="commentfb-pro-detail-tab" data-bs-toggle="tab" href="#commentfb-pro-detail" role="tab">Bình luận</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4 pb-4" id="tabsProDetailContent">
                        <div class="tab-pane fade show active" id="info-pro-detail" role="tabpanel">
                            <div class="content-text"><?= Func::decodeHtmlChars($rowDetail['contentvi']) ?></div>
                        </div>
                        <div class="tab-pane fade" id="commentfb-pro-detail" role="tabpanel">
                            <div class="fb-comments" data-href="<?= Func::getCurrentPageURL() ?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>
    @component('component.detailProduct', [
        'rowDetail' => $rowDetail ?? [],
        'rowDetailPhoto' => $rowDetailPhoto ?? [],
        'rowDetailPhoto1' => $rowDetailPhoto1 ?? []
    ])
    @endcomponent
@endsection

@push('styles')
    <link rel="stylesheet" href="@asset('assets/magiczoomplus/magiczoomplus.css')">
@endpush
@push('scripts')
    <script src="@asset('assets/magiczoomplus/magiczoomplus.js')"></script>
@endpush
