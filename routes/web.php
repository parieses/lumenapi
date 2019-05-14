<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
//$router->get('user/{id}', function ($id) {
//    return 'User '.$id;
//});
//$router->get('posts/{postId}/comments/{commentId}', function ($postId, $commentId) {
//    return 'User '.$postId.'qw'.$commentId;
//});
//$router->get('foo[/{name}]', function ($name = null) {
//    return $name;
//});
//$router->get('profile', ['as' => 'profiles', function () {
//    return 12;
//}]);
$router->get('users[/{name}]', ['middleware' => ["log","security"],function($name) use($router){
//    return response()->json(['name' => 'Abigail', 'state' => 'CA']);
},'uses' => 'ExampleController@store']);
/**
 * 路由分主
 */
$router->group(['prefix' => 'admin'], function ()use($router) {
    $router->get('users', function ()    {
        return 12;
        // 匹配 "/admin/users" URL
    });
});

