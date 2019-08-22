@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->


    <script src="{{ url('admin/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.js') }}"></script>
    <!--layer插件-->
    <script src="{{ url('admin/layer/layer.js') }}"></script>

    @if (count($errors) > 0)
        @foreach($errors->all() as $error)
            <script>
                layer.msg('{{ $error }}');
            </script>
        @endforeach
    @endif
    @if (session('msg'))
        <script>
            layer.msg('{{ session('msg') }}');
        </script>
    @endif

    <aside class="aside0" id="hiddenDiv10" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab3" class="nav nav-tabs">
            <li><a href="{{ url('admin/order/car') }}">返回上一页</a></li>
            <li class="active"><a href="#record0" data-toggle="tab">订单详情</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--洗车订单-->
            <div class="tab-pane fadein active" id="record0">
                <div class="allShow">
                    <table style="width: 100%;" class="showTable">
                        <tbody>
                        <tr>
                            <th>订单编号</th>
                            <th>用户昵称</th>
                            <th>用户类型</th>
                            <th>商品套餐</th>
                            <th>是否使用卡券</th>
                            <th>是否使用优惠券</th>
                            <th>是否使用积分</th>
                            <th>接单时间</th>
							<th>完成时间</th>
                          	<th>操作人员</th>
                          	<th>联系电话</th>
                        </tr>
                        <tr>
                            <td>
                                <p>{{ $order['hj_number'] }}</p>
                            </td>
                            <td>
                                <p>{{ $order['user_name'] }} {{ $order['uname'] }}</p>
                            </td>
                            <td>
                                <p>@if($order['hj_user_type'] == 1) 普通用户 @elseif($order['hj_user_type'] == 3) 大客户 @elseif($order['hj_user_type'] == 4) vip客户 @endif</p>
                            </td>
        
                            <td>
                                <p>{{ $order['goods_group_name'] }}</p>
                            </td>
                            <td>
                                <p>@if($order['hj_card_status'] == 1) 是 （{{ $order['card_name'] }}） @else 否 @endif</p>
                            </td>
                            <!--订单状态-->
                            <td>
                                <p>@if($order['hj_youhui'] == 'true') 是 {{ $order['coupon_name'] }} {{ $order['coupon_price'] }} @else 否 @endif</p>
                            </td>
                            <td>
                                <p>@if($order['hj_integral'] == 'true') 是 使用了{{ $order['hj_integral_qingkuang'] }}积分  @else 否 @endif</p>
                            </td>
                            <td>
                                <p>{{ date('Y-m-d H:i:s', $order['hj_jie_time']) }}</p>
                            </td>
                          	<td>
                                <p>{{  date('Y-m-d H:i:s', $order['hj_wan_time']) }}</p>
                            </td>
                          	<td>
                                <p>{{ $order['staff_name'] }} {{ $order['sname'] }}</p>
                            </td>
                          	<td>
                                <p>{{ $order['staff_phone'] }}</p>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </aside>
</div>
<script>
    $('.navListLi:nth-child(2)').css('height','50px');
    $('.navListLi:nth-child(3)').css('height','50px');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>

{{--<table style="width: 100%;" class="showTable"><tbody><tr><th>订单编号</th><th>用户昵称</th><th>用户类型</th><th>车牌号</th><th>洗车服务</th><th>商品套餐</th><th>是否使用卡券</th><th>是否使用优惠券</th><th>是否使用积分</th><th>是否支付</th><th>实付价格</th></tr><tr><td><p>{{ $order["hj_number"] }}</p></td><td><p>{{ $order["user_name"] }}</p></td><td><p>@if($order["hj_user_type"] == 1) 普通用户 @elseif($order["hj_user_type"] == 3) 大客户 @elseif($order["hj_user_type"] == 4) vip客户 @endif</p></td><td><p>{{ $order["hj_car_number"] }}</p></td><td><p>{{ $order["project_name"] }}</p></td><td><p>{{ $order["goods_group_name"] }}</p></td><td><p>@if($order["hj_card_status"] == 1) 是 {{ $order["card_name"] }} @else 否 @endif</p></td><td><p>@if($order["hj_youhui"] == 'ture') 是 {{ $order["coupon_name"] }} {{ $order["coupon_price"] }} @else 否 @endif</p></td><td><p>@if($order["hj_integral"] == "ture") 是 {{ $order["hj_integral_qingkuang"] }}  @else 否 @endif</p></td><td><p>@if($order["hj_status"] == "unpay") 未支付 @elseif($order["hj_status"] == "success") 支付成功 @elseif($order["hj_status"] == "fail") 支付失败 @endif</p></td><td><p>{{ $order["hj_price_present"] }}</p></td></tbody></table>--}}

@stop