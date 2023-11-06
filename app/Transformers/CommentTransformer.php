<?php

namespace App\Transformers;

use App\Models\Comment;
use League\Fractal\TransformerAbstract;
use function App\oss_url;

class CommentTransformer extends TransformerAbstract
{
    //可include的方法
    protected $availableIncludes = ['user','goods'];

    public function transform(Comment $comment)
    {
        //因为图不是必填的，做判断防止报错
        $pic_urls = [];
        if (is_array($comment->pics)) {
            foreach ($comment->pics as $p) {
                array_push($pic_urls, oss_url($p));
            }
        }

        return [
            'id' => $comment->id,
            'content' => $comment->content,
            'user_id' => $comment->user_id,
            'goods_id' => $comment->goods_id,
            'rate' => $comment->rate,
            'reply' => $comment->reply,
            'updated_at' => $comment->updated_at,
            'created_at' => $comment->created_at,
        ];
    }

    //用户数据
    public function includeUser(Comment $comment)
    {
        return $this->item($comment->user, new UserTransformer());
    }

    //商品数据
    public function includeGoods(Comment $comment)
    {
        return $this->item($comment->goods, new GoodTransformer());
    }

}
