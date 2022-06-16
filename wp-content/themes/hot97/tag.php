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

class TagController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = single_tag_title('', false);

        // get the posts in this tag (default query)
        $posts = collect($context['posts'])
            ->map(function($item) {
                return new Post($item);
            });

        // pull out the first one as the feature post as a FeaturedCard
        $featured_post = $posts->shift();
        $context['featured_post'] = new FeatureCardViewModel($featured_post);

        // pass in the rest as the 'posts' context variable as Cards
        $context['posts'] = $posts->map(function($item) {
            return new CardViewModel($item);
        });

        $context['paginate_links'] = paginate_links();

        $context['sidebar'] = true;
        $context['archive_sidebar']['title'] = "TAGS";
        $context['archive_sidebar']['terms'] = get_tags([
            'orderby'    => 'count',
            'order'      => 'DESC',
            'number'     => 20
        ]);

        foreach ($context['archive_sidebar']['terms'] as $term) {
            $term->link = get_tag_link($term->term_id);
        }

        $context['main_class'] = 'o-main--split o-main--archive';

        $context['body_class'] = $context['body_class'] . ' is-dark-theme';

        return new TimberResponse('templates/category.twig', $context);
    }
}
