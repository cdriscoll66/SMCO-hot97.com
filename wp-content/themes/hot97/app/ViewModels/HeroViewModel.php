<?php

namespace App\ViewModels;

use App\PostTypes\Post;
use Rareloop\Lumberjack\ViewModel;
use Timber\Term;

class HeroViewModel extends ViewModel
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

    public function excerpt()
    {
        return $this->post->getExcerpt() ?: wp_trim_words($this->post->content, 20);
    }

    public function video()
    {
        return 'video embed goes here';
    }
}
