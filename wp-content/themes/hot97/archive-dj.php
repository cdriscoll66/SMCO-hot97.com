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
use App\PostTypes\Dj;
use App\ViewModels\DJCardViewModel;
use Timber\Timber;

class ArchiveDjController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = 'Hot DJs';


        $featured_djs = get_field('featured_djs', 'options') ?: [];


        $djs = Dj::builder()
        ->whereIdNotIn($featured_djs)
        ->get();

        $featured = Dj::builder()
        ->whereIdIn($featured_djs)
        ->get();

        $context['featured'] = $featured->map(function ($item) {
            return new DJCardViewModel($item);
        });

        $context['djs'] = $djs->map(function ($item) {
            return new DJCardViewModel($item);
        });


        $context['prefooter'] = get_field('prefooter', 'options');

        return new TimberResponse('templates/archive-dj.twig', $context);
    }
}
