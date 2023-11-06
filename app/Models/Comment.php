<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //强制转换的属性
    protected $casts = [
        'pics' => 'array',
    ];

    /***
     * 评价是属于用户的
     */
    public function user()
    {
        /**
         * 多对一查询（belongsTo）
         * 第一个参数是被关联的命名空间
         * 第二个参数是本模型的关系字段
         * 第三个参数是【被】关联模型的关系字段
         */
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * 评论所属商品
     */
    public function goods()
    {
        return $this->belongsTo(Good::class, 'goods_id', 'id');
    }
}
