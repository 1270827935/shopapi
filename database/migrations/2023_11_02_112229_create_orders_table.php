<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('下单的用户');
            $table->integer('order_no')->comment('订单号');
            $table->integer('amount')->comment('总金额，单位分');
            $table->tinyInteger('status')->default(1)->comment('订单状态：1=>下单,2=>支付，3=>发货，4=>收获');
            $table->integer('address_id')->comment('收获地址');
            $table->string('express_type')->comment('快递类型：SF，YT，YD');
            $table->string('express_no')->comment('快递单号');
            $table->timestamp('pay_time')->nullable()->comment('支付时间');
            $table->string('pay_type')->nullable()->comment('支付类型：支付宝，微信');
            $table->string('trade_no')->nullable()->comment('支付单号：支付宝，微信');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
