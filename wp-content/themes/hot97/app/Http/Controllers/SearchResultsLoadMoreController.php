<?php


namespace App\Http\Controllers;

use AC\Builder;
use Timber\Timber;
use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Post;


class SearchResultsLoadMoreController extends Controller
{

    public function loadMore()
    {

        $request = Helpers::request();
        $paged = $request->query('paged');

        $offset = 6 * $paged;
        $context = Timber::get_context();
        $context['posts'] = Post::builder()
            ->offset($offset)
            ->limit(6)
            ->get();

        return new TimberResponse('templates/partials/search-results-feed.twig', $context);
    }
}
