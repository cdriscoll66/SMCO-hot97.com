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
use App\ViewModels\FeatureCardViewModel;
use App\ViewModels\HeroViewModel;
use App\ViewModels\DJCardViewModel;

class FrontPageController extends Controller
{
    public function handle()
    {
        // Create macro for category query method
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

        // Get config fields
        $page_config = get_field('home_page_fields', 'options');

        // Setup arrays
        $exclude = [];
        $hero = [];
        $featured = [];
        $djs = [];
        $other = [];

        if ($page_config) {
            if ($page_config['hero']) {
                // Get hero post as a collection
                $collection = Post::builder()
                    ->whereIdIn($page_config['hero'])
                    ->get();

                $collection_IDs_as_array = $collection->map(function ($item) {
                    return $item->id;
                })->toArray();

                // Add hero post to exclude array
                $exclude = array_merge($exclude, $collection_IDs_as_array);

                // Map over collection to instantiate as HeroViewModel
                $hero = $collection->map(function ($item) {
                    return new HeroViewModel($item);
                });
            }

            if ($page_config['marquee']) {
                $context['marquee']['title'] = $page_config['marquee']['marquee_title'];
                $context['marquee']['tile'] = $page_config['marquee']['marquee_image'];
            }

            $context['dj_bg_image'] = $page_config['dj_background_image']['url'];

            if ($dj_ids = $page_config['featured_djs']) {
                // Get DJs, ordered by menu order
                $featured_djs = DJ::builder()
                    ->whereIdIn($dj_ids)
                    ->orderBy('post__in')
                    ->get();

                // Map over collection and instantiate as DJCardViewModel
                $djs = $featured_djs->map(function ($item) {
                    return new DJCardViewModel($item);
                });
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
                        $featured_posts_as_array = $featured_posts->map(function ($item) {
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
                        $collection_IDs_as_array = $collection->map(function ($item) {
                            return $item->id;
                        })->toArray();

                        // Add to exclude array
                        $exclude = array_merge($exclude, $collection_IDs_as_array);

                        $array = [
                            'term' => new Term($term),
                            'posts' => $collection->map(function ($item) {
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
                        $collection_IDs_as_array = $collection->map(function ($item) {
                            return $item->id;
                        })->toArray();

                        $array = [
                            'term' => new Term($term),
                            'posts' => $collection->map(function ($item) {
                                return new CardViewModel($item);
                            }),
                        ];

                        // Add to exclude array and featured array
                        $exclude = array_merge($exclude, $collection_IDs_as_array);
                        array_push($featured, $array);
                    }
                }
            }

            if ($page_config['other_categories']) {
                // Loop over the other categories
                foreach ($page_config['other_categories'] as $group) {
                    $term = $group['category'];

                    // Get posts in this category, excluding all posts from above
                    $posts = Post::builder()
                        ->whereIdNotIn($exclude)
                        ->category($term->term_id)
                        ->limit(7)
                        ->orderBy('date', 'desc')
                        ->get();


                    // Format data
                    $array = [
                        'term' => new Term($term),
                        'posts' => $posts->map(function ($item, $key) {
                            if ($key === 0) {
                                return new FeatureCardViewModel($item);
                            } else {
                                return new CardViewModel($item);
                            }
                        }),
                    ];

                    // Push to $other array
                    array_push($other, $array);
                }
            }
        }

        // Pass arrays into context variables
        $context['hero'] = $hero;
        $context['featured'] = $featured;
        $context['djs'] = $djs;
        $context['home_ctas'] = $page_config['home-ctas'];
        $context['other'] = $other;

        $context['prefooter_cta'] = get_field('home_prefooter');

        return new TimberResponse('templates/front-page.twig', $context);
    }
}
