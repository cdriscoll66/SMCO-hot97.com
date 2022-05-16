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

    public function shows()
    {
        $shows = get_field('shows', $this->post);

        return $shows;
    }

    public function thumbnail()
    {
        $image = get_the_post_thumbnail($this->post, 'dj-image');

        return $image;
    }
}
