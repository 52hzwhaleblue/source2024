<div class="flex-propertiescard">
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" name="propertiescard[name_properties][{{$key}}]" placeholder="Tên"
                value="{{ $value['namevi'] }}" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control"
                id="code{{ $code }}" name="propertiescard[code][{{$key}}]" placeholder="Mã sản phẩm"
                value="{{ $value['code'] }}">
            <div class="input-group-text"><strong>#</strong></div>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control format-price regular_price price-origin-attr"
                id="regular_price_{{ $code }}" name="propertiescard[regular_price][{{$key}}]" placeholder="Giá bán"
                value="{{ $value['regular_price'] }}">
            <div class="input-group-text"><strong>VNĐ</strong></div>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control format-price sale_price price-origin-attr" id="sale_price_{{ $code }}"
                name="propertiescard[sale_price][{{$key}}]" placeholder="Giá khuyến mãi" value="{{ $value['sale_price'] }}">
            <div class="input-group-text"><strong>VNĐ</strong></div>
        </div>
    </div>
   
    <input type="hidden" class="form-control" name="propertiescard[id_properties][{{$key}}]"
        value='{{ $value['id_properties'] }}'>
</div>
