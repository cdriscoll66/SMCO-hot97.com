<?php

namespace App\Taxonomies;

use Timber\Term;

class Tag extends Term
{
    public function getLink() {
        return get_term_link($this->term_id);
    }
}
