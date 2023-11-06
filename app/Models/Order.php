<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * 所属用户(该订单属于某个用户)
     */
    public function User()
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
     * 订单拥有的订单细节
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }

}
