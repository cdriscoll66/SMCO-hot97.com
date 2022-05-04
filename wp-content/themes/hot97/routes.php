<?php

use Rareloop\Lumberjack\Facades\Router;
use Rareloop\Lumberjack\Http\ServerRequest;

// use Zend\Diactoros\Response\HtmlResponse;

// Router::get('hello-world', function () {
//     return new HtmlResponse('<h1>Hello World!</h1>');
// });


Router::get('home-load-more', function (ServerRequest $request) {
    // Manually include the file
    include __DIR__ . '/home.php';

    // Manually call the controller method that you want to use
    (new \App\HomeController)->loadMore($request);
});
