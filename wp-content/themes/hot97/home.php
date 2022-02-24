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
use Rareloop\Lumberjack\Post;
use Timber\Timber;
use Rareloop\Lumberjack\Http\ServerRequest;


class HomeController extends Controller
{
    public function handle(ServerRequest $request)
    {

        $context = Timber::get_context();
        $context['title'] = 'Archive';
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

        $context['posts'] = Post::builder()->limit($context['posts_per_page'])->offset($context['posts_per_page'] * ($context['paged'] > 1 ? $context['paged'] - 1 : 0))->get();

        $context['paginate_links'] = paginate_links();

        return new TimberResponse('templates/posts.twig', $context);
    }
}
