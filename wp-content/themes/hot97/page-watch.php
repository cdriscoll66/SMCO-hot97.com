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
use App\PostTypes\Page;
use Timber\Term;
use App\ViewModels\CardViewModel;
use App\ViewModels\HeroViewModel;

class PageWatchController extends Controller
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
        $page = new Page();

        $context['post'] = $page;
        $context['title'] = $page->title;
        $context['content'] = $page->content;

        $page_config = get_field('video_page_fields', 'options');

        $exclude = [];
        $hero = [];
        $featured_posts = [];
        $featured = [];

        if ($page_config) {
            if ($page_config['hero']) {
                $collection = Post::builder()
                    ->whereIdIn($page_config['hero'])
                    ->get();

                $collection_IDs_as_array = $collection->map(function($item) {
                    return $item->id;
                })->toArray();

                $exclude = array_merge($exclude, $collection_IDs_as_array);

                $hero = $collection->map(function($item) {
                    return new HeroViewModel($item);
                });
            }

            if ($post_ids = $page_config['featured_posts']) {
                // Get featured posts, ordered by menu order
                $posts = Post::builder()
                    ->whereIdIn($post_ids)
                    ->orderBy('post__in')
                    ->get();

                    $collection_IDs_as_array = $posts->map(function($item) {
                        return $item->id;
                    })->toArray();

                // Map over collection and instantiate as CardViewModel
                $featured_posts = [
                    'posts' => $posts->map(function($item) {
                        return new CardViewModel($item);
                    }),
                ];

                $exclude = array_merge($exclude, $collection_IDs_as_array);
            }

            if ($page_config['featured_categories']) {
                foreach ($page_config['featured_categories'] as $group) {
                    $term = $group['category'];
                    $post_count = $group['number_of_posts'];
                    $collection = [];

                    if ($featured_posts_IDs = $group['featured_posts']) {
                        $featured_posts = Post::builder()
                            ->whereIdIn($featured_posts_IDs)
                            ->orderBy('post__in')
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
                    } else {
                        $other_posts = Post::builder()
                            ->whereIdNotIn($exclude)
                            ->category($term->term_id)
                            ->limit($post_count)
                            ->orderBy('date', 'desc')
                            ->get();

                        $collection = $other_posts;
                        $collection_IDs_as_array = $collection->map(function($item) {
                            return $item->id;
                        })->toArray();
                    }

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
        }

        // Latest Posts
        $latest_posts = Post::builder()
            ->whereIdNotIn($exclude)
            ->contentCategory(8)
            ->orderBy('date', 'desc')
            ->limit(15)
            ->get();

        $context['hero'] = $hero;
        $context['featured_posts'] = $featured_posts;
        $context['featured'] = $featured;
        $context['latest_posts'] = $latest_posts;

        return new TimberResponse('templates/content-category.twig', $context);
    }
}
