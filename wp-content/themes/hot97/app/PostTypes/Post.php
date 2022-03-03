<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post as LumberjackPost;

class Post extends LumberjackPost
{
    public function hasPrimaryTerm(string $taxonomy = 'category')
    {
        $primary_category_id = get_post_meta($this->id, '_yoast_wpseo_primary_' . $taxonomy, true);

        if ($primary_category_id) {
            return true;
        }
    }

    public function getPrimaryTerm(string $taxonomy = 'category')
    {
        $primary_category_id = get_post_meta($this->id, '_yoast_wpseo_primary_' . $taxonomy, true);

        $term = get_term($primary_category_id, $taxonomy);

        if ($primary_category_id) {
            return $term;
        }
    }

    public function getPrimaryTermName(string $taxonomy = 'category')
    {
        $primary_term = $this::getPrimaryTerm($taxonomy);

        return $primary_term->name;
    }

    public function getPrimaryTermLink(string $taxonomy = 'category')
    {
        $primary_term_link = get_term_link($this::getPrimaryTerm($taxonomy));

        return $primary_term_link;
    }
}
