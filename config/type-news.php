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
    'tieu-chi' => [
        'title_main' => "Tiêu chí",
        'copy' => false,
        'copy_image' => false,
        'status' => ["hienthi" => "Hiển thị"],
        'show_images' => true,
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '40',
                'height' => '40',
                'thumb' => '40x40x1'
            ]
        ],
        'name' => true,
        'desc' => true,
    ],
    'tin-tuc' => [
        'title_main' => "Tin tức",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'tintuc'
        ], 
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => [ "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '390',
                'height' => '290',
                'thumb' => '390x290x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
    'cau-hoi-thuong-gap' => [
        'title_main' => "Câu hỏi thường gặp",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'cauhoithuonggap'
        ], 
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '390',
                'height' => '290',
                'thumb' => '390x290x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
    'tai-lieu-ky-thuat' => [
        'title_main' => "Tài liệu kỹ thuật",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'tailieukythuat'
        ], 
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '390',
                'height' => '290',
                'thumb' => '390x290x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
    'bang-gia-san-pham' => [
        'title_main' => "Bảng giá sản phẩm",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'banggiasanpham'
        ], 
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '390',
                'height' => '290',
                'thumb' => '390x290x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
    'hinh-thuc-thanh-toan' => [
        'title_main' => "Hình thức thanh toán",
        'dropdown' => false,
        'list' => false,
        'tags' => false,
        'view' => false,
        'copy' => false,
        'datePublish' => false,
        'copy_image' => false,
        'comment' => false,
        'slug' => false,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => false,
        'icon' => false,
        'show_images' => false,
        'name' => true,
        'desc' => true,
        'content' => false,
        'content_cke' => false,
        'seo' => false,
        'schema' => false,
        'width' => 420,
        'height' => 288,
        'thumb' => '100x100x1',
        'width_icon' => 30,
        'height_icon' => 30,
        'thumb_icon' => '100x100x1',
    ],
    'chinh-sach' => [
        'title_main' => "Chính sách",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'Chính sách'
        ],
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '380',
                'height' => '270',
                'thumb' => '380x270x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
];
