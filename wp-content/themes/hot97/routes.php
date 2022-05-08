<?php

use Rareloop\Lumberjack\Facades\Router;
use App\Http\Controllers\HomeLoadMoreController;

Router::get('home-load-more', 'HomeLoadMoreController@loadMore');
