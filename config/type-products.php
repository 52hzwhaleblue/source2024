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
    'san-pham' => [
        'title_main' => "Sản Phẩm",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'sanpham'
        ],
        'status' => ["noibat" => "Nổi bật","hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '950',
                'height' => '630',
                'thumb' => '950x630x1'
            ],
        ],
        'show_images' => true,
        'gallery' => [
            'san-pham' => [
                "title_main_photo" => "Hình ảnh sản phẩm",
                "title_sub_photo" => "Hình ảnh",
                "status_photo" => ["hienthi" => "Hiển thị"],
                "number_photo" => 3,
                "images_photo" => true,
                "avatar_photo" => true,
                "name_photo" => true,
                "photo_width" => 950,
                "photo_height" => 630,
                "photo_thumb" => '100x100x1'
            ],
        ],
        'id_categories' => true,
        'properties' => true,
        'copy' => true,
        'slug' => true,
        'view' => true,
        'regular_price' => true,
        'sale_price' => true,
        'discount' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'desc_cke' => true,
        'content' => true,
        'content_cke' => true,
        'schema' => true,
        'seo' => true,
        'categories' => [
            'list' => [
                'title_main_categories' => "Danh mục cấp 1",
                'images' => [
                    'photo' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '405',
                        'height' => '280',
                        'thumb' => '405x280x1'
                    ],
                    'banner' => [
                        'title' => 'Banner',
                        'width' => '1366',
                        'height' => '200',
                        'thumb' => '1366x200x1'
                    ],
                ],
                'copy_categories' => false,
                'show_images_categories' => true,
                'slug_categories' => true,
                'status_categories' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
                'gallery_categories' => [],
                'name_categories' => true,
                'desc_categories' => false,
                'desc_categories_cke' => false,
                'content_categories' => false,
                'content_categories_cke' => false,
                'seo_categories' => true,
            ],
            'cat' => [
                'title_main_categories' => "Danh mục cấp 2",
                'images' => [
                    'photo' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '500',
                        'height' => '500',
                        'thumb' => '500x500x1'
                    ],
                    // 'icon' => [
                    //     'title' => 'Ảnh đại diện',
                    //     'width' => '25',
                    //     'height' => '25',
                    //     'thumb' => '25x25x1'
                    // ]
                ],
                'copy_categories' => false,
                'show_images_categories' => true,
                'slug_categories' => true,
                'status_categories' => ["hienthi" => "Hiển thị"],
                'gallery_categories' => [],
                'name_categories' => true,
                'desc_categories' => false,
                'desc_categories_cke' => false,
                'content_categories' => false,
                'content_categories_cke' => false,
                'seo_categories' => true,
            ],
            'item' => [
                'title_main_categories' => "Danh mục cấp 3",
                'images' => [
                    'photo' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '500',
                        'height' => '500',
                        'thumb' => '500x500x1'
                    ],
                    'icon' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '25',
                        'height' => '25',
                        'thumb' => '25x25x1'
                    ]
                ],
                'copy_categories' => false,
                'show_images_categories' => true,
                'slug_categories' => true,
                'status_categories' => ["hienthi" => "Hiển thị"],
                'gallery_categories' => [],
                'name_categories' => true,
                'desc_categories' => false,
                'desc_categories_cke' => false,
                'content_categories' => false,
                'content_categories_cke' => false,
                'seo_categories' => true,
            ]
        ],
        'brand' => [
            'title_main_brand' => "Danh mục hãng",
            'images' => [
                'photo' => [
                    'title' => 'Ảnh đại diện',
                    'width' => '500',
                    'height' => '500',
                    'thumb' => '500x500x1'
                ],
            ],
            'copy_brand' => false,
            'show_images_brand' => true,
            'slug_brand' => true,
            'status_brand' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
            'name_brand' => true,
            'desc_brand' => false,
            'desc_brand_cke' => false,
            'content_brand' => false,
            'content_brand_cke' => false,
            'seo_brand' => true
        ],
    ],
];
