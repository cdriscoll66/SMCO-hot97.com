<?php

/**
 * The Template for displaying all single posts
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\DJ;
use App\ViewModels\CohostCardViewModel;
use Timber\Timber;

class SingleDJController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $post = new DJ();

        $context['post'] = $post;
        $context['title'] = $post->title;
        $context['content'] = $post->content;
        $context['main_class'] = 'o-main--split';

        $context['shows'] = get_field('shows');
        $context['instagram'] = get_field('instagram');
        $context['twitter'] = get_field('twitter');
        $context['sidebar'] = true;

        $cohosts = [];
        if ($dj_ids = get_field('cohosts')) {
            // Get DJs, ordered by menu order
            $featured_djs = DJ::builder()
                ->whereIdIn($dj_ids)
                ->orderBy('post__in')
                ->get();

            // Map over collection and instantiate as DJCardViewModel
            $cohosts = $featured_djs->map(function ($item) {
                return new CohostCardViewModel($item);
            });
        }

        $context['cohosts'] = $cohosts;


        return new TimberResponse('templates/single-dj.twig', $context);
    }
}
