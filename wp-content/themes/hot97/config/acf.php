<?php

// Add ACF options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Global Settings',
		'menu_title'	=> 'Global Settings',
		'menu_slug' 	=> 'global-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

    /** Posts > Options */
    acf_add_options_sub_page([
        'page_title' => 'Posts Options',
        'menu_title' => 'Options',
        'menu_slug'  => 'acf-options-posts',
        'parent'     => 'edit.php', // Posts
        'capability' => 'manage_options',
    ]);

    /** DJs > Options */
    acf_add_options_sub_page([
        'page_title' => 'Talent Options',
        'menu_title' => 'Options',
        'menu_slug'  => 'acf-options-djs',
        'parent'     => '/edit.php?post_type=dj', // Posts
        'capability' => 'manage_options',
    ]);
}

// Add support for shortcodes within ACF text, textarea fields
add_filter('acf/format_value/type=text', 'do_shortcode');
add_filter('acf/format_value/type=textarea', 'do_shortcode');
