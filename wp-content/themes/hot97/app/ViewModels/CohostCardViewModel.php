<?php

namespace App\ViewModels;

use App\ViewModels\DJCardViewModel;

class CohostCardViewModel extends DJCardViewModel
{
    public function thumbnail()
    {
        $image = get_the_post_thumbnail($this->post, 'medium');
        return $image;
    }
}
