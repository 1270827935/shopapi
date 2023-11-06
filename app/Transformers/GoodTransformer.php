<?php

namespace App\Transformers;

use App\Models\Good;
use League\Fractal\TransformerAbstract;
use function App\oss_url;

class GoodTransformer extends TransformerAbstract
{
    //配置可用的关联
    protected $availableIncludes = ['category', 'user','comments'];

    public function transform(Good $good)
    {
        $pic_urls = [];
        foreach ($good->pics as $p) {
            array_push($pic_urls, oss_url($p));
        }

        return [
            'id' => $good->id,
            'title' => $good->title,
            'category_id' => $good->category_id,
//          'category_name'=>  Category::find($good->category_id)->name,//处理好分类的名称
            'description' => $good->description,
            'pics' => $good->pics,
            'pics_url' => $pic_urls,
            'price' => $good->price,
            'stock' => $good->stock,
            'cover' => $good->cover,
            'cover_url' => oss_url($good->cover),
            'details' => $good->details,
            'is_on' => $good->is_on,
            'is_recommend' => $good->is_recommend,
            'created_at' => $good->created_at,
            'updated_at' => $good->updated_at,
        ];
    }

    /**
     * 关联分类
     */
    public function includeCategory(Good $good)
    {
        return $this->item($good->category, new CategoryTransformer());
    }

    /**
     * 关联用户
     */
    public function includeUser(Good $good)
    {
        return $this->item($good->user, new UserTransformer());
    }

    /**
     * 关联评论
     */
    public function includeComments(Good $good)
    {
        return $this->collection($good->comments, new CommentTransformer());
    }


}
