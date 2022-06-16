<?php


namespace App\Http\Controllers;

use AC\Builder;
use Timber\Timber;
use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Post;
use App\ViewModels\CardViewModel;

class HomeLoadMoreController extends Controller
{

    public function loadMore()
    {

        $request = Helpers::request();
        $paged = $request->query('paged');

        $offset = 12 * $paged;
        $context = Timber::get_context();
        $posts = Post::builder()
            ->offset($offset)
            ->limit(12)
            ->get();

        $context['posts'] = $posts->map(function ($item) {
            return new CardViewModel($item);
        });

        return new TimberResponse('templates/partials/post-feed.twig', $context);
    }
}
