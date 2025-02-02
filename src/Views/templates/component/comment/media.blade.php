<div class="carousel slide carousel-comment-media mt-2" id="carousel-comment-media-{{ $params['id'] }}"
    data-bs-ride="carousel" data-bs-touch="true" data-interval="false">
    <ol class="carousel-indicators w-clear">
        @if (!empty($params['video']))
            <li class="position-relative transition me-1 float-left">
                <a data-fancybox="gallery" data-src="{{ upload('file', $params['video']) }}">
                    <img class="w-100" onerror="this.src='assets/images/noimage.png';"
                        src="{{ assets_photo('photo', '70x70x1', $params['photo'], 'thumbs') }}"
                        alt="{{ $params['name'] }}" title="{{ $params['name'] }}" />
                    <div class="comment-media-play">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="25px" width="25px"
                            viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                            <path class="comment-media-play-stroke-solid" fill="none" stroke="white" d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
      C97.3,23.7,75.7,2.3,49.9,2.5" />
                            <path class="comment-media-play-stroke-dotted" fill="none" stroke="white" d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
      C97.3,23.7,75.7,2.3,49.9,2.5" />
                            <path class="comment-media-play-icon" fill="white"
                                d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z" />
                        </svg>
                    </div>
                </a>
            </li>
        @endif
        
        @if (!empty($album))
            @foreach ($album as $k_photo => $v_photo)
                <li class="transition me-1 float-left">
                    <a data-fancybox="gallery" data-src="{{ upload('photo', $v_photo['photo']) }}"
                        title="{{ $params['name'] }}">
                        <img class="w-100" onerror="this.src='assets/images/noimage.png';"
                            src="{{ assets_photo('photo', '70x70x1', $v_photo['photo'], 'thumbs') }}"
                            alt="{{ $params['name'] }}" title="{{ $params['name'] }}" />
                    </a>
                </li>
            @endforeach
        @endif
    </ol>
</div>
