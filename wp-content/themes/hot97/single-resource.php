<?php

/**
 * The Template for displaying all single posts
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Resource;
use Timber\Timber;

class SingleResourceController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $post = new Resource();

        $context['post'] = $post;
        $context['title'] = $post->title;
        $context['content'] = $post->content;

        return new TimberResponse('templates/generic-page.twig', $context);
    }
}
