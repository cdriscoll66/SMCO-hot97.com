<?php

namespace App\Helpers\Traits;

trait HasFeaturedImage
{
    public function getFeaturedImage()
    {

        $thumbnail = get_the_post_thumbnail_url($this->post);

        return $thumbnail;
    }
}
