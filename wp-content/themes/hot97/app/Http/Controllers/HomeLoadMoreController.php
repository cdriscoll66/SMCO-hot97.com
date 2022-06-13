<?php


namespace App\Http\Controllers;

use AC\Builder;
use Timber\Timber;
use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Post;


class HomeLoadMoreController extends Controller
{

    public function loadMore()
    {


        $request = Helpers::request();
        $paged = $request->query('paged');

        $offset = 10 * $paged;
        $context = Timber::get_context();
        $context['posts'] = Post::builder()
            ->offset($offset)
            ->limit(10)
            ->get();


        return new TimberResponse('templates/partials/post-feed.twig', $context);
    }
}
