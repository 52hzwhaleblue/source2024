@if (device() == 'mobile')
    @php
        $bottom = $val['mobile']['bottom'] ?? '';
        $left = !empty($val['mobile']['left']) ? $val['mobile']['left'] . 'px' : '';
        $right = !empty($val['mobile']['right']) ? $val['mobile']['right'] . 'px' : '';
    @endphp
@else
    @php
        $bottom = $val['destop']['bottom'] ?? '';
        $left = !empty($val['destop']['left']) ? $val['destop']['left'] . 'px' : '';
        $right = !empty($val['destop']['right']) ? $val['destop']['right'] . 'px' : '';
    @endphp
@endif

@php
    $background = $val['background'] ?? '';
    $backgroundText = $val['background-text'] ?? '';
    $color = $val['color'] ?? '';
    $location = !empty($left) ? 'left' : 'right';
    $destop = !empty($val['destop']['device']) && device() == 'destop' ? true : false;
    $mobile = !empty($val['mobile']['device']) && device() == 'mobile' ? true : false;
@endphp

