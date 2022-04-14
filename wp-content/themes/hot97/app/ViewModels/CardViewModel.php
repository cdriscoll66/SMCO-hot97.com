<?php

namespace App\ViewModels;

use App\PostTypes\Post;
use Rareloop\Lumberjack\ViewModel;

class CardViewModel extends ViewModel
{
    protected $post;

    public function __construct(Post $post)
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

    public function primaryCategory()
    {
        return $this->post->getPrimaryTerm();
    }

    public function contentCategory()
    {
        return $this->post->getPrimaryTerm('content-category');
    }

    public function isHot()
    {
        return $this->post->isHot();
    }

    public function thumbnail()
    {
        return $this->post->thumbnail();
    }
}
