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
// use App\Http\Controllers\Traits\LoadMore;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Post;
use Timber\Timber;
use Rareloop\Lumberjack\Http\ServerRequest;
use App\ViewModels\FeatureCardViewModel;
use App\ViewModels\CardViewModel;

class HomeController extends Controller
{
    public function handle(ServerRequest $request)
    {
        $context = Timber::get_context();
        $context['title'] = 'Blog';
        $context['params'] = $request->query();

        if (is_day()) {
            $context['title'] = 'Archive: ' . get_the_date('D M Y');
        } elseif (is_month()) {
            $context['title'] = 'Archive: ' . get_the_date('M Y');
        } elseif (is_year()) {
            $context['title'] = 'Archive: ' . get_the_date('Y');
        } elseif (is_tag()) {
            $context['title'] = single_tag_title('', false);
        } elseif (is_category()) {
            $context['title'] = single_cat_title('', false);
        } elseif (is_post_type_archive()) {
            $context['title'] = post_type_archive_title('', false);
        }

        $context['posts_per_page'] = 17;

        $posts = Post::builder()
            ->limit($context['posts_per_page'])
            ->offset($context['posts_per_page'] * ($context['paged'] > 1 ? $context['paged'] - 1 : 0))
            ->get();

        $featured_post = $posts->shift();
        $context['featured_post'] = new FeatureCardViewModel($featured_post);

        $context['posts'] = $posts->map(function ($item, $key) {
            return new CardViewModel($item);
        });

        $context['paginate_links'] = paginate_links();

        $context['sidebar'] = true;
        $context['main_class'] = 'o-main--split o-main--archive';

        $context['body_class'] = $context['body_class'] . ' is-dark-theme';

        $context['archive_sidebar']['title'] = "CATEGORIES";
        $context['archive_sidebar']['terms'] = get_categories([
            'orderby'    => 'count',
            'order'      => 'DESC',
            'number'     => 20
        ]);

        foreach ($context['archive_sidebar']['terms'] as $term) {
            $term->link = get_category_link($term->term_id);
        }

        return new TimberResponse('templates/posts.twig', $context);
    }
}
