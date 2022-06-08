<?php

namespace App\ViewModels;

use App\PostTypes\Post;
use App\ViewModels\CardViewModel;

class FeatureCardViewModel extends CardViewModel
{
    public function thumbnailurl()
    {
        $image = get_the_post_thumbnail_url($this->post, 'full');
        return $image;
    }

    public function excerpt()
    {
        $excerpt = $this->post->preview->read_more('') ?: wp_trim_words($this->post->content, 10);

        return $excerpt;
    }
}
