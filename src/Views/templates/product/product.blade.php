@extends('layout')
@section('content')
    <section>
        <div class="max-width py-3">
            <div class="title-detail">
                <h1>{{ $titleMain }}</h1>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-start">
                @if (!empty($productListMenu) && $productListMenu->isNotEmpty())
                    <div class="sanpham-left">
                        <p class="sanpham-title">DANH MỤC SẢN PHẨM</p>

                        <div class="sanpham-box">
                            <?php if(!empty($productListMenu)) { ?>
                                <ul class="sanpham-list">
                                    <?php foreach ($productListMenu as $klist => $vlist) { ?>
                                        <li>
                                            <a class="transition" title="<?= $vlist["name$lang"] ?>" href="<?= $vlist["slug$lang"] ?>">
                                                <?= $vlist["name$lang"] ?>
                                            </a>
                                        </li>                                    
                                    <?php } ?>
                                </ul>
                            <?php } ?>             
                        </div>

                        <p class="sanpham-title mt-5">DANH MỤC HÃNG</p>

                        <div class="sanpham-box">
                            <?php if(!empty($productItem)) { ?>
                                <ul class="sanpham-list brand-grid">
                                    <?php foreach ($productItem as $k => $v) { ?>
                                        <li>
                                            <a  href="{{$v["slug$lang"]}}"  
                                            class="producBrandtHot-item hover_sang2 scale-img">
                                                <img class="w-100" 
                                                    onerror="this.src='{{thumbs('thumbs/160x100x1/assets/images/noimage.png')}}';" src="{{assets_photo('product','160x100x2',$v->photo,'thumbs')}}" alt="{{$v->namevi}}">
                                        
                                            </a>
                                        </li>                                    
                                    <?php } ?>
                                </ul>
                            <?php } ?>             
                        </div>  
                    </div>
                @endif
                <div class="sanpham-right">
                    @if (!empty($product))
                        <div class="grid-product">
                            @foreach ($product as $k => $v)
                                @php $time = 0; $time += $k/2 +  0.5;  @endphp
                                @component('component.itemProduct', ['product' => $v, "time" => $time.'s'])
                                @endcomponent
                            @endforeach
                        </div>
                    @endif
                    {!! $product->appends(request()->query())->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
