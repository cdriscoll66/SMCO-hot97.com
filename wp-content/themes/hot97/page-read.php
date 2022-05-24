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

class PageReadController extends ContentCategoryAbstractController
{
    public function __construct()
    {
        $this->term_id = 7;
        $this->page_config_field_name = 'news_page_fields';
    }
}
