<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\GoodsRequest;
use App\Models\Category;
use App\Models\Good;
use App\Transformers\GoodTransformer;
use Illuminate\Http\Request;

class GoodsController extends BaseController
{
    /**
     * 商品列表
     */
    public function index(Request $request)
    {
        $title = $request->query('title');//传了商品名称的情况
        $category_id = $request->query('category_id');//传了商品id
        $is_on = $request->query('is_on', false);//是否上架的状态，上架、下家，不传的时候给默认值false
        $is_recommend = $request->query('is_recommend', false);//是否推荐的状态，推荐、不推荐，不传的时候给默认值false
        $goods = Good::when($title, function ($query) use ($title) {
            $query->where('title', 'like', "%$title%");//双引号写变量，%模糊搜索
        })
            ->when($category_id, function ($query) use ($category_id) {
                $query->where('category', $category_id);//id的话直接等于
            })
            ->when($is_on, function ($query) use ($is_on) {
                $query->where('is_on', $is_on);
            })
            ->when($is_recommend, function ($query) use ($is_recommend) {
                $query->where('is_recommend', $is_recommend);
            })
            ->paginate(2);

        return $this->response->paginator($goods, new GoodTransformer());
    }

    /**
     * 添加商品
     */
    public function store(GoodsRequest $goodsRequest)
    {
        //对分类进行检查，是否存在，智能使用3级分类，并且分类不能被禁用
        $category = Category::find($goodsRequest->category_id);
        if (!$category) return $this->response->errorBadRequest('分类不存在!');
        if ($category->status == 0) return $this->response->errorBadRequest('分类被禁用!');
        if ($category->level != 3) return $this->response->errorBadRequest('只能向3级分类添加商品!');
        $user_id = auth('api')->id();
        $goodsRequest->offsetSet('user_id', $user_id);
        Good::create($goodsRequest->all());
        return $this->response->created();
    }

    /**
     * 商品详情
     */
    public function show(Good $good)
    {
        return $this->response->item($good, new GoodTransformer());
    }

    /**
     * 更新商品
     */
    public function update(GoodsRequest $request, Good $good)
    {
        //对分类进行检查，是否存在，只能使用3级分类，并且分类不能被禁用
        $category = Category::find($request->category_id);
        if (!$category) return $this->response->errorBadRequest('分类不存在！');
        if ($category->status == 0) return $this->response->errorBadRequest('分类被禁用！');
        if ($category->level != 3) return $this->response->errorBadRequest('智能向3级分类添加商品！');

        $good->update($request->all());
        return $this->response->noContent();

    }

    /**
     * 是否上架
     */
    public function isOn(Good $good)
    {
        $good->is_on = $good->is_on == 0 ? 1 : 0;
        $good->save();
        return $this->response->noContent();
    }

    /**
     * 是否推荐
     */
    public function isRecommend(Good $good)
    {
        $good->is_recommend = $good->is_recommend == 0 ? 1 : 0;
        $good->save();
        return $this->response->noContent();
    }

}
