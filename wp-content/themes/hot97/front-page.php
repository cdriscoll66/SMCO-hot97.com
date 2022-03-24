<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\QueryBuilder;
use Timber\Timber;
use App\PostTypes\Post;
use App\PostTypes\DJ;
use App\PostTypes\Page;
use Timber\Term;
use App\ViewModels\CardViewModel;
use App\ViewModels\HeroViewModel;

class FrontPageController extends Controller
{
    public function handle()
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
        $page = new Page();

        $context['post'] = $page;
        $context['title'] = $page->title;
        $context['content'] = $page->content;

        $homepage_config = get_field('home_page_fields', 'options');

        $exclude = [];
        $hero = [];
        $featured = [];
        $djs = [];
        $other = [];

        if ($homepage_config) {
            if ($homepage_config['hero']) {
                $hero = Post::builder()
                    ->whereIdIn($homepage_config['hero'])
                    ->get();

                $hero = $hero->map(function($item) {
                    return new HeroViewModel($item);
                });
            }

            if ($homepage_config['featured_categories']) {
                foreach ($homepage_config['featured_categories'] as $group) {
                    $term = $group['category'];
                    $post_count = $group['number_of_posts'];
                    $featured_posts_IDs = $group['featured_posts'];

                    $featured_posts = Post::builder()
                        ->whereIdIn($featured_posts_IDs)
                        ->orderBy('menu_order')
                        ->get();

                    $other_posts = Post::builder()
                        ->whereIdNotIn($featured_posts_IDs)
                        ->category($term->term_id)
                        ->limit($post_count - count($featured_posts_IDs))
                        ->orderBy('date', 'desc')
                        ->get();

                    $collection = $featured_posts->concat($other_posts);
                    $collection_IDs_as_array = $collection->map(function($item) {
                        return $item->id;
                    })->toArray();

                    $array = [
                        'term' => new Term($term),
                        'posts' => $collection->map(function($item) {
                            return new CardViewModel($item);
                        }),
                    ];

                    $exclude = array_merge($exclude, $collection_IDs_as_array);
                    array_push($featured, $array);
                }
            }

            if ($homepage_config['other_categories']) {
                foreach ($homepage_config['other_categories'] as $group) {
                    $term = $group['category'];

                    $posts = Post::builder()
                        ->whereIdNotIn($exclude)
                        ->category($term->term_id)
                        ->limit(6)
                        ->orderBy('date', 'desc')
                        ->get();

                    $array = [
                        'term' => new Term($term),
                        'posts' => $posts->map(function($item) {
                            return new CardViewModel($item);
                        }),
                    ];

                    array_push($other, $array);
                }
            }
        }

        $context['hero'] = $hero;
        $context['featured'] = $featured;
        $context['djs'] = $djs;
        $context['other'] = $other;

        return new TimberResponse('templates/front-page.twig', $context);
    }
}
