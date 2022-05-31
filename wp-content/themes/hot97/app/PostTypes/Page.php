<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Page as LumberjackPage;
use App\Helpers\Traits\HasFeaturedImage;

class Page extends LumberjackPage
{
    use HasFeaturedImage;
}
