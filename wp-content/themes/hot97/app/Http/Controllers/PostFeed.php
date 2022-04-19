<?php

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Http\Controller as BaseController;
use App\PostTypes\Post;

class PostFeed extends BaseController
{
    public static function getPostFeed()
    {
        return 'Hello World';
    }
}
