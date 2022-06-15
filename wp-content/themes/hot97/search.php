<?php

/**
 * Search results page
 */

namespace App;

use App\Http\Controllers\Controller;
use Timber\Timber;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Post;
use Rareloop\Lumberjack\QueryBuilder;
use App\PostTypes\DJ;
use App\PostTypes\Page;
use App\ViewModels\SearchResultViewModel;

class SearchController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();


        QueryBuilder::macro('search', function ($term) {
            $this->params['s'] = $term;

            return $this;
        });

        global $wp_query;

        $context['title'] = 'Search';
        $context['query'] = $wp_query->query['s'];
        $context['found_posts'] = $wp_query->found_posts;
        $context['results_text'] = $context['found_posts'] . ' results for "' . htmlspecialchars($context['query']) . '"';

        $posts = collect($wp_query->posts)
            ->map(function($item) {
                switch ($item->post_type) {
                    case 'page':
                        return new Page($item);
                        break;

                    case 'post':
                        return new Post($item);
                        break;

                    case 'dj':
                        return new DJ($item);
                        break;

                    default:
                        return new Post($item);
                        break;
                }
            })
            ->map(function($item) {
                return new SearchResultViewModel($item);
            });

        $context['posts'] = $posts;

        $context['paginate_links'] = paginate_links();

        return new TimberResponse('templates/search-results.twig', $context);
    }
}
