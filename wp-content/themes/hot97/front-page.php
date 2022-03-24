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

class FrontPageController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();

        $context['post'] = $page;
        $context['title'] = $page->title;
        $context['content'] = $page->content;

        QueryBuilder::macro('category', function (object $term) {
            $this->params['tax_query'] = [
                [
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $term->term_id,
                ]
            ];

            return $this;
        });

        $context['home_page_fields'] = get_field('home_page_fields', 'options');
        $featured_category_groups = $context['home_page_fields']['featured_categories'];

        $exclude = [];
        $hero = [];
        $featured = [];
        $djs = [];
        $other = [];

        foreach ($featured_category_groups as $group) {
            $term_id = $group['category']->term_id;
            $featured_posts_IDs = $group['featured_posts'];

            $featured_posts = Post::builder()
                ->whereIdIn($featured_posts_IDs)
                ->orderBy('menu_order')
                ->get();

            $other_posts = Post::builder()
                ->whereIdNotIn($featured_posts_IDs)
                ->category($group['category'])
                ->limit($group['number_of_posts'] - count($featured_posts_IDs))
                ->orderBy('date', 'desc')
                ->get();

            $new_collection = $featured_posts->concat($other_posts);

            $array = [
                'term_id' => $term_id,
                'posts' => $new_collection,
            ];

            $exclude = array_merge($exclude, $featured_posts_IDs);
            array_push($featured, $array);
        }

        $context['exclude'] = $exclude;
        $context['featured'] = $featured;

        return new TimberResponse('templates/front-page.twig', $context);
    }
}
