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
use Rareloop\Lumberjack\QueryBuilder;
use App\PostTypes\DJ;
use App\PostTypes\Show;
use Timber\Timber;

class ArchiveController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = 'Archive';

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
            $context['post_type'] = get_queried_object();
            $context['title'] = post_type_archive_title('', false);
        } elseif (is_tax()) {
            $context['taxonomy'] = get_queried_object();
            $context['title'] = $context['taxonomy']->name;
        }

        if (!empty($context['post_type'])) {
            $context['posts'] = (new QueryBuilder)
                ->wherePostType([
                    $context['post_type']->name,
                ])
                ->limit($context['posts_per_page'])
                ->offset($context['posts_per_page'] * ($context['paged'] > 1 ? $context['paged'] - 1 : 0))
                ->get();
        } elseif (!empty($context['taxonomy'])) {
            $context['posts'] = (new QueryBuilder)
                ->wherePostType([
                    DJ::class,
                ])
                ->limit($context['posts_per_page'])
                ->offset($context['posts_per_page'] * ($context['paged'] > 1 ? $context['paged'] - 1 : 0))
                ->get();
        } elseif (!empty($context['taxonomy'])) {
            $context['posts'] = (new QueryBuilder)
                ->wherePostType([
                    Show::class,
                ])
                ->limit($context['posts_per_page'])
                ->offset($context['posts_per_page'] * ($context['paged'] > 1 ? $context['paged'] - 1 : 0))
                ->get();
        } else {
            $context['posts'] = Post::builder()
                ->limit($context['posts_per_page'])
                ->offset($context['posts_per_page'] * ($context['paged'] > 1 ? $context['paged'] - 1 : 0))
                ->get();
        }

        $context['paginate_links'] = paginate_links();

        return new TimberResponse('templates/posts.twig', $context);
    }
}
