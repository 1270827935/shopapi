<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\User;
use App\Transformers\GoodTransformer;


class TestController extends BaseController
{

    public function testOneByOne()
    {
        $data = Article::all();
        foreach ($data as $v){
            echo '文章编号：'.$v->id.'<br/>';
            echo '文章名称：'.$v->article_name.'<br/>';
            echo '文章作者：'.$v->author->author_name.'<br/>';
            echo '<hr/>';
        }
    }

    public function testOneByMore()
    {
        $data = Author::all();
        foreach ($data as $v){
            echo '作者编号：'.$v->id;
            echo '作者姓名：'.$v->article_name;
            echo '作品：';
            foreach ($v->article as $a){
                echo $a->article_name;
            }
        }
    }

    public function testMoreByOne()
    {
        $data = Article::all();
        foreach ($data as $v){
            echo '文章id：'.$v->id;
            echo '文章名称：'.$v->article_name;
            echo '作者名称：'.$v->author->author_name;
        }
    }

    public function index()
    {
        $user = User::find(1);
        return $this->response->item($user,new GoodTransformer);
    }


    public function nickname()
    {
        $url = app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('test.nickname');
        dd($url);
    }

    //

}
