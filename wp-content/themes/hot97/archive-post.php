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
use Timber\Timber;
use App\ViewModels\FeatureCardViewModel;
use App\ViewModels\CardViewModel;

class ArchivePostController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = 'Archive';

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

        $context['main_class'] = 'o-main--split o-main--archive';

        $context['body_class'] = $context['body_class'] . ' is-dark-theme';

        return new TimberResponse('templates/posts.twig', $context);
    }
}
