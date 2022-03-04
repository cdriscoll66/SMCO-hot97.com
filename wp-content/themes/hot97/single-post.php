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
        // $context['content_category'] = $post->getPrimaryTerm('content-category')->name;
        // $context['content_category_link'] = $post->getPrimaryTermLink('content-category');
        // $context['category'] = $post->getPrimaryTerm()->name;
        // $context['category_link'] = $post->getPrimaryTermLink();

        return new TimberResponse('templates/single-post.twig', $context);
    }
}
