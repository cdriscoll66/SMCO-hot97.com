<?php

/**
 * Search results page
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Rareloop\Lumberjack\QueryBuilder;
use App\PostTypes\Resource;
use Timber\Timber;

class SearchController extends Controller
{
    public function handle()
    {
        QueryBuilder::macro('search', function ($term) {
            $this->params['s'] = $term;

            return $this;
        });

        $context = Timber::get_context();
        $searchQuery = get_search_query();

        $context['title'] = 'Search results for \'' . htmlspecialchars($searchQuery) . '\'';
        $context['posts'] = (new QueryBuilder)
            ->wherePostType([
                Post::getPostType(),
                Resource::getPostType(),
            ])
            ->search($searchQuery)
            ->limit($context['posts_per_page'])
            ->offset($context['posts_per_page'] * ($context['paged'] > 1 ? $context['paged'] - 1 : 0))
            ->get();

        $context['paginate_links'] = paginate_links();

        return new TimberResponse('templates/posts.twig', $context);
    }
}
