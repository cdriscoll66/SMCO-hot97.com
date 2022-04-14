<?php

namespace App\ViewModels;

use App\PostTypes\DJ;
use Rareloop\Lumberjack\ViewModel;

class DJCardViewModel extends ViewModel
{
    protected $post;

    public function __construct(DJ $post)
    {
        $this->post = $post;
    }

    public function title(): string
    {
        return $this->post->title();
    }

    public function link(): string
    {
        return $this->post->link;
    }

    public function excerpt()
    {
        return $this->post->post_excerpt;
    }

    public function thumbnail()
    {
        return $this->post->thumbnail();
    }
}
