<?php

/**
 * Disable WordPress Automatic Updates
 */
define('AUTOMATIC_UPDATER_DISABLED', true);

/**
 * Set Memory Limit
 */
define('WP_MEMORY_LIMIT', '96M');
define('WP_MAX_MEMORY_LIMIT', '256M');

/**
 * Multi-Environment WP_DEBUG
 */
if (in_array($_ENV['PANTHEON_ENVIRONMENT'], [
    'live',
    'test',
    'updates',
    'release',
], true)) :
    define('WP_DEBUG',         true);
    define('WP_DEBUG_LOG',     true);
    define('WP_DEBUG_DISPLAY', false);
else :
    define('WP_DEBUG',         true);
    define('WP_DEBUG_LOG',     true);
    define('WP_DEBUG_DISPLAY', true);
endif;
