<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Dingo\Api\Facade\Route;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api ){
    $api->get('index', [\App\Http\Controllers\TestController::class,'index']);

    //命名路由
    $api->get('nickname', ['as'=>'test.nickname','uses'=>'\App\Http\Controllers\TestController@nickname']);



});


