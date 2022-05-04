<?php

/**
 * Color Palette
 *
 * @requires /assets/styles/config/_colors.scss $color-palette
 * @requires /assets/styles/shared/constructs/_color-palette.scss
 *
 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
 */

/**
 * Disable Custom Editor Colors
 */
// add_theme_support('disable-custom-colors');

/**
 * Define Custom Editor Colors
 */


add_theme_support('editor-color-palette', [
    [
        'name' => esc_attr__('Hot Yellow 100', 'colab'),
        'slug' =>  'hot-yellow-100',
        'color' => '#ffba04',
    ],
    [
        'name' => esc_attr__('Hot Yellow 200', 'colab'),
        'slug' =>  'hot-yellow-200',
        'color' => '#dfa000',
    ],
    [
        'name' => esc_attr__('Hot Yellow 500', 'colab'),
        'slug' =>  'hot-yellow-500',
        'color' => '#7d5800',
    ],
    [
        'name' => esc_attr__('Hot Yellow 900', 'colab'),
        'slug' =>  'hot-yellow-900',
        'color' => '#0e0900',
    ],
    [
        'name' => esc_attr__('Red', 'colab'),
        'slug' => 'red',
        'color' => '#910f18',
    ],
    [
        'name' => esc_attr__('Dark Gray', 'colab'),
        'slug' =>  'dark-gray',
        'color' => '#181616',
    ],
    [
        'name' => esc_attr__('Medium Gray', 'colab'),
        'slug' =>  'medium-gray',
        'color' => '#776c6c',
    ],
    [
        'name' => esc_attr__('Light Gray', 'colab'),
        'slug' =>  'light-gray',
        'color' => '#dfd5d5',
    ],
    [
        'name' => esc_attr__('Black', 'colab'),
        'slug' => 'black',
        'color' => '#000',
    ],
    [
        'name' => esc_attr__('White', 'colab'),
        'slug' => 'white',
        'color' => '#ffffff',
    ],
    [
        'name' => esc_attr__('Transparent', 'colab'),
        'slug' => 'transparent',
        'color' => 'transparent',
    ],
]);
