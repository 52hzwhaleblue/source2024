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
    'slogan' => [
        'title_main' => "Slogan",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],
    'gioi-thieu' => [
        'title_main' => "Giới thiệu",
        'website' => [
            'type' => 'object',
            'title' => 'gioithieu'
        ],
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            'photo' => [
                'title' =>  'Hình ảnh',
                'width' => '300',
                'height' => '300',
                'thumb' => '300x300x1'
            ]
        ],
        'name' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
    ],
    'lienhe' => [
        'title_main' => "Liên hệ",
        'website' => [
            'title' => 'lienhe'
        ],
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => false,
        'content' => true,
        'content_cke' => true,
    ],
    'footer' => [
        'title_main' => "Footer",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'desc' => true,
        'desc_cke' => true,
    ]
];
