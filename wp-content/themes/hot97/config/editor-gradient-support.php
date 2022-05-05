<?php

add_theme_support(
    'editor-gradient-presets',
    array(
        array(
            'name'     => __('Transparent to Black 40', 'colab'),
            'gradient' => 'linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.4) 100%)',
            'slug'     => 'transparent-to-black-40',
        ),
        array(
            'name'     => __('Hot Yellow 100 to Black', 'colab'),
            'gradient' => 'linear-gradient(#FFBA04 0%, #000 100%)',
            'slug'     => 'hot-yellow-100-to-black',
        ),
        array(
            'name'     => __('Hot Yellow 100 to Hot Yellow 500', 'colab'),
            'gradient' => 'linear-gradient(226.38deg, #FFBA04 11.89%, #7D5800 100%)',
            'slug'     => 'hot-yellow-100-to-hot-yellow-500',
        ),
        array(
            'name'     => __('White to Black', 'colab'),
            'gradient' => 'linear-gradient(#fff 0%, #000 100%)',
            'slug'     => 'white-to-black',
        ),
        array(
            'name'     => __('White To Transparent', 'colab'),
            'gradient' => 'linear-gradient(129.23deg, #fff 27.89%, rgba(0, 0, 0, 0)  77.04%)',
            'slug'     => 'white-to-transparent',
        ),
    )
);
