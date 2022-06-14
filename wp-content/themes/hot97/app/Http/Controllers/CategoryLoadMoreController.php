<?php

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;
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

    public function loadMore($cat_id = NULL)
    {

       // QueryBuilder::macro('contentCategory', function (int $term_id) {
        //     $this->params['tax_query'] = [
        //         [
        //             'taxonomy' => 'content-category',
        //             'field' => 'term_id',
        //             'terms' => $term_id,
        //         ]
        //     ];

        //     return $this;
        // });

        $context = Timber::get_context();
        $request = Helpers::request();
        $paged = $request->query('paged');
        $limit = 6;
        $offset = $limit * $paged;


        var_dump($cat_id);
        $context['posts'] = Post::builder()
            ->offset($offset)
            ->limit($limit)
            ->category($cat_id)
            ->get();

        return new TimberResponse('templates/partials/post-feed.twig', $context);
    }
}

