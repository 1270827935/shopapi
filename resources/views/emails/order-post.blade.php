<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>您的单号：{{$order->order_no}}已经发货</p>
<h4>商品信息：</h4>
<ul>
    @foreach($order->orderDetails()->with('goods')->get() as $detail)
        <li>{{$detail->goods->title}},单价为:{{$detail->price}},数量为:{{$detail->num}}</li>
    @endforeach
</ul>
<h5>
    总付款：{{$order->amount}}
</h5>

</body>
</html>
