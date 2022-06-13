<?php

namespace App\ViewModels;

use App\PostTypes\Post;
use Rareloop\Lumberjack\ViewModel;

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

    public function publishDate()
    {
        return $this->post->post_date();
    }

    public function excerpt()
    {
        $excerpt = $this->post->preview->read_more('') ?: wp_trim_words($this->post->content, 10);

        return $excerpt;
    }

    public function thumbnailurl()
    {
        $image = get_the_post_thumbnail_url($this->post, 'full');
        return $image;
    }

    public function video()
    {
        return $this->post->video();
    }

    public function videoTitle()
    {
        return $this->post->videoTitle();
    }

    public function videoDescription()
    {
        return $this->post->videoDescription();
    }
}
