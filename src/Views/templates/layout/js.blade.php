<script type="text/javascript">
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
    var ASSET = '{{ assets('assets/') }}';
    var BASE = '{{ assets() }}';
    var CSRF_TOKEN = '{{ url('token') }}';
    var WEBSITE_NAME = '{{ !empty($setting['name' . $lang]) ? addslashes($setting['name' . $lang]) : '' }}';
    var RECAPTCHA_ACTIVE = {{ !empty(config('app.recaptcha.active')) ? 'true' : 'false' }};
    var RECAPTCHA_SITEKEY = '{{ config('app.recaptcha.sitekey') }}';
    var GOTOP = ASSET + 'images/top.png';
    var CART_URL = {
        'ADD_CART' : '{{ url('cart', ['action' => 'add-to-cart']) }}',
        'UPDATE_CART' : '{{ url('cart', ['action' => 'update-cart']) }}',
        'DELETE_CART' : '{{ url('cart', ['action' => 'delete-cart']) }}',
        'DELETE_ALL_CART' : '{{ url('cart', ['action' => 'delete-all-cart']) }}',
        'PAGE_CART':'{{ url('giohang') }}',
    };
</script>

@php
    jsminify()->set('js/jquery.min.js');
    jsminify()->set('js/wow.min.js');
    jsminify()->set('bootstrap/bootstrap.js');
    jsminify()->set('js/lazyload.min.js');
    jsminify()->set('owlcarousel2/owl.carousel.js');
    jsminify()->set('holdon/HoldOn.js');
    jsminify()->set('confirm/confirm.js');
    jsminify()->set('simplenotify/simple-notify.js');
    jsminify()->set('fancybox5/fancybox.umd.js');
    jsminify()->set('fotorama/fotorama.js');
    jsminify()->set('admin/toastify/toastify.js');
    jsminify()->set('mmenu/mmenu.js');
    jsminify()->set('slick/slick.js');
    jsminify()->set('slick/slick.js');
    jsminify()->set('vue-carousel-3d/vue.js');
    jsminify()->set('vue-carousel-3d/vue-carousel-3d.min.js');
    jsminify()->set('js/jquery.vortex.min.js');
    jsminify()->set('js/functions.js');
    jsminify()->set('js/peShiner.js');
    jsminify()->set('js/cart.js');
    jsminify()->set('js/apps.js');
    echo jsminify()->get();
@endphp
@stack('scripts')
<script src="@asset('assets/js/alpinejs.js')" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

@php 
    /*
        <script type="text/javascript">
            if($('#albumHot').length)
            {
                new Vue({
                    el: '#albumHot',
                    components: {
                        'carousel-3d': Carousel3d.Carousel3d,
                        'slide': Carousel3d.Slide
                    },
                    data: {
                        carouselControls: true,
                        slideWidth: 635,
                        slideHeight: 420,
                        slideBorder: 0,
                        slideSpace: 200,
                        slidePerspective: 0,
                        slideScaling: 100,
                        animationSpeed: 1000,
                        startIndex: 0,
                        autoplayEnabled: false,
                        direction: 'rtl',
                        infinite: true,
                        disable3d: false,
                        visible: 3,
                        slides: 
                        [ 
                            @foreach($albumHot as $k => $v)
                                {
                                    name:'<?=$v['name']?>',
                                    desc:'<?=$v['desc']?>',
                                    slug:'<?=$v['slug']?>',
                                    src: '<?= assets_photo('product', '635x420x1', $v['photo']) ?>'
                                },
                            @endforeach
                        ]
                    }
                });
            }
        </script>
    */
@endphp

<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

@if (!empty(config('app.recaptcha.active'))) 
    @if (!Func::isGoogleSpeed())
        <script type="text/javascript">
            if (isExist($("#form-newsletter")) || isExist($("#form-contact"))) {
                $('<script>').attr({
                    'src': "https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha.sitekey') }}",
                    'async': ''
                }).insertBefore($('script:first'))
                /* Newsletter */
                document.getElementById('form-newsletter')?.addEventListener("submit", function(event) {
                    event.preventDefault();
                    grecaptcha.ready(async function() {
                        await generateCaptcha('newsletter', 'recaptchaResponseNewsletter', 'form-newsletter');
                    });
                }, false);
                /* Contact */
                document.getElementById('form-contact')?.addEventListener("submit", function(event) {
                    event.preventDefault();
                    grecaptcha.ready(async function() {
                        await generateCaptcha('contact', 'recaptchaResponseContact', 'form-contact');
                    });
                }, false);
            }
        </script>
   @endif
@endif

{!! Func::decodeHtmlChars($setting['bodyjs']) !!}