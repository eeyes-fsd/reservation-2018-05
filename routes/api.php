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
],function ($api){
    $api->get('version',function (){
        return response('This is version v1');
    });

    /** 登陆相关接口 */
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ],function ($api){
        //微信登陆接口
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');
        //刷新 Token 接口
        $api->put('authorizations/current', 'AuthorizationsController@update')
            ->name('api.authorizations.update');
    });

    /** 时间-块 无需认证接口 */
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ],function ($api){
        //获取可用日期
        $api->get('days', 'DaysController@index')
            ->name('api.days.index');
        //获取某日可用时间块
        $api->get('days/{day}','DaysController@getDay')
            ->name('api.days.get');
    });

    /** 需要 token 认证的接口 */
    $api->group(['middleware'=>'api.auth'],function ($api){
        // 上传身份证件照片
        $api->post('user/id-card','UsersController@idCard')
            ->name('api.user.id-card');
        // 检查身份证件照片
        $api->post('user/check','UsersController@checkCard')
            ->name('api.user.check');
        // 对指定时间段进行预约
        $api->post('reserve','BlocksController@update')
            ->name('api.reserve');
    });
});
