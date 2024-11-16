<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.1.1 
 * Date 18-09-2024
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

return [
    'favicon' => [
        'title_main' => "Favicon",
        'kind' => 'static',
        'status' => ["hienthi" => "Hiển thị"],
        'images' => true,
        'width' => 48,
        'height' => 48,
        'thumb' => '48x48x1',
    ],
    'logo' => [
        'title_main' => "Logo",
        'kind' => 'static',
        'name' => true,
        'link' => true,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => true,
        'width' => 140,
        'height' => 140,
        'thumb' => '140x140x1',
    ],
    'slide' => [
        'title_main' => "Slideshow",
        'kind' => 'album',
        'status' => ["hienthi" => "Hiển thị"],
        'number' => 5,
        'images' => true,
        'show_images' => true,
        'gallery' => true,
        'link' => true,
        'name' => true,
        'desc' => false,
        'desc_cke' => false,
        'width' => 1030,
        'height' => 400,
        'thumb' => '1030x400x1',
    ],
    'doi-tac' => [
        'title_main' => "Đối tác",
        'kind' => 'album',
        'status' => ["hienthi" => "Hiển thị"],
        'number' => 4,
        'show_images' => true,
        'images' => true,
        'avatar' => true,
        'link' => true,
        'name' => true,
        'width' => 110,
        'height' => 60,
        'thumb' => '110x60x2',
    ],
    'tag-tu-khoa' => [
        'title_main' => "Tag từ khóa",
        'kind' => 'album',
        'status' => ["hienthi" => "Hiển thị"],
        'number' => 3,
        'images' => false,
        'link' => true,
        'name' => true,
    ],
    'social' => [
        'title_main' => "Mạng xã hội",
        'kind' => 'album',
        'status' => ["hienthi" => "Hiển thị"],
        'number' => 4,
        'show_images' => true,
        'images' => true,
        'avatar' => true,
        'link' => true,
        'name' => true,
        'desc' => false,
        'width' => 22,
        'height' => 22,
        'thumb' => '22x22x2',
    ],
];