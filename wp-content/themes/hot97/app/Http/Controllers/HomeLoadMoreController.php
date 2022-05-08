<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Traits\LoadMore;
use App\PostTypes\Post;

class HomeLoadMoreController extends Controller
{
    use LoadMore;

    public function __construct()
    {
        // Load More setup
        // $this->set_load_more_additional_context([
        //     'key' => 'value',
        // ]);
        $this->set_load_more_num_per_page(10);
        $this->set_load_more_partial('templates/partials/post-feed.twig');
        $this->set_load_more_post_type_class(Post::class);
    }
}
