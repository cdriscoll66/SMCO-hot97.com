<?php

use Rareloop\Lumberjack\Facades\Router;

Router::get('home-load-more', 'HomeLoadMoreController@loadMore');
Router::get('single-post-load-more/{postid}', 'SinglePostLoadMoreController@loadMore');
Router::get('content-category-load-more/{postcat}', 'ContentCategoryLoadMoreController@loadMore');
Router::get('category-feed-load-more/{cat_id}', 'CategoryLoadMoreController@loadMore');
Router::get('search-results-load-more/{term}', 'SearchResultsLoadMoreController@loadMore');
