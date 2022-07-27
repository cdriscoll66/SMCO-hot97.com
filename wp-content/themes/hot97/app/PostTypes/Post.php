<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post as LumberjackPost;
use Timber\Term;
use App\Taxonomies\Tag;
use App\Helpers\Traits\HasExcerpt;

class Post extends LumberjackPost
{
    use HasExcerpt;

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

        $term = new Term(get_term($primary_category_id, $taxonomy));

        if ($primary_category_id) {
            return $term;
        }
    }

    public function primaryCategory()
    {
        return $this->getPrimaryTerm();
    }

    public function contentCategory()
    {
        return $this->getPrimaryTerm('content-category');
    }

    public function getTags()
    {
        $tags = collect(get_the_tags($this->id))->map(function($tag) {
            $tag = new Tag($tag);
            $tag->link = $tag->getLink();
            return $tag;
        });

        return $tags;
    }

    public function isHot()
    {
        return get_field('is_hot', $this->id);
    }

    public function video()
    {
        $videourl = get_post_meta( $this->ID, '_jwppp-video-url-1' );

        if (array_key_exists(0, $videourl)) {
            return $videourl[0];
        }
    }

    public function videoTitle()
    {
        $videotitle = get_post_meta( $this->ID, '_jwppp-video-title-1' );

        if (array_key_exists(0, $videotitle)) {
            return $videotitle[0];
        }
    }

    public function videoDescription()
    {
        $videodesc = get_post_meta( $this->ID, '_jwppp-video-description-1' );

        if (array_key_exists(0, $videodesc)) {
            return $videodesc[0];
        }
    }
}
