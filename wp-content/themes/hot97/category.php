<?php

/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Post;
use App\ViewModels\CardViewModel;
use App\ViewModels\FeatureCardViewModel;
use Timber\Timber;

class CategoryController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = single_cat_title('', false);

        // get the posts in this category (default query)
        $posts = collect($context['posts'])
            ->map(function($item) {
                return new Post($item);
            });

        // pull out the first one as the feature post as a FeaturedCard
        $context['featured_post'] = $posts
            ->shift()
            ->map(function($item) {
                return new FeatureCardViewModel($item);
            });

        // pass in the rest as the 'posts' context variable as Cards
        $context['posts'] = $posts->map(function($item) {
            return new CardViewModel($item);
        });

        $context['paginate_links'] = paginate_links();

        $context['sidebar'] = true;
        $context['archive_sidebar']['title'] = "CATEGORIES";
        $context['archive_sidebar']['terms'] = get_categories([
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 0,
        ]);

        foreach ($context['archive_sidebar']['terms'] as $term) {
            $term->link = get_category_link($term->term_id);
        }

        $context['main_class'] = 'o-main--split o-main--archive';

        $context['body_class'] = $context['body_class'] . ' is-dark-theme';

        return new TimberResponse('templates/category.twig', $context);
    }
}
