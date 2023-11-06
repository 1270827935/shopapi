<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    //可批量赋值的字段
    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'description',
        'price',
        'stock',
        'cover',
        'pics',
        'is_on',
        'is_recommend'];

    //强制转换的属性
    protected $casts = [
        'pics' => 'array',
    ];

    /**
     * 商品所属的分类
     */
    public function category()
    {
        /**
         * 多对一查询（belongsTo）
         * 第一个参数是被关联的命名空间
         * 第二个参数是本模型的关系字段
         * 第三个参数是关联模型的关系字段
         */
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * 商品是哪个用户创建的
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * 商品对应多个评论：一对多
     */
    public function comments()
    {
        /**
         * 一对多查询(hasMany)
         * 第一个参数是关联的表的命名空间
         * 第二个参数是关联表的关系字段
         * 第三个参数是本表的关系字段
         */
        return $this->hasMany(Comment::class, 'goods_id', 'id');
    }

}
