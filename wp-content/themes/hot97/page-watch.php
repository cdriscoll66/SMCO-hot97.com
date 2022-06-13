<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

namespace App;

use App\Http\Controllers\ContentCategoryAbstractController;
use Timber\Timber;

class PageWatchController extends ContentCategoryAbstractController
{
    public function __construct()
    {
        $this->term_id = 8;
        $this->page_config_field_name = 'video_page_fields';

    }
}
