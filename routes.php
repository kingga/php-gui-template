<?php

require_once 'vendor/autoload.php';

use Kingga\Gui\Routing\Request;
use Kingga\Gui\Routing\RouteGroup;

use Classes\Controllers\MainController;

/**
 * Create the routes for the application. Everything inside of the create()
 * function are included in the base RouteGroup, if you would like to single
 * out certain routes into their own custom groups you can by using the
 * RouteGroup::group() function. The benefits of this is that you can define
 * custom middleware for each route group allowing you to run custom checks
 * on a bulk set of routes.
 *
 * Functions:
 * RouteGroup::route(string $id, string|callable $controller);
 * RouteGroup::group(RouteGroup $group);
 * RouteGroup::middleware(Middleware $middleware);
 *
 * Examples:
 * $group->group((new RouteGroup)->create(function () {}));
 */
$router->create(function (RouteGroup $group) {
    $group->route('main', 'MainController@main');
    $group->route('closeApplication', [MainController::class, 'closeApplication']);
});
