<?php

/**
 * The Template for displaying all single posts
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Post;
use Timber\Timber;
use Rareloop\Lumberjack\QueryBuilder;
use App\ViewModels\CardViewModel;

class SinglePostController extends Controller
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
            ->orderBy('date', 'desc')
            ->get();

        return $posts;
    }

    public function handle()
    {
        $context = Timber::get_context();
        $post = new Post();

        $context['post'] = $post;
        $context['title'] = $post->title;
        $context['content'] = $post->content;
        $context['main_class'] = 'o-main--single-post';
        $context['tags']= $post->getTags();
        // more_content is the "more from hot97" in the post sidebar
        $context['more_content'] = get_field('more_content', $post->id);
        $context['related_posts'] = $this->getRelatedPosts($context['tags'], [$post->ID]);

        return new TimberResponse('templates/single-post.twig', $context);
    }
}
