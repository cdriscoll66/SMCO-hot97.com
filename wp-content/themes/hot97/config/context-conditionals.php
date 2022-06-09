<?php

/**
 * Add WordPress Conditionals to Timber Context
 */
add_filter('timber/context', function ($context) {

    /** WordPress Core Nameing */
    $context['is_home']                         = is_home();
    $context['is_front_page']                   = is_front_page();
    $context['is_user_logged_in']               = is_user_logged_in();
    $context['is_admin']                        = is_admin();
    $context['is_404']                          = is_404();
    $context['is_search']                       = is_search();
    $context['is_category']                     = is_category();
    $context['is_tag']                          = is_tag();
    $context['is_archive']                      = is_archive();
    $context['is_post_type_archive']            = is_post_type_archive();
    $context['is_post_type_archive_attorney']   = is_post_type_archive('leb-attorney');
    $context['is_events']                       = is_post_type_archive('tribe_events');
    $context['is_tax']                          = is_tax();
    $context['is_singular']                     = is_singular();
    $context['is_singular_attorneys']           = is_singular('leb-attorney');
    $context['is_singular_service']             = is_singular('leb-service');
    $context['is_singular_event']               = is_singular('tribe_events');
    $context['is_single']                       = is_single();
    $context['is_page']                         = is_page();
    $context['is_paged']                        = is_paged();
    $context['post_password_required']          = post_password_required();

    /** Shorthand & Custom Conditionals */
    $context['is_front'] = $context['is_front_page'];
    $context['is_posts'] = is_home() || (is_archive() && !(is_post_type_archive() || is_tax()));
    $context['is_post'] = is_singular('post');

    /** Template Conditionals */
    $context['is_template'] = [];
    $context['is_template']['basic'] = is_page_template('single-page-basic.php') || is_page_template('controllers/single-page-basic.php');
    $context['is_template']['full'] = is_page_template('single-post-full.php') || is_page_template('controllers/single-post-full.php') || is_page_template('single-page-full.php') || is_page_template('controllers/single-page-full.php');;
    $context['is_template'] = array_filter($context['is_template']);

    return $context;
});
