<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GoodsController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['middleware' => ['bindings', 'serializer:array']], function ($api) {
    //路由分组
    $api->group(['prefix' => 'admin'], function ($api) {
        //需要登录的路由
        $api->group(['middleware' => 'auth'], function ($api) {
            /**
             * 用户管理
             */
            //禁用/启用用户
            $api->patch('users/{user}/lock', [UserController::class, 'lock'])->name('users.lock');

            //用户管理资源路由
            $api->resource('users', UserController::class, [
                'only' => ['index', 'show']
            ]);

            /**
             * 分类管理
             */
            //分类状态
            $api->patch('category/{category}/status', [CategoryController::class, 'status']);

            //分类管理资源路由
            $api->resource('category', CategoryController::class, [
                'except' => ['destroy']
            ]);

            /**
             * 商品管理
             */
            //是否上架
            $api->patch('goods/{good}/on', [GoodsController::class, 'isOn']);

            //是否推荐
            $api->patch('goods/{good}/recommend', [GoodsController::class, 'isRecommend']);

            //商品管理资源路由
            $api->resource('goods', GoodsController::class, [
                'except' => ['destroy']
            ]);

            /**
             * 评论管理
             */
            //回复评论
            $api->patch('comment/{comment}/reply', [CommentController::class, 'reply']);

            $api->resource('comment', CommentController::class, [
                'only' => ['index', 'show']
            ]);

            /**
             * 订单管理
             */
            //订单发货
            $api->patch('orders/{order}/post', [OrderController::class, 'post']);

            //订单管理资源路由
            $api->resource('orders', OrderController::class, [
                'only' => ['index', 'show']
            ]);

            /**
             * 轮播图资源路由管理
             */
            //排序
            $api->patch('slides/{slide}/seq', [SlideController::class,'seq']);
            //资源路由
            $api->resource('slides', SlideController::class);
            //轮播图状态
            $api->patch('slides/{slide}/status', [SlideController::class,'status']);

            /**
             * 菜单管理
             */
            $api->get('menus',[MenuController::class,'index']);

        });
    });
});
