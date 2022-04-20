<?php

namespace App\Http\Controllers;

// use Rareloop\Lumberjack\Http\Controller as BaseController;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Http\ServerRequest;
use App\PostTypes\Post;
use Timber\Timber;

class PostFeed extends \App\Http\Controllers\Controller
{

    public function handle(ServerRequest $request)
    {
        $offset = 10 * 1;
        $context = Timber::get_context();
        $context['posts'] = Post::builder()->offset($offset);

        // return $context;
        return new TimberResponse('templates/partials/post-feed.twig', $context);
    }


}
