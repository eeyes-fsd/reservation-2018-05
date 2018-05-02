<?php

use Illuminate\Http\Request;

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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',[
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['serializer:array', 'bindings', 'change-locale']
],function ($api){

    // 需要 token 认证的接口
    $api->group(['middleware'=>'api.auth'],function ($api){
        //TODO:Create Api
    });
});
