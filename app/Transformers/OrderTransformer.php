<?php

namespace App\Transformers;

use App\Models\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['user', 'orderDetails'];

    public function transform(Order $order)
    {
        return [
            'id' => $order->id,
            'order_no' => $order->order_no,
            'user_id' => $order->user_id,
            'amount' => $order->amount,
            'address_id' => $order->address_id,
            'express_type' => $order->express_type,
            'express_no' => $order->express_no,
            'pay_time' => $order->pay_time,
            'pay_type' => $order->pay_type,
            'trade_no' => $order->trade_no,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
        ];
    }

    /**
     * 用户数据
     */
    public function includeUser(Order $order)
    {
        return $this->item($order->user, new UserTransformer());
    }

    /**
     * 细节数据
     */
    public function includeOrderDetails(Order $order)
    {
        return $this->collection($order->orderDetails, new OrderDetailsTransformer());
    }

}
