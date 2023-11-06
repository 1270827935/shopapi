<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class GoodsRequest extends BaseRequest
{
    /**
     * 验证
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required|max:25',
            'price' => 'required|min:0',
            'stock' => 'required|min:0',
            'cover' => 'required',
            'pics' => 'required|array',
            'details' => 'required',
        ];
    }

    //信息重写
    public function messages()
    {
        return [
            'category_id.required' => '分类不能为空',
            'title.required' => '商品名称不能为空',
            'description.required' => '描述不能为空',
            'description.max' => '长度不能超过255',
            'price.required' => '价格不能为空',
            'price.min' => '价格最小为0',
            'stock.required' => '库存不能为空',
            'stock.min' => '库存最小为0',
            'cover.required' => '封面图不能为空',
            'pics.required' => '小图集不能为空',
            'pics.array' => '小图集为数组',
            'details.required' => '详情不能为空',
        ];
    }
}
