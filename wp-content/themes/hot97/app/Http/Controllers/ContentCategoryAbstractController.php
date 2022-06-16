<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\QueryBuilder;
use Timber\Timber;
use App\PostTypes\Post;
use App\PostTypes\Page;
use Timber\Term;
use App\ViewModels\CardViewModel;
use App\ViewModels\HeroViewModel;

class ContentCategoryAbstractController extends Controller
{
    public $term_id = NULL;
    public $page_config_field_name = NULL;

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

        $context['single_name'] = $context['title'] == 'Watch' ? "Videos" : "Articles";

        $page_config = get_field($this->page_config_field_name, 'options');

        $exclude = [];
        $hero = [];
        $page_featured_posts = [];
        $featured = [];

        if ($page_config) {
            // Hero
            if ($page_config['hero']) {
                // Get hero post as a collection
                $collection = Post::builder()
                    ->whereIdIn($page_config['hero'])
                    ->get();

                $collection_IDs_as_array = $collection->map(function($item) {
                    return $item->id;
                })->toArray();

                // Add hero post to exclude array
                $exclude = array_merge($exclude, $collection_IDs_as_array);

                // Map over collection to instantiate as HeroViewModel
                $hero = $collection->map(function($item) {
                    return new HeroViewModel($item);
                });
            }

            // Featured posts (posts directly below the hero)
            if (array_key_exists('featured_posts', $page_config)) {
                $post_ids = $page_config['featured_posts'];

                // Get featured posts, ordered by menu order
                $collection = Post::builder()
                    ->whereIdIn($post_ids)
                    ->orderBy('post__in')
                    ->get();

                    $collection_IDs_as_array = $collection->map(function($item) {
                        return $item->id;
                    })->toArray();

                // Map over collection and instantiate as CardViewModel
                $array = [
                    'term' => 'nope',
                    'posts' => $collection->map(function($item) {
                        return new CardViewModel($item);
                    }),
                ];

                $exclude = array_merge($exclude, $collection_IDs_as_array);
                $page_featured_posts = $array;
            }

            // Featured categories
            if ($page_config['featured_categories']) {
                // Loop over each featured category
                foreach ($page_config['featured_categories'] as $group) {
                    $term = $group['category'];
                    $post_count = $group['number_of_posts'];
                    $collection = [];

                    if ($featured_posts_IDs = $group['featured_posts']) {
                        // Get the featured posts
                        $featured_posts = Post::builder()
                            ->whereIdIn($featured_posts_IDs)
                            ->orderBy('post__in')
                            ->get();

                        // Get the IDs of this new collection, to add into the $exclude array
                        $featured_posts_as_array = $featured_posts->map(function($item) {
                            return $item->id;
                        })->toArray();

                        // Add to exclude array
                        $exclude = array_merge($exclude, $featured_posts_as_array);

                        // Get posts in the same category, excluding the featured posts
                        $other_posts = Post::builder()
                            ->whereIdNotIn($exclude)
                            ->category($term->term_id)
                            ->limit($post_count - count($featured_posts_IDs))
                            ->orderBy('date', 'desc')
                            ->get();

                        // Add the other posts collection to the featured posts collection
                        $collection = $featured_posts->concat($other_posts);

                        // Get the IDs of this new collection, to add into the $exclude array
                        $collection_IDs_as_array = $collection->map(function($item) {
                            return $item->id;
                        })->toArray();

                        // Add to exclude array
                        $exclude = array_merge($exclude, $collection_IDs_as_array);

                        $array = [
                            'term' => new Term($term),
                            'posts' => $collection->map(function($item) {
                                return new CardViewModel($item);
                            }),
                        ];

                        // Add to featured array
                        array_push($featured, $array);

                    } else {
                        // Get posts in this category
                        $collection = Post::builder()
                            ->whereIdNotIn($exclude)
                            ->category($term->term_id)
                            ->limit($post_count)
                            ->orderBy('date', 'desc')
                            ->get();

                        // Get the IDs of this new collection, to later add into the $exclude array
                        $collection_IDs_as_array = $collection->map(function($item) {
                            return $item->id;
                        })->toArray();

                        $array = [
                            'term' => new Term($term),
                            'posts' => $collection->map(function($item) {
                                return new CardViewModel($item);
                            }),
                        ];

                        // Add to exclude array and featured array
                        $exclude = array_merge($exclude, $collection_IDs_as_array);
                        array_push($featured, $array);
                    }
                }
            }
        }

        // Latest Posts
        $latest_posts = Post::builder()
            ->whereIdNotIn($exclude)
            ->contentCategory($this->term_id)
            ->orderBy('date', 'desc')
            ->limit(15)
            // pagination needs to go here for load more functionality
            ->get();

        $latest_posts = $latest_posts->map(function($item) {
            return new CardViewModel($item);
        });

        $context['hero'] = $hero;
        $context['featured_posts'] = $page_featured_posts;
        $context['featured'] = $featured;
        $context['latest_posts'] = $latest_posts;

        $context['sidebar'] = true;
        $context['archive_sidebar']['title'] = "CATEGORIES";
        $context['archive_sidebar']['terms'] = get_categories([
            'orderby'    => 'count',
            'order'      => 'DESC',
            'number'     => 20
        ]);

        foreach ($context['archive_sidebar']['terms'] as $term) {
            $term->link = get_category_link($term->term_id);
        }

        $context['main_class'] = 'o-main--split o-main--archive';

        $context['body_class'] = $context['body_class'] . ' is-dark-theme';

        return new TimberResponse('templates/content-category.twig', $context);
    }
}
