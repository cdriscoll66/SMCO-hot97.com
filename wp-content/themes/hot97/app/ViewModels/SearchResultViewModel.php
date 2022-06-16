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
        try {
        return get_the_excerpt($this->post);

        }
        catch (\Exception $e) {
            return '';  // This is to block the error from the JW player from happening - need to revisit to make sure this is working as it should.
        } ;
    }

    public function link()
    {
        return get_permalink($this->post);
    }
}
