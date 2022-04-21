<?php

use Rareloop\Lumberjack\Facades\Router;
// use Zend\Diactoros\Response\HtmlResponse;

// Router::get('hello-world', function () {
//     return new HtmlResponse('<h1>Hello World!</h1>');
// });
include( __DIR__ . '/home.php' );

Router::get('home-load-more', '\App\HomeController@loadMore');
