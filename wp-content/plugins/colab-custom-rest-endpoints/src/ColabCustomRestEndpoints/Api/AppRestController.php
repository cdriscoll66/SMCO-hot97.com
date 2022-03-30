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
        $data = [];

        // home_page_fields group
        $data['home'] = get_field( 'field_6227b3b9bd041', 'option' );

        // new_page_fields group
        $data['news'] = get_field( 'field_6227b7123e38f', 'option' );

        // video_page_fields group
        $data['video'] = get_field( 'field_6227b7eef26f4', 'option' );

        // navigation group
        $data['navigation'] = get_field( 'field_6227b91d25bef', 'option' );

        // Return all of our comment response data.
        return rest_ensure_response( $data );
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
     * Check permissions for the posts.
     *
     * @param WP_REST_Request $request Current request.
     * @return bool|WP_Error
     */
    public function get_items_permissions_check( WP_REST_Request $request ) {
    /*
    // If this endpoint was secured, the following would check for user capabilities.
    if ( ! user_can( wp_get_current_user(), 'read' ) ) {
        return new WP_Error( 'rest_forbidden',
            esc_html__( 'You cannot view the resource.' ),
            [ 'status' => $this->authorization_status_code() ]
        );
    }
    */

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