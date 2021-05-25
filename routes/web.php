<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Utils\Response;
use Illuminate\Http\Request;

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

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->post('quotes', 'QuoteController@create');
        $router->get('quotes', 'QuoteController@all');
        $router->get('quotes/{id}', 'QuoteController@show');
        $router->put('quotes/{id}', 'QuoteController@update');
        $router->delete('quotes/{id}', 'QuoteController@delete');
        $router->put('logout', 'UserController@logout');
        $router->get('user', function(Request $request){
            $user = $request->user();
            return Response::success('Usuario autenticado!  :)', $user);
        });
    });
    $router->post('login', 'UserController@login');
});