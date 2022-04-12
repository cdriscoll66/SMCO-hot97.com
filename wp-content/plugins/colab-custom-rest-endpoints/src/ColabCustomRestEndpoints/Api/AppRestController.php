<?php

namespace ColabCustomRestEndpoints\Api;

use ColabCustomRestEndpoints\Plugin;
use \WP_Error;
use \WP_HTTP_Response;
use \WP_REST_Request;
use \WP_REST_Response;
use \WP_Post;

/**
 * Class CatRestController
 *
 * @package ColabCustomRestEndpoints\Api
 */
class AppRestController {
    /**
     * SampleRestController constructor.
     */
    public function __construct() {
        $this->namespace     = '/colab/v1';
        $this->resource_name = 'app';
    }

    /**
     * Register REST routes
     */
    public function register_routes() {
        // GET /wp-json/colab-custom-rest-endpoints/v1/data/recent
        register_rest_route( $this->namespace, '/' . $this->resource_name . '/config', [
            [
                'methods'   => 'GET',
                'callback'  => [ $this, 'config' ],
                'permission_callback' => [ $this, 'get_items_permissions_check' ],
            ],
            'schema' => [ $this, 'get_item_schema' ],
        ] );
    }

    /**
     * Grabs the ACF options found on the App Configuration Options page
     *
     * @param WP_REST_Request $request Current request.
     * @return WP_Error|WP_HTTP_Response|WP_REST_Response
     */
    public function config( WP_REST_Request $request ) {
        $data = [
            'home' => [
                'featured_categories' => [],
                'featured_articles' => [],
            ],
            'news' => [
                'featured_categories' => [],
                'featured_articles' => [],
            ],
            'watch' => [
                'featured_categories' => [],
                'featured_articles' => [],
            ],
            'navigation' => [],
        ];

        // home_page_fields group
        $home_page_fields = get_field( 'home_page_fields', 'option' );
        $data['home']['featured_categories'][] = $home_page_fields['featured_categories'];
        $data['home']['featured_articles'] = array_map(
            [$this, 'simplify_post_access_keys_array_map'],
            $home_page_fields['featured_articles']
        );

        // new_page_fields group
        $news_page_fields = get_field( 'news_page_fields', 'option' );
        $data['news']['featured_categories'][] = $news_page_fields['featured_news_categories'];
        $data['news']['featured_articles'] = array_map(
            [$this, 'simplify_post_access_keys_array_map'],
            $news_page_fields['featured_news_articles']
        );

        // video_page_fields group
        $video_page_fields = get_field( 'video_page_fields', 'option' );
        $data['watch']['featured_categories'][] = $video_page_fields['featured_video_categories'];
        $data['watch']['featured_articles'] = array_map(
            [$this, 'simplify_post_access_keys_array_map'],
            $video_page_fields['featured_video_articles']
        );

        // navigation group
        $data['navigation'] = get_field( 'navigation', 'option' );

        // Return all of our comment response data.
        return rest_ensure_response( $data );
    }

    /**
     * Array_map callback function to reduce redundant access key for more consistent access in the native app.
     * 
     * @param $post
     * @return WP_Post
     */
    private function simplify_post_access_keys_array_map( $post ): WP_Post {
        // The type label as an access key interferes with typing in the native app
        // This simplifies ingestion.
        $type_label = array_key_first( $post );
        $simple_post = $post[$type_label];
        $simple_post->type_label = $type_label;

        return $simple_post;
    }

    /**
     * Get our sample schema for a post.
     *
     * @return array The sample schema for a post
     */
    public function get_item_schema() {
        if ( $this->schema ) {
            // Since WordPress 5.3, the schema can be cached in the $schema property.
            return $this->schema;
        }

        $this->schema = [
            // This tells the spec of JSON Schema we are using which is draft 4.
            '$schema'              => 'http://json-schema.org/draft-04/schema#',
            // The title property marks the identity of the resource.
            'title'                => 'post',
            'type'                 => 'object',
            // In JSON Schema you can specify object properties in the properties attribute.
            'properties'           => [
                'id' => [
                    'description'  => esc_html__( 'Unique identifier for the object.', Plugin::TEXT_DOMAIN ),
                    'type'         => 'integer',
                    'context'      => [ 'view', 'edit', 'embed' ],
                    'readonly'     => TRUE,
                ],
                'content' => [
                    'description'  => esc_html__( 'The content for the object.', Plugin::TEXT_DOMAIN ),
                    'type'         => 'string',
                ],
            ],
        ];

        return $this->schema;
    }

    /**
     * Evaluates whether the requester has permission to access the resource
     *
     * @return bool
     */
    public function get_items_permissions_check(): bool {
        return TRUE;
    }

    /**
     * Sets up the proper HTTP status code for authorization.
     *
     * @return int
     */
    public function authorization_status_code(): int
    {
        $status = 401;

        if ( is_user_logged_in() ) {
            $status = 403;
        }

        return $status;
    }

    /**
     * Callback for the action hook.
     */
    public static function rest_api_init() {
        $controller = new self();
        $controller->register_routes();
    }
}
