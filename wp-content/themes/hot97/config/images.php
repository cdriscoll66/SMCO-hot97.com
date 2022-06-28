<?php

return [
    /**
     * List of image sizes to register, each image size looks like:
     *     [
     *         'name' => 'thumb',
     *         'width' => 100,
     *         'height' => 200,
     *         'crop' => true,
     *     ]
     */
    'sizes' => [
        [
            'name' => 'dj-image',
            'width' => 400,
            'height' => 600,
            'crop' => true,
        ],
        [
            'name' => 'dj-profile',
            'width' => 75,
            'height' => 75,
            'crop' => array( 'center', 'top' ),
        ],
        [
            'name' => 'prefooter_image',
            'width' => 846,
            'height' => 511,
            'crop' => true,
        ],
    ],
];
