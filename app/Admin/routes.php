<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    
    $router->resource('users', UsersController::class);
    $router->resource('cases', CasesController::class);
    $router->resource('comment', CommentController::class);

    $router->any('release', 'CommonActionController@release');//文章下线
    $router->any('filter', 'CommonActionController@filter');//评论过滤
});
