<?php

/**
 * The Template for displaying all single posts
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Post;
use Timber\Timber;

class SinglePostController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $post = new Post();

        $context['post'] = $post;
        $context['title'] = $post->title;
        $context['content'] = $post->content;
        $context['main_class'] = 'o-main--single-post';
        $context['tags']= $post->getTags();
        $context['more_posts'] = [];
        $context['related_posts'] = [];

        return new TimberResponse('templates/single-post.twig', $context);
    }
}
