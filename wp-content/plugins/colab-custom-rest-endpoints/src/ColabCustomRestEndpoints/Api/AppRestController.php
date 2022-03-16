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
     * Grabs the ACF options found on the App Configuration Options page
     *
     * @param WP_REST_Request $request Current request.
     * @return WP_Error|WP_HTTP_Response|WP_REST_Response
     */
    public function config( WP_REST_Request $request ) {
        $data = [];

        $data['home'] = get_field('field_6227b3b9bd041', 'option');
        $data['news'] = get_field('field_6227b7123e38f', 'option');
        $data['video'] = get_field('field_6227b7eef26f4', 'option');
        $data['navigation'] = get_field('field_6227b91d25bef', 'option');

        // Return all of our comment response data.
        return rest_ensure_response( $data );
    }

    /**
     * Matches the post data to the schema we want.
     *
     * @param WP_Post $post The comment object whose response is being prepared.
     * @param WP_REST_Request $request
     * @return WP_Error|WP_HTTP_Response|WP_REST_Response
     */
    public function prepare_item_for_response( WP_Post $post, WP_REST_Request $request) {
        $post_data = [];

        $schema = $this->get_item_schema();

        // We are also renaming the fields to more understandable names.
        if ( isset( $schema['properties']['id'] ) ) {
            $post_data['id'] = (int) $post->ID;
        }

        if ( isset( $schema['properties']['content'] ) ) {
            $post_data['content'] = apply_filters( 'the_content', $post->post_content, $post );
        }

        return rest_ensure_response( $post_data );
    }

    /**
     * Prepare a response for inserting into a collection of responses.
     *     * This is copied from WP_REST_Controller class in the WP REST API v2 plugin.
     *
     * @param WP_REST_Response $response Response object.
     * @return array|WP_REST_Response Response data, ready for insertion into collection data.
     */
    public function prepare_response_for_collection( WP_REST_Response $response ) {
        if ( ! ( $response instanceof WP_REST_Response ) ) {
            return $response;
        }

        $data = (array) $response->get_data();
        $server = rest_get_server();

        if ( method_exists( $server, 'get_compact_response_links' ) ) {
            $links = call_user_func( [ $server, 'get_compact_response_links' ], $response );
        }
        else {
            $links = call_user_func( [ $server, 'get_response_links' ], $response );
        }

        if ( ! empty( $links ) ) {
            $data['_links'] = $links;
        }

        return $data;
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
