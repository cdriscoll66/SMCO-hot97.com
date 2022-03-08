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

    acf_add_options_sub_page(array(
		'page_title' 	=> 'App Configuration',
		'menu_title'	=> 'App Configuration',
		'parent_slug'	=> 'global-settings',
	));
}

// Add support for shortcodes within ACF text, textarea fields
add_filter('acf/format_value/type=text', 'do_shortcode');
add_filter('acf/format_value/type=textarea', 'do_shortcode');
