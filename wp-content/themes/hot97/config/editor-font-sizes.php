<?php

/**
 * Font Sizes
 *
 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes
 */
add_theme_support('disable-custom-font-sizes');
add_theme_support('editor-font-sizes', [
    [
        'name' => __('XS', 'colab'),
        'slug' => 'xs',
        'size' => 16,
    ],
    [
        'name' => __('SM', 'colab'),
        'slug' => 'sm',
        'size' => 18,
    ],
    [
        'name' => __('MD', 'colab'),
        'slug' => 'md',
        'size' => 20,
    ],
    [
        'name' => __('LG', 'colab'),
        'slug' => 'lg',
        'size' => 26,
    ],
    [
        'name' => __('Lede', 'colab'),
        'slug' => 'lede',
        'size' => 32,
    ],
    [
        'name' => __('XL', 'colab'),
        'slug' => 'xl',
        'size' => 48,
    ],
    [
        'name' => __('XXL', 'colab'),
        'slug' => 'xxl',
        'size' => 72,
    ],
    [
        'name' => __('XXXL', 'colab'),
        'slug' => 'xxxl',
        'size' => 120,
    ]
]);
