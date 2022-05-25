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
        return $this->post->getExcerpt() ?: wp_trim_words($this->post->content, 20);
    }

    public function video()
    {
        $videourl = get_post_meta( $this->post->ID, '_jwppp-video-url-1' );
        return $videourl[0];
    }

    public function videoTitle()
    {
        $videotitle = get_post_meta( $this->post->ID, '_jwppp-video-title-1' );
        return $videotitle[0];
    }

    public function videoDescription()
    {
        $videodesc = get_post_meta( $this->post->ID, '_jwppp-video-description-1' );
        return $videodesc[0];
    }
}
