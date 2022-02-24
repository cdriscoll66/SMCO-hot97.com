<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post as LumberjackPost;

class Post extends LumberjackPost
{
    public function footerCTA() {
        // if this post has data, return data
        // else, return global data

        return "Footer CTA";
    }
}
