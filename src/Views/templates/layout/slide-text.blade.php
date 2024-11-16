<?php if(count($slider)) { ?>
    <div class="slide-text">
        <?php foreach($slider as $v) { ?>
            <div class="box-slide">
                <a class="slideshow-image" href="<?=$v['link']?>" target="_blank" title="<?=$v['name']?>">
                    <picture>
                        <source media="(max-width: 500px)" srcset="{{ assets_photo('photo','500x263x1',$v['photo'],'thumbs') }}">
                        <img class="w-100" onerror="this.src='assets/images/noimage.png';"
                            src="{{ assets_photo('photo','1366x700x1',$v['photo'],'thumbs') }}" alt="{{ $v['namevi'] }}"
                            title="{{ $v['namevi'] }}" />
                    </picture>
                    <div class="info-slide">
                        <div class="name-slide opacity-0 "><?=$v['name']?></div>
                        <div class="desc-slide text-split opacity-0"><?=$v['desc']?></div>
                        <div class="views-more-slide d-flex align-items-center justify-content-center hover_xemthem  opacity-0">Xem thêm</div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>