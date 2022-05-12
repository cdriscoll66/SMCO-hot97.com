<?php

namespace ColabCustomRestEndpoints\Api;


/**
 * Add new fields to the existing POST API
 */
class CorePostRestAdditions
{
    /**
     * Initialize new fields for existing POST APIs
     *
     * @return void
     */
    public static function rest_api_init() {
        // Add JWPlayer fields
        register_rest_field(
            'post',
            'jwplayer_videos',
            [
                'get_callback'    => [ self::class, 'get_jwplayer_fields' ], // custom function name
                'update_callback' => null,
                'schema'          => null,
            ]
        );

        register_rest_field(
            'post',
            'author_name',
            [
                'get_callback'    => [ self::class, 'get_author_name' ], // custom function name
                'update_callback' => null,
                'schema'          => null,
            ]
        );
    }

    /**
     * Fetch and return JWPlayer fields
     *
     * @param $object
     * @param $field_name
     * @param $request
     *
     * @return array
     */
    public static function get_jwplayer_fields( $object, $field_name, $request ) {
        $videos = jwpp_get_post_videos( $object["id"] );
        return $videos;
    }

    /**
     * Fetch and return custom author field
     *
     * @param $object
     * @param $field_name
     * @param $request
     *
     * @return string
     */
    public static function get_author_name( $object, $field_name, $request ) {
        return "author";
    }
}