<?php

use Rareloop\Lumberjack\Facades\Router;

Router::get('home-load-more', 'HomeLoadMoreController@loadMore');
Router::get('single-post-load-more/{postid}', 'SinglePostLoadMoreController@loadMore');
