<?php

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;
use Rareloop\Lumberjack\QueryBuilder;
use App\PostTypes\Post;
use App\ViewModels\CardViewModel;

class SinglePostLoadMoreController extends Controller
{



    public function getRelatedPosts($tags, $exclude)
    {


        // Create macro for tags
        QueryBuilder::macro('tags', function (object $tags) {
            $slugs = [];

            foreach ($tags as $tag) {
                $slugs[] = $tag->slug;
            }

            $this->params['tax_query'] = [
                'relation' => 'OR',
                [
                    'taxonomy' => 'post_tag',
                    'field' => 'slug',
                    'terms' => $slugs,
                ]
            ];

            return $this;
        });

        $posts = Post::builder()
            ->whereIdNotIn($exclude)
            ->tags($tags)
            ->orderBy('date', 'desc');



        return $posts;
    }

    /**
     * @param ServerRequest $request
     * @return TimberResponse
     * @throws \Rareloop\Lumberjack\Exceptions\TwigTemplateNotFoundException
     */
    public function loadMore($postid = NULL)
    {
        $context = Timber::get_context();
        $request = Helpers::request();
        $paged = $request->query('paged');
        $post = new Post($postid);
        $limit = 6;
        $offset = $limit * $paged;
        $context['tags']= $post->getTags();

       $posts = $this->getRelatedPosts($context['tags'], [$post->id])
            ->offset($offset)
            ->limit($limit)
            ->get();

        $context['posts'] = $posts->map(function ($item) {
            return new CardViewModel($item);
        });

        return new TimberResponse('templates/partials/post-feed.twig', $context);
    }
}

