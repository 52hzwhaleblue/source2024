/* Validation form */
validateForm('validation-contact');
// validateForm('validation-cart');
// validateForm('validation-user');

/* Lazys */
NN_FRAMEWORK.Lazys = function() {
    if (isExist($('.lazy'))) {
        var lazyLoadInstance = new LazyLoad({
            elements_selector: '.lazy'
        });
    }
};

/* Load name input file */
NN_FRAMEWORK.loadNameInputFile = function() {
    if (isExist($('.custom-file input[type=file]'))) {
        $('body').on('change', '.custom-file input[type=file]', function() {
            var fileName = $(this).val();
            fileName = fileName.substr(fileName.lastIndexOf('\\') + 1, fileName.length);
            $(this).siblings('label').html(fileName);
        });
    }
};

/* Back to top */
NN_FRAMEWORK.GoTop = function() {
    $(window).scroll(function() {
        if (!$('.scrollToTop').length)
            $('body').append('<div class="scrollToTop"><img src="' + GOTOP + '" alt="Go Top"/></div>');
        if ($(this).scrollTop() > 100) $('.scrollToTop').fadeIn();
        else $('.scrollToTop').fadeOut();
    });

    $('body').on('click', '.scrollToTop', function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });
};

/* Alt images */
NN_FRAMEWORK.AltImg = function() {
    $('img').each(function(index, element) {
        if (!$(this).attr('alt') || $(this).attr('alt') == '') {
            $(this).attr('alt', WEBSITE_NAME);
        }
    });
};

/* Menu */
NN_FRAMEWORK.Menu = function() {
    /* Menu remove empty ul */
    if (isExist($('.menu'))) {
        $('.menu ul li a').each(function() {
            $this = $(this);

            if (!isExist($this.next('ul').find('li'))) {
                $this.next('ul').remove();
                $this.removeClass('has-child');
            }
        });
    }

    /* Menu fixed */
    $(window).scroll(function() {
        var cach_top = $(window).scrollTop();
        var heaigt_header = $('.heade').height() + $('.w-menu').height();

        if (cach_top >= heaigt_header) {
            if (!$('.w-menu').hasClass('fix_head animate__animated animate__fadeIn')) {
                $('.w-menu').addClass('fix_head animate__animated animate__fadeIn');
            }
        } else {
            $('.w-menu').removeClass('fix_head animate__animated animate__fadeIn');
        }
    });

    /* Mmenu */
    if (isExist($('nav#menu'))) {
        $('nav#menu').mmenu({
            extensions: ['border-full', 'position-left', 'position-front']
        });
    }
};

/* Tools */
NN_FRAMEWORK.Tools = function() {
    if (isExist($('.toolbar'))) {
        $('.footer').css({ marginBottom: $('.toolbar').innerHeight() });
    }
};

/* Popup */
NN_FRAMEWORK.Popup = function() {
    if (isExist($('#popup'))) {
        validateForm('validation-popup');
        $('#popup').modal('show');
    }
};

/* Wow */
NN_FRAMEWORK.Wows = function() {
    new WOW().init();
};

/* Photobox */
NN_FRAMEWORK.Photobox = function() {
    if (isExist($('.album-gallery'))) {
        $('.album-gallery').photobox('a', { thumbs: true, loop: false });
    }
};

/* DatePicker */
NN_FRAMEWORK.DatePicker = function() {
    if (isExist($('#birthday'))) {
        $('#birthday').datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',
            minDate: '01/01/1950',
            maxDate: TIMENOW
        });
    }
};

/* Search */
NN_FRAMEWORK.Search = function() {

    if (isExist($(".search-icon"))) {
        $(".search-icon").click(function() {
            if ($('body').find('.search2').hasClass('active')) {
                $('body').find('.search2').removeClass('active');
                $(".search2").stop(true, true).animate({ opacity: "0", width: "0px" }, 200);
            } else {
                $('body').find('.search2').addClass('active');
                $(".search2").stop(true, true).animate({ opacity: "1", width: "230px" }, 200);
            }
            document.getElementById($('body').find('.search2').next().find("input").attr('id')).focus();
        });
    }

    if (isExist($('.icon-search'))) {
        $('.icon-search').click(function() {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $('.search-grid').stop(true, true).animate({ opacity: '0', width: '0px' }, 200);
            } else {
                $(this).addClass('active');
                $('.search-grid').stop(true, true).animate({ opacity: '1', width: '230px' }, 200);
            }
            document.getElementById($(this).next().find('input').attr('id')).focus();
            $('.icon-search i').toggleClass('bi bi-x-lg');
        });
    }

    if (isExist($('.search-auto'))) {
        $('.show-search').hide();
        $('.search-auto').keyup(function() {
            
            $keyword = $(this).val();
            if ($keyword.length >= 2) {
                $.get('tim-kiem-goi-y?keyword=' + $keyword, function(data) {
                    if (data) {
                        $('.show-search').show();
                        $('.show-search').html(data);
                    }else{
                        $('.show-search').hide();
                    }
                });
            }
        });
    }
};

/* Videos */
NN_FRAMEWORK.Videos = function() {
    Fancybox.bind('[data-fancybox]', {});
};

/* Owl Data */
NN_FRAMEWORK.OwlData = function(obj) {
    if (!isExist(obj)) return false;
    var items = obj.attr('data-items');
    var rewind = Number(obj.attr('data-rewind')) ? true : false;
    var autoplay = Number(obj.attr('data-autoplay')) ? true : false;
    var loop = Number(obj.attr('data-loop')) ? true : false;
    var lazyLoad = Number(obj.attr('data-lazyload')) ? true : false;
    var mouseDrag = Number(obj.attr('data-mousedrag')) ? true : false;
    var touchDrag = Number(obj.attr('data-touchdrag')) ? true : false;
    var animations = obj.attr('data-animations') || false;
    var smartSpeed = Number(obj.attr('data-smartspeed')) || 800;
    var autoplaySpeed = Number(obj.attr('data-autoplayspeed')) || 800;
    var autoplayTimeout = Number(obj.attr('data-autoplaytimeout')) || 5000;
    var dots = Number(obj.attr('data-dots')) ? true : false;
    var responsive = {};
    var responsiveClass = true;
    var responsiveRefreshRate = 200;
    var nav = Number(obj.attr('data-nav')) ? true : false;
    var navContainer = obj.attr('data-navcontainer') || false;
    var navTextTemp =
        "<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-left' width='44' height='45' viewBox='0 0 24 24' stroke-width='1.5' stroke='#fff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='15 6 9 12 15 18' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-right' width='44' height='45' viewBox='0 0 24 24' stroke-width='1.5' stroke='#fff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='9 6 15 12 9 18' /></svg>";
    var navText = obj.attr('data-navtext');
    navText =
        nav &&
        navContainer &&
        (((navText === undefined || Number(navText)) && navTextTemp) ||
            (isNaN(Number(navText)) && navText) ||
            (Number(navText) === 0 && false));

    if (items) {
        items = items.split(',');

        if (items.length) {
            var itemsCount = items.length;

            for (var i = 0; i < itemsCount; i++) {
                var options = items[i].split('|'),
                    optionsCount = options.length,
                    responsiveKey;

                for (var j = 0; j < optionsCount; j++) {
                    const attr = options[j].indexOf(':') ? options[j].split(':') : options[j];

                    if (attr[0] === 'screen') {
                        responsiveKey = Number(attr[1]);
                    } else if (Number(responsiveKey) >= 0) {
                        responsive[responsiveKey] = {
                            ...responsive[responsiveKey],
                            [attr[0]]: (isNumeric(attr[1]) && Number(attr[1])) ?? attr[1]
                        };
                    }
                }
            }
        }
    }

    if (nav && navText) {
        navText = navText.indexOf('|') > 0 ? navText.split('|') : navText.split(':');
        navText = [navText[0], navText[1]];
    }

    obj.owlCarousel({
        rewind,
        autoplay,
        loop,
        lazyLoad,
        mouseDrag,
        touchDrag,
        smartSpeed,
        autoplaySpeed,
        autoplayTimeout,
        dots,
        nav,
        navText,
        navContainer: nav && navText && navContainer,
        responsiveClass,
        responsiveRefreshRate,
        responsive
    });

    if (autoplay) {
        obj.on('translate.owl.carousel', function(event) {
            obj.trigger('stop.owl.autoplay');
        });

        obj.on('translated.owl.carousel', function(event) {
            obj.trigger('play.owl.autoplay', [autoplayTimeout]);
        });
    }

    if (animations && isExist(obj.find('[owl-item-animation]'))) {
        var animation_now = '';
        var animation_count = 0;
        var animations_excuted = [];
        var animations_list = animations.indexOf(',') ? animations.split(',') : animations;

        obj.on('changed.owl.carousel', function(event) {
            $(this).find('.owl-item.active').find('[owl-item-animation]').removeClass(animation_now);
        });

        obj.on('translate.owl.carousel', function(event) {
            var item = event.item.index;

            if (Array.isArray(animations_list)) {
                var animation_trim = animations_list[animation_count].trim();

                if (!animations_excuted.includes(animation_trim)) {
                    animation_now = 'animate__animated ' + animation_trim;
                    animations_excuted.push(animation_trim);
                    animation_count++;
                }

                if (animations_excuted.length == animations_list.length) {
                    animation_count = 0;
                    animations_excuted = [];
                }
            } else {
                animation_now = 'animate__animated ' + animations_list.trim();
            }
            $(this).find('.owl-item').eq(item).find('[owl-item-animation]').addClass(animation_now);
        });
    }
};

/* Owl Page */
NN_FRAMEWORK.OwlPage = function() {
    if (isExist($('.owl-page'))) {
        $('.owl-page').each(function() {
            NN_FRAMEWORK.OwlData($(this));
        });
    }
};

/* Dom Change */
NN_FRAMEWORK.DomChange = function() {
    /* Video Fotorama */
    if (isExist($('#fotorama-videos'))) {
        $('#fotorama-videos').fotorama();
    }
    /* Video Select */
    if (isExist($('.listvideos'))) {
        $('.listvideos').change(function() {
            var id = $(this).val();
            $.ajax({
                url: 'api/video.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    id: id
                },
                beforeSend: function() {
                    holdonOpen();
                },
                success: function(result) {
                    $('.video-main').html(result);
                    holdonClose();
                }
            });
        });
    }

    /* Chat Facebook */
    $('#messages-facebook').one('DOMSubtreeModified', function() {
        $('.js-facebook-messenger-box').on('click', function() {
                $('.js-facebook-messenger-box, .js-facebook-messenger-container').toggleClass('open'),
                    $('.js-facebook-messenger-tooltip').length && $('.js-facebook-messenger-tooltip').toggle();
            }),
            $('.js-facebook-messenger-box').hasClass('cfm') &&
            setTimeout(function() {
                $('.js-facebook-messenger-box').addClass('rubberBand animated');
            }, 3500),
            $('.js-facebook-messenger-tooltip').length &&
            ($('.js-facebook-messenger-tooltip').hasClass('fixed') ?
                $('.js-facebook-messenger-tooltip').show() :
                $('.js-facebook-messenger-box').on('hover', function() {
                    $('.js-facebook-messenger-tooltip').show();
                }),
                $('.js-facebook-messenger-close-tooltip').on('click', function() {
                    $('.js-facebook-messenger-tooltip').addClass('closed');
                }));
        $('.search_open').click(function() {
            $('.search_box_hide').toggleClass('opening');
        });
    });
};

NN_FRAMEWORK.aweOwlPage = function() {
    var owl = $('.owl-carousel.in-page');
    owl.each(function() {
        var xs_item = $(this).attr('data-xs-items');
        var md_item = $(this).attr('data-md-items');
        var lg_item = $(this).attr('data-lg-items');
        var sm_item = $(this).attr('data-sm-items');
        var margin = $(this).attr('data-margin');
        var dot = $(this).attr('data-dot');
        var nav = $(this).attr('data-nav');
        var height = $(this).attr('data-height');
        var play = $(this).attr('data-play');
        var loop = $(this).attr('data-loop');

        if (typeof margin !== typeof undefined && margin !== false) {} else {
            margin = 30;
        }
        if (typeof xs_item !== typeof undefined && xs_item !== false) {} else {
            xs_item = 1;
        }
        if (typeof sm_item !== typeof undefined && sm_item !== false) {} else {
            sm_item = 3;
        }
        if (typeof md_item !== typeof undefined && md_item !== false) {} else {
            md_item = 3;
        }
        if (typeof lg_item !== typeof undefined && lg_item !== false) {} else {
            lg_item = 3;
        }

        if (loop == 1) {
            loop = true;
        } else {
            loop = false;
        }
        if (dot == 1) {
            dot = true;
        } else {
            dot = false;
        }
        if (nav == 1) {
            nav = true;
        } else {
            nav = false;
        }
        if (play == 1) {
            play = true;
        } else {
            play = false;
        }

        $(this).owlCarousel({
            loop: loop,
            margin: Number(margin),
            responsiveClass: true,
            dots: dot,
            nav: nav,
            navText: [
                '<div class="owlleft"><svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;"><polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline></svg></div>',
                '<div class="owlright"><svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;"><polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline></svg></div>'
            ],
            autoplay: play,
            autoplayTimeout: 4000,
            smartSpeed: 3000,
            autoplayHoverPause: true,
            autoHeight: false,
            responsive: {
                0: {
                    items: Number(xs_item)
                },
                600: {
                    items: Number(sm_item)
                },
                1000: {
                    items: Number(md_item)
                },
                1200: {
                    items: Number(lg_item)
                }
            }
        });
    });
};

NN_FRAMEWORK.Api = function() {
	if(isExist($('.productListHot-wrapper'))){
		$('.productListHot-click').click(function (e) {
			$('.productListHot-click').removeClass('active');
			$(this).addClass('active');
			let idl = $(this).data('idl');
			let idc = $(this).data('idc');
			let url = $(this).data('url');
			let TOKEN = window['TOKEN'];
            
			$.ajax({
				url: url,
				type: 'POST',
				data: {
					idl: idl,
					idc: idc,
					csrf_token: TOKEN
				},
				success: function (result) {
					$('.load-product-'+idl).html(result);
					NN_FRAMEWORK.Lazys();
				},
				error: function (result) {
					console.log(result)
				}
			});
		});

		
        $('.productListHot-cats').find('.slick-active .productListHot-click').trigger('click');
	}
};


NN_FRAMEWORK.slickPage = function() {
    if ($('.slick.in-page').length > 0) {
        $('.slick.in-page').each(function() {
            var dots = $(this).attr('data-dots');
            var infinite = $(this).attr('data-infinite');
            var speed = $(this).attr('data-speed');
            var vertical = $(this).attr('data-vertical');
            var arrows = $(this).attr('data-arrows');
            var autoplay = $(this).attr('data-autoplay');
            var autoplaySpeed = $(this).attr('data-autoplaySpeed');
            var centerMode = $(this).attr('data-centerMode');
            var centerPadding = $(this).attr('data-centerPadding');
            var slidesDefault = $(this).attr('data-slidesDefault');
            var responsive = $(this).attr('data-responsive');
            var xs_item = $(this).attr('data-xs-items');
            var md_item = $(this).attr('data-md-items');
            var lg_item = $(this).attr('data-lg-items');
            var sm_item = $(this).attr('data-sm-items');
            var slidesDefault_ar = slidesDefault.split(':');
            var xs_item_ar = xs_item.split(':');
            var sm_item_ar = sm_item.split(':');
            var md_item_ar = md_item.split(':');
            var lg_item_ar = lg_item.split(':');
            var to_show = slidesDefault_ar[0];
            var to_scroll = slidesDefault_ar[1];
            if (responsive == 1) {
                responsive = true;
            } else {
                responsive = false;
            }
            if (dots == 1) {
                dots = true;
            } else {
                dots = false;
            }
            if (arrows == 1) {
                arrows = true;
            } else {
                arrows = false;
            }
            if (infinite == 1) {
                infinite = true;
            } else {
                infinite = false;
            }
            if (autoplay == 1) {
                autoplay = true;
            } else {
                autoplay = false;
            }
            if (centerMode == 1) {
                centerMode = true;
            } else {
                centerMode = false;
            }
            if (vertical == 1) {
                vertical = true;
            } else {
                vertical = false;
            }
            if (typeof speed !== typeof undefined && speed !== false) {} else {
                speed = 300;
            }
            if (typeof autoplaySpeed !== typeof undefined && autoplaySpeed !== false) {} else {
                autoplaySpeed = 2000;
            }
            if (typeof centerPadding !== typeof undefined && centerPadding !== false) {} else {
                centerPadding = '0px';
            }
            var reponsive_json = [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: Number(lg_item_ar[0]),
                        slidesToScroll: Number(lg_item_ar[1])
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: Number(md_item_ar[0]),
                        slidesToScroll: Number(md_item_ar[1])
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: Number(sm_item_ar[0]),
                        slidesToScroll: Number(sm_item_ar[1]),
                        vertical: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: Number(xs_item_ar[0]),
                        slidesToScroll: Number(xs_item_ar[1]),
                        vertical: false
                    }
                }
            ];
            if (responsive == 1) {
                $(this).slick({
                    dots: dots,
                    infinite: infinite,
                    arrows: arrows,
                    speed: Number(speed),
                    vertical: vertical,
                    slidesToShow: Number(to_show),
                    slidesToScroll: Number(to_scroll),
                    autoplay: autoplay,
                    autoplaySpeed: Number(autoplaySpeed),
                    responsive: reponsive_json
                });
            } else {
                $(this).slick({
                    dots: dots,
                    infinite: infinite,
                    arrows: arrows,
                    speed: Number(speed),
                    vertical: vertical,
                    slidesToShow: Number(to_show),
                    slidesToScroll: Number(to_scroll),
                    autoplay: autoplay,
                    autoplaySpeed: Number(autoplaySpeed)
                });
            }
        });
    }
};

NN_FRAMEWORK.load_token = (callback) => {
    if (typeof CSRF_TOKEN != 'undefined' && CSRF_TOKEN) {
        if (typeof window['TOKEN'] == 'undefined') {
            fetch(CSRF_TOKEN)
                .then((json) => json.text())
                .then((result) => {
                    window['TOKEN'] = result;
                    callback(result);
                });
        } else {
            callback(window['TOKEN']);
        }
    }
};

NN_FRAMEWORK.addTokenToFroms = (token) => {
    const items = document.querySelectorAll('.csrf_token:not([value]), .csrf_token[value=""]');
    if (items) {
        for (const v of items) {
            v.value = token;
        }
    }
};

NN_FRAMEWORK.peShiner = function() {
    $(window).bind("load", function() {
        if ($(document).width() > 1024 && isExist('.peShiner')) {
            $('.peShiner').each(function(element, index) {
                var api = $(this).peShiner({
                    api: true,
                    paused: true,
                    reverse: true,
                    repeat: 1,
                    color: "fireHL",
                });
                api.resume();
                // Color: monoHL, oceanHL, fireHL				
            });
        }
    });
}


NN_FRAMEWORK.Homes = function() {
	if (isExist($('.logo-name')) && $(document).width() > 1024) {
		// Select all elements with the class '.logo-name'
		var textWrappers = document.querySelectorAll('.logo-name');
		
		textWrappers.forEach(function(textWrapper) {
			// Wrap every letter in a span for each '.logo-name'
			textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
			
			// Create an anime.js timeline for each '.logo-name'
			anime.timeline({ loop: true })
				.add({
					targets: textWrapper.querySelectorAll('.letter'),
					scale: [4, 1],
					opacity: [0, 1],
					translateZ: 0,
					easing: "easeOutExpo",
					duration: 950,
					delay: (el, i) => 70 * i
				}).add({
					targets: textWrapper,
					opacity: 0,
					duration: 1000,
					easing: "easeOutExpo",
					delay: 1000
				});
		});
	}

    if (isExist($('.logo-desc')) && $(document).width() >= 1024) {
        // Wrap every letter in a span
        var textWrapper = document.querySelector('.logo-desc .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({ loop: true })
            .add({
                targets: '.logo-desc .letter',
                scale: [0, 1],
                duration: 1500,
                elasticity: 600,
                delay: (el, i) => 45 * (i + 1)
            }).add({
                targets: '.logo-desc',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
    }

    $(window).bind("load", function() {
        if ($(document).width() > 768 && isExist($('.peShiner'))) {
            var apiPeShiner = $(".peShiner").peShiner({
                api: true,
                paused: true,
                reverse: true,
                repeat: 1,
                color: "fireHL",
            });
            apiPeShiner.resume();
            // Color: monoHL, oceanHL, fireHL
        }
    });

    if (isExist($(".productListHot-cats"))) {
        $('.productListHot-cats').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            vertical: false,
            arrows: true,
            centerMode: false,
            focusOnSelect: true,
            autoplay: false,
            variableWidth:true,
            responsive: [{
                breakpoint: 481,
                settings: {
                    slidesToShow: 1,
                    vertical: false,
                    dots: true
                }
            }, ]
        });
    }

    if (isExist($(".baiviet-slick"))) {
        $('.baiviet-slick').each(function(){
            $(this).slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true,
                rows: 2,
                vertical: false,
                arrows: false,
                centerMode: false,
                focusOnSelect: true,
                autoplay: true,
                responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 3,
                    slidesToScroll: 3,
                    }
                }, 
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }, 
                ]
            });
        });
    }
}

// Toolbar2
NN_FRAMEWORK.Toolbar2 = function () {
	// $(window).scroll(function () {
	// 	if (!$('.scrollToTopMobile').length)
	// 		$('body').append('<div class="scrollToTopMobile"><img src="' + GOTOP + '" alt="Go Top"/></div>');
	// 	if ($(this).scrollTop() > 100) $('.scrollToTopMobile').fadeIn();
	// });

	$('body').on('click', '.scrollToTopMobile', function () {
		$('html, body').animate({ scrollTop: 0 }, 800);
		return false;
	});

	if (isExist($('.toolbar2')) && $(document).width < 1024 ) {
		$('.footer-wrapper').css({ marginBottom: $('.toolbar2').innerHeight() });
	}

	$('.toolbar2 .phone').click(function (e) {
		e.stopPropagation();
		$('.toolbar2').toggleClass('is-active');
	});
	$(document).click(function () {
		$('.toolbar2').removeClass('is-active');
	});
	$(window).scroll(function () {
		var ex6Exists = $('.ex6').length > 0;
		if ($(this).scrollTop() > 100) {
			if (!ex6Exists) {
				$('.toolbar2 .scrollToTopMobile').addClass('ex6');
			}
		} else {
			$('.toolbar2 .scrollToTopMobile').removeClass('ex6');
		}
	});
};


NN_FRAMEWORK.Properties = function() {
    if (isExist($('.grid-properties'))) {
        $('.properties').click(function(e) {
            $(this).parents('.grid-properties').find('.properties').removeClass('active');
            // $('.properties').removeClass('outstock');
            $(this).addClass('active');
        });
    }
};

/* Ready */
$(document).ready(function() {
    NN_FRAMEWORK.load_token((value) => {
    	NN_FRAMEWORK.Api();
    	NN_FRAMEWORK.addTokenToFroms(value);
    });
    NN_FRAMEWORK.Wows();
    NN_FRAMEWORK.Homes();
    NN_FRAMEWORK.Toolbar2();
    NN_FRAMEWORK.peShiner();
    NN_FRAMEWORK.Lazys();
    NN_FRAMEWORK.Popup();
    NN_FRAMEWORK.AltImg();
    NN_FRAMEWORK.GoTop();
    NN_FRAMEWORK.Menu();
    NN_FRAMEWORK.OwlPage();
    NN_FRAMEWORK.slickPage();
    NN_FRAMEWORK.Videos();
    NN_FRAMEWORK.Photobox();
    NN_FRAMEWORK.Search();
    NN_FRAMEWORK.DomChange();
    NN_FRAMEWORK.DatePicker();
    NN_FRAMEWORK.loadNameInputFile();
    NN_FRAMEWORK.Properties();
    if (isExist($('.comment-page'))) {
        new Comments('.comment-page', BASE);
    }
    new Cart(BASE);
});