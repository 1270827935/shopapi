<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('task/read/{id}','TaskController@read')
//    ->where('id','[a-z]+');
//Route::get('task/index','TaskController@index');
//Route::redirect('index','task/index',301);
//Route::view('task','task',['id'=>10]);
//Route::any('disease','DiseaseController@diseaseCountValue');
//Route::get('test/testOneByOne','TestController@testOneByOne');
//Route::get('test/testOneByMore','TestController@testOneByMore');
//Route::get('test/testMoreByOne','TestController@testMoreByOne');

Route::get('user/email', function (){
    \Illuminate\Support\Facades\Mail::raw('测试一下发邮件',function (\Illuminate\Mail\Message $message){
        //获取回调方法中的形参
        dump(func_get_args());

        //发送谁
        $message->to('1270827935@qq.com', 'shopApi');

        //主题
        $message->subject('测试邮件');
    });
});
