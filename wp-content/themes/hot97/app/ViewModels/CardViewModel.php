<?php

namespace App\ViewModels;

use App\Helpers\Traits\HasExcerpt;
use App\PostTypes\Post;
use Rareloop\Lumberjack\ViewModel;
use Timber\Term;

class CardViewModel extends ViewModel
{
    use HasExcerpt;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function excerpt()
    {
        // dump($this);
    }
}
