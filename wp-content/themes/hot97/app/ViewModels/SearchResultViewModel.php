<?php

namespace App\ViewModels;

use App\PostTypes\Post;
use Rareloop\Lumberjack\ViewModel;

class SearchResultViewModel extends ViewModel
{
    protected $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function title(): string
    {
        return $this->post->title();
    }

    public function excerpt()
    {
        return get_the_excerpt($this->post);
    }

    public function link()
    {
        return get_permalink($this->post);
    }
}
