<?php

/**
 * Add Block Categories
 */
add_filter('block_categories_all', function ($categories, $post) {
    return array_merge(
        $categories,
        [
            [
                'slug' => 'custom',
                'title' => __('Custom', 'colab'),
            ],
        ]
    );
}, 10, 2);
