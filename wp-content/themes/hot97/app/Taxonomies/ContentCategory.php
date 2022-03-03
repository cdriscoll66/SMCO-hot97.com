<?php

namespace App\Taxonomies;

use Timber\Term;

class ContentCategory extends Term
{
    /**
     * Return the key used to register the taxonomy with WordPress
     * First parameter of the `register_taxonomy` function:
     * https://codex.wordpress.org/Function_Reference/register_taxonomy
     *
     * @return string
     */
    public static function getTaxonomy()
    {
        return 'content-category';
    }

    /**
     * Return the config to use to register the taxonomy with WordPress
     * Second parameter of the `register_taxonomy` function:
     * https://codex.wordpress.org/Function_Reference/register_taxonomy
     *
     * @return array|null
     */
    public static function getTaxonomyPostTypes()
    {
        return [
            'post'
        ];
    }

    /**
     * Return the config to use to register the taxonomy with WordPress
     * Third parameter of the `register_taxonomy` function:
     * https://codex.wordpress.org/Function_Reference/register_taxonomy
     *
     * @return array|null
     */
    public static function getTaxonomyConfig()
    {
        $args = [
            // 'name' => self::getTaxonomy(),
            'singular' => __('Content Category', 'colab'),
            'plural' => __('Content Categories', 'colab'),
            'args' => [
                'rewrite' => [
                    'slug' => 'content',
                    'with_front' => false,
                ],
            ],
        ];

        return wp_parse_args($args['args'], [
            'labels' => [
                'name'                       => sprintf('%s', $args['plural']),                                       // Default is "Post Tags".
                'singular_name'              => sprintf('%s', $args['singular']),                                     // Default is "Post Tag".
                'menu_name'                  => sprintf('%s', $args['plural']),                                       // Default is the same as 'name'.
                'all_items'                  => sprintf('All %s', $args['plural']),                                   // Default is "All Tags".
                'edit_item'                  => sprintf('Edit %s', $args['singular']),                                // Default is "Edit Tag".
                'view_item'                  => sprintf('View %s', $args['singular']),                                // Default is "View Tag".
                'update_item'                => sprintf('Update %s', $args['singular']),                              // Default is "Update Tag".
                'add_new_item'               => sprintf('Add New %s', $args['singular']),                             // Default is "Add New Tag".
                'new_item_name'              => sprintf('New %s Name', $args['singular']),                            // Default is "New Tag Name".
                'parent_item'                => sprintf('Parent %s', $args['singular']),                              // Default is "Parent Category".
                'parent_item_colon'          => sprintf('Parent:', $args['singular']),                                // Default is "Parent Category:".
                'search_items'               => sprintf('Search %s', $args['plural']),                                // Default is "Search Tags".
                'separate_items_with_commas' => sprintf('Separate %s with commas', strtolower($args['plural'])),      // Default is "Separate tags with commas".
                'add_or_remove_items'        => sprintf('Add or remove %s', strtolower($args['plural'])),             // Default is "Add or remove tags".
                'choose_from_most_used'      => sprintf('Choose from the most used %s', strtolower($args['plural'])), // Default is "Choose from the most used tags".
                'not_found'                  => sprintf('No %s found.', strtolower($args['plural'])),                 // Default is "No tags found.".
                'back_to_items'              => sprintf('← Back to %s.', strtolower($args['plural'])),                // Default is "← Back to tags".
            ],
            'hierarchical'      => true,         // Default is "false".
            'query_var'         => true,         // Default is $args['name'] value.
            'rewrite' => [                       // Default is "true".
                // 'slug'         => $args['name'], // Default is $args['name'] value.
                'with_front'   => false,         // Default is "true".
                // 'hierarchical' => false,         // Default is "false".
                // 'ep_mask'      => 'EP_NONE',     // Default is "EP_NONE"
            ],
            'show_ui'           => true,         // Default is 'public' value.
            'show_admin_column' => true,         // Default is "false".
            // 'public' => true,                    // Default is "true".
            // 'publicly_queryable' => true,        // Default is 'public' value.
            // 'show_in_menu' => true,              // Default is 'show_ui' value.
            // 'show_in_nav_menus' => true,         // Default is 'public' value.
            'show_in_rest' => true,              // Default is "false".
            // 'rest_base' => '',                   // Default is $args['name'] value.
            // 'rest_controller_class' => '',       // Default is WP_REST_Posts_Controller.
            // 'show_tagcloud' => '',               // Default is WP_REST_Posts_Controller.
            // 'show_in_quick_edit' => '',          // Default is WP_REST_Posts_Controller.
            // 'meta_box_cb' => '',                 // Default is WP_REST_Posts_Controller.
            // 'description' => '',                 // Default is "".
            // 'update_count_callback' => '',       // Default is "".
            // 'capabilities' => [],                // Default is [].
            // 'sort' => '',                        // Default is "".
        ]);
    }
}
