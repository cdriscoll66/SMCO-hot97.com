<?php

/**
 * The Template for displaying all single posts
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\DJ;
use App\PostTypes\Post;
use App\ViewModels\CohostCardViewModel;
use Rareloop\Lumberjack\QueryBuilder;

use App\ViewModels\CardViewModel;
use App\ViewModels\FeatureCardViewModel;

use Timber\Timber;
use Timber\Term;

class SingleDJController extends Controller
{

    public function getRelatedPosts($tags, $exclude)
    {
        // Create macro for tags
        QueryBuilder::macro('tags', function ($tags) {



            $this->params['tax_query'] = [
                'relation' => 'OR',
                [
                    'taxonomy' => 'post_tag',
                    'field' => 'slug',
                    'terms' => $tags,
                ]
            ];

            return $this;
        });

        $posts = Post::builder()
            ->tags($tags)
            ->limit(7)
            ->orderBy('date', 'desc')
            ->get();

        return $posts;
    }

    public function handle()
    {
        $context = Timber::get_context();
        $post = new DJ();

        $context['post'] = $post;
        $context['title'] = $post->title;
        $context['content'] = $post->content;
        $context['main_class'] = 'o-main--split dj-content';

        $context['shows'] = get_field('shows');
        $context['instagram'] = get_field('instagram');
        $context['twitter'] = get_field('twitter');
        $context['sidebar'] = true;

        $cohosts = [];
        if ($dj_ids = get_field('cohosts')) {
            // Get DJs, ordered by menu order
            $featured_djs = DJ::builder()
                ->whereIdIn($dj_ids)
                ->orderBy('post__in')
                ->get();

            // Map over collection and instantiate as DJCardViewModel
            $cohosts = $featured_djs->map(function ($item) {
                return new CohostCardViewModel($item);
            });

        }

        $context['cohosts'] = $cohosts;


        $context['related_posts'] = $this->getRelatedPosts($post->slug, [$post->ID]);


        // Format data
        $other = [
            'posts' => $context['related_posts']->map(function ($item, $key) {
                if ($key === 0) {
                    return new FeatureCardViewModel($item);
                } else {
                    return new CardViewModel($item);
                }
            }),
        ];

        $context['other'] = $other;

        return new TimberResponse('templates/single-dj.twig', $context);
    }
}
