<?php


namespace App\Http\Controllers;

use AC\Builder;
use Timber\Timber;
use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Post;
use Rareloop\Lumberjack\QueryBuilder;
use App\ViewModels\SearchResultViewModel;


class SearchResultsLoadMoreController extends Controller
{

    public function loadMore($queryterm)
    {


        QueryBuilder::macro('search', function ($term) {
            $this->params['s'] = $term;

            return $this;
        });


        $request = Helpers::request();
        $paged = $request->query('paged');
        $limit = 10;
        $offset = $limit * $paged;
        $context = Timber::get_context();



        $posts = Post::builder()
            ->search($queryterm)
            ->offset($offset)
            ->limit($limit)
            ->get();

        // $context['posts'] = $posts->map(function ($item) {
        //     return new SearchResultViewModel($item);
        // });

        return new TimberResponse('templates/partials/search-results-feed.twig', $context);
    }
}
