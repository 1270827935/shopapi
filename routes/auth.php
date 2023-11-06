<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OssController;
use App\Http\Controllers\Auth\RegisterController;


$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function ($api){
    //路由组
    $api->group(['prefix'=>'auth'],function ($api){
        //注册
        $api->post('register',[RegisterController::class,'store']);

        //登录
        $api->post('login',[LoginController::class,'login'])->name('login');


        //需要登录的路由
        $api->group(['middleware'=>'auth'],function ($api){

            //退出
            $api->post('logout',[LoginController::class,'logout'])->name('logout');

            //刷新token
            $api->post('refresh',[LoginController::class,'refresh']);

            //阿里云oss token
            $api->get('oss/token',[OssController::class,'token']);

        });
    });
});
