<?php

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;
use Rareloop\Lumberjack\QueryBuilder;
use App\PostTypes\Post;

class ContentCategoryLoadMoreController extends Controller
{

    /**
     * @param ServerRequest $request
     * @return TimberResponse
     * @throws \Rareloop\Lumberjack\Exceptions\TwigTemplateNotFoundException
     */

    public function loadMore($termid = NULL)
    {

        QueryBuilder::macro('contentCategory', function (int $term_id) {
            $this->params['tax_query'] = [
                [
                    'taxonomy' => 'content-category',
                    'field' => 'term_id',
                    'terms' => $term_id,
                ]
            ];

            return $this;
        });

        $context = Timber::get_context();
        $request = Helpers::request();
        $paged = $request->query('paged');
        $limit = 6;
        $offset = $limit * $paged;


        $context['posts'] = Post::builder()
            ->offset($offset)
            ->limit($limit)
            ->contentCategory($termid)
            ->get();

        return new TimberResponse('templates/partials/post-feed.twig', $context);
    }
}

