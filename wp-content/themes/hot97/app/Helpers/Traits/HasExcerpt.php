<?php

namespace App\Helpers\Traits;

trait HasExcerpt
{
    public function getExcerpt()
    {
        $excerpt = $this->post_excerpt ?: get_the_excerpt();

        return $excerpt;
    }
}
