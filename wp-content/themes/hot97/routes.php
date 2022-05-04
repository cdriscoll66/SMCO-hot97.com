<?php

use Rareloop\Lumberjack\Facades\Router;
// use Zend\Diactoros\Response\HtmlResponse;

// Router::get('hello-world', function () {
//     return new HtmlResponse('<h1>Hello World!</h1>');
// });
if ( !class_exists( 'HomeController' ) ) {
    require_once(__DIR__ . '/home.php');
}

Router::get('home-load-more', '\App\HomeController@loadMore');


//Router::get('home-load-more', function () {
//    // Manually include the file
//    include __DIR__ . '/home.php';
//
//    // Manually call the controller method that you want to use
//    (new \App\HomeController)->loadMore();
//});
