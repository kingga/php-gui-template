<?php

require_once 'vendor/autoload.php';

use Gui\Application;
use Kingga\Gui\Routing\Router;
use Dotenv\Dotenv;

// Environment configuration.
$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

// Application.
$app = new Application([
    'title' => env('APP_TITLE', pathinfo(__FILE__, PATHINFO_FILENAME)),
    'width' => env('APP_WND_WIDTH', 1280),
    'height' => env('APP_WND_HEIGHT', 720),
]);

// Router.
$router = new Router($app, env('NS_CONTROLLERS', '\\'), env('NS_MIDDLEWARES', '\\'));
require_once 'routes.php';

$renderer = new Kingga\Gui\View\Renderer($router);
$router->setRenderer($renderer);

// Startup the base view.
$app->on('start', function () use ($app, $router, $renderer) {
    $router->handle('main');
});

// Run the application.
$app->run();
