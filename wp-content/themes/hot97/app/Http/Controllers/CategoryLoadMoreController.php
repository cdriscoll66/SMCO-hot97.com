<?php

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;
use Rareloop\Lumberjack\QueryBuilder;
use App\PostTypes\Post;

class CategoryLoadMoreController extends Controller
{


    // public function getRelatedPosts()
    // {


    //     QueryBuilder::macro('contentCategory', function (int $term_id) {
    //         $this->params['tax_query'] = [
    //             [
    //                 'taxonomy' => 'content-category',
    //                 'field' => 'term_id',
    //                 'terms' => $term_id,
    //             ]
    //         ];

    //         return $this;
    //     });

    //     $posts = Post::builder()
    //         // ->contentCategory($this->term_id)
    //         ->orderBy('date', 'desc');


    //     return $posts;
    // }

    /**
     * @param ServerRequest $request
     * @return TimberResponse
     * @throws \Rareloop\Lumberjack\Exceptions\TwigTemplateNotFoundException
     */

    public function loadMore($termid = NULL)
    {

       QueryBuilder::macro('category', function (int $term_id) {
            $this->params['tax_query'] = [
                [
                    'taxonomy' => 'category',
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


        $context['posts'] = Post::builder()
            ->offset($offset)
            ->limit($limit)
            ->category($termid)
            ->get();

        return new TimberResponse('templates/partials/post-feed.twig', $context);
    }
}

