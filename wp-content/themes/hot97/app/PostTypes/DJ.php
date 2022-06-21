<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post as Post;

class DJ extends Post
{
    /**
     * Return the key used to register the post type with WordPress
     * First parameter of the `register_post_type` function:
     * https://codex.wordpress.org/Function_Reference/register_post_type
     *
     * @return string
     */
    public static function getPostType()
    {
        return 'dj';
    }

    /**
     * Return the config to use to register the post type with WordPress
     * Second parameter of the `register_post_type` function:
     * https://codex.wordpress.org/Function_Reference/register_post_type
     *
     * @return array|null
     */
    protected static function getPostTypeConfig()
    {
        $args = [
            'singular' => __('Talent'),
            'plural' => __('Talent'),
            'has_archive' => true,
            'rewrite' => [
                'slug' => 'talent',
                'with_front' => false,
            ],
            // 'taxonomies' => [
            //     '',
            // ],
            'hierarchical' => false,
            // 'menu_icon' => 'dashicons-star-filled',
            // 'capability_type' => 'page',
            'supports' => [
                'title',
                'editor',
                'excerpt',
                'page-attributes',
                'revisions',
                'thumbnail',
            ],
        ];

        return wp_parse_args($args, [
            'labels' => [
                'name'                     => sprintf('%s', $args['plural']),                                // Default is "Posts".
                'singular_name'            => sprintf('%s', $args['singular']),                              // Default is "Post".
                // 'menu_name'                => sprintf('%s', $args['plural']),                                // Default is the same as 'name'.
                // 'add_new'                  => sprintf('Add %s', $args['singular']),                          // Default is "Add New".
                'add_new_item'             => sprintf('Add New %s', $args['singular']),                      // Default is "Add New Post",
                // 'edit'                     => sprintf('Edit %s', $args['singular']),                         // Undocumented.
                'edit_item'                => sprintf('Edit %s', $args['singular']),                         // Default is "Edit Post".
                'new_item'                 => sprintf('New %s', $args['singular']),                          // Default is "New Post".
                // 'name_admin_bar'           => sprintf('%s', $args['singular']),                              // Default is the same as `singular_name`.
                // 'view'                     => sprintf('View %s', $args['singular']),                         // Undocumented.
                'view_item'                => sprintf('View %s', $args['singular']),                         // Default is "Post".
                'view_items'               => sprintf('View %s', $args['plural']),                           // Default is "Post".
                'search_items'             => sprintf('Search %s', $args['plural']),                         // Default is "Search Post".
                'not_found'                => sprintf('No %s found', strtolower($args['plural'])),           // Default is "No posts found".
                'not_found_in_trash'       => sprintf('No %s found in Trash', strtolower($args['plural'])),  // Default is "No posts found in Trash".
                // 'parent'                   => sprintf('Parent %s', $args['singular']),                       // Undocumented
                'parent_item_colon'        => sprintf('Parent:', $args['singular']),                         // Default is "Parent Page:".
                'all_items'                => sprintf('All %s', $args['plural']),                            // Default is "All Posts",
                'archives'                 => sprintf('%s Archives', $args['singular']),                     // Default is "Post Archives".
                'attributes'               => sprintf('%s Attributes', $args['singular']),                   // Default is "Post Attributes".
                'insert_into_item'         => sprintf('Insert into %s', strtolower($args['singular'])),      // Default is "Insert into post".
                'uploaded_to_this_item'    => sprintf('Uploaded to this %s', strtolower($args['singular'])), // Default is "Uploaded to this post/Uploaded to this page".
                'featured_image'           => sprintf('%s Image', $args['singular']),                        // Default is "Featured Image".
                'set_featured_image'       => sprintf('Set %s image', strtolower($args['singular'])),        // Default is "Set featured image".
                'remove_featured_image'    => sprintf('Remove %s image', strtolower($args['singular'])),     // Default is "Remove featured image".
                'use_featured_image'       => sprintf('Use as %s image', strtolower($args['singular'])),     // Default is "Use as featured image".
                // 'filter_items_list'        => sprintf('', $args['plural']),                                  // Default is ?.
                // 'items_list_navigation'    => sprintf('', $args['plural']),                                  // Default is ?.
                // 'items_list'               => sprintf('', $args['plural']),                                  // Default is ?.
                'item_published'           => sprintf('%s published', $args['singular']),                    // Default is "Post published."
                'item_published_privately' => sprintf('%s published privately.', $args['singular']),         // Default is “Post published privately.”
                'item_reverted_to_draft'   => sprintf('%s reverted to draft.', $args['singular']),           // Default is “Post reverted to draft.”
                'item_scheduled'           => sprintf('%s scheduled.', $args['singular']),                   // Default is “Post scheduled.”
                'item_updated'             => sprintf('%s updated.', $args['singular']),                     // Default is “Post updated.”
            ],
            'public' => true, // Default is "false".
            'rewrite' => [ // Default is "true".
                // 'slug' => '',          // Default is $args['name'] value.
                'with_front' => false, // Default is "true".
                // 'feeds' => false,      // Default is has_archive value.
                // 'pages' => true,       // Default is "true".
                // 'ep_mask' => '',       // Default is permalink_epmask or EP_PERMALINK
            ],
            'supports' => [ // Default is "['title', 'editor'].
                'title',
                'editor',
                'revisions',
                // 'excerpt',
                // 'thumbnail',
                // 'author',
                // 'page-attributes',
                // 'post-formats',
                // 'comments',
                // 'trackbacks',
                // 'custom-fields',
            ],
            // 'label' => '';                      // Default is $args['plural'] value.
            // 'publicly_queryable' => false,      // Default is 'public' value.
            // 'query_var' => true,                // Default is "true".
            // 'taxonomies' => [],                 // Default is "[]".
            // 'has_archive' => false,             // Default is "false".
            // 'hierarchical' => false,            // Default is "false".
            // 'menu_position' => null,            // Default is "null".
            // 'menu_icon' => null,                // Default is "null".
            // 'description' => '',                // Default is "".
            // 'exclude_from_search' => true,      // Default is opposite of 'public' value.
            // 'show_ui' => true,                  // Default is 'public' value.
            // 'show_in_nav_menus' => true,        // Default is 'public' value.
            // 'show_in_menu' => true,             // Default is 'show_ui' value.
            // 'show_in_admin_bar' => true,        // Default is 'show_in_menu' value.
            'show_in_rest' => true,                // Default is "false".
            // 'rest_base' => '',                  // Default is $args['name'] value.
            // 'rest_controller_class' => '',      // Default is WP_REST_Posts_Controller.
            // 'capability_type' => 'post',        // Default is "post".
            // 'capabilities' => [],               // Default is 'capability_type' construct.
            // 'hierarchical' => false,            // Default is "false".
            // 'map_meta_cap' => null,             // Default is "null".
            // 'register_meta_box_cb' => '',       // Default is "".
            // 'permalink_epmask' => EP_PERMALINK, // Default is "EP_PERMALINK".
            // 'can_export' => true,               // Default is "true".
            // 'delete_with_user' => null,         // Default is "null".
        ]);
    }
}
