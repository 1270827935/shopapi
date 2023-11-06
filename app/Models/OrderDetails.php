<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    /**
     * 订单细节关联商品：一对一
     */
    public function goods()
    {
        /**
         * 一对一查询(hasOne)
         * 第一个参数是关联的表的命名空间
         * 第二个参数是关联表的关系字段
         * 第三个参数是本表的关系字段
         */
        return $this->hasOne(Good::class, 'id', 'goods_id');
    }

    /**
     * 所属订单表
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

}
