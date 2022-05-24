<?php
use Timber\Timber;

/**
 * Build Prefooter fields
 * If no fields on page/category use global prefooter defaults
 */

add_filter('timber/context', function ($context) {

    $obj = get_queried_object();

    $show_prefooter = get_field('show_prefooter', $obj->taxonomy.'_'.$obj->term_id) ?: get_field('show_prefooter');

    if($show_prefooter) {
        $prefooter = get_field('prefooter', $obj->taxonomy.'_'.$obj->term_id) ?: get_field('prefooter');
        $context['prefooter'] = $prefooter['prefooter_image'] ? $prefooter : get_field('prefooter', 'options');
    }

    return $context;
});
