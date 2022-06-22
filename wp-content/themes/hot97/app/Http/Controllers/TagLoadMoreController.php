<?php

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;
use Rareloop\Lumberjack\QueryBuilder;
use App\PostTypes\Post;
use App\ViewModels\CardViewModel;

class TagLoadMoreController extends Controller
{


    /**
     * @param ServerRequest $request
     * @return TimberResponse
     * @throws \Rareloop\Lumberjack\Exceptions\TwigTemplateNotFoundException
     */

    public function loadMore($termid = NULL)
    {


       QueryBuilder::macro('tag', function (int $term_id) {
            $this->params['tax_query'] = [
                [
                    'taxonomy' => 'post_tag',
                    'field' => 'term_id',
                    'terms' => $term_id,
                ]
            ];
            return $this;
        });

        $context = Timber::get_context();
        $request = Helpers::request();
        $paged = $request->query('paged');
        $limit = 9;
        $offset = $limit * $paged;


        $posts = Post::builder()
            ->offset($offset)
            ->limit($limit)
            ->tag($termid)
            ->get();


        $context['posts'] = $posts->map(function ($item) {
            return new CardViewModel($item);
        });

        return new TimberResponse('templates/partials/post-feed.twig', $context);
    }
}
