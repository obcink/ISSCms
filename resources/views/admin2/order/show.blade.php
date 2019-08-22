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
        	<li><a href="{{ url('admin/order/good') }}">返回上一页</a></li>
            <li class="active"><a href="#record0" data-toggle="tab">订单详情</a></li>
            <li style="margin-left: 200px;">
                <form action="{{ url('admin/order/car') }}" method="get">
                    {{--<input type="text" name="hj_phone" placeholder="请输入电话">--}}
                    <input type="text" name="hj_number" placeholder="请输入订单编号">
                    <input type="text" name="hj_car_number" placeholder="请输入车牌号">
                    <input type="text" name="hj_name" placeholder="请输入站点">
                    <input type="text" name="hj_phone" placeholder="请输入手机号">
                    <select name="hj_is_take" id="">
                        <option value="">全部</option>
                        <option value="no">未接单</option>
                        <option value="ing">接单中</option>
                        <option value="yes">接单完成</option>
                    </select>
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--洗车订单-->
            <div class="tab-pane fadein active" id="record0">
                <div class="allShow">
                    <table style="width: 100%" class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>订单编号</th>
                            <th>商品名称</th>
                            <th>金额</th>
                            <th>支付状态</th>
                            <th>订单状态</th>
                            <th>支付方式</th>
                            <th>服务点</th>
                            <th>积分使用情况</th>
                            <th>优惠券使用情况</th>
                            <th>订单日期</th>
                        </tr>
                        
                        <tr>
                            <td>
                                <p>{{ $order['id'] }}</p>
                            </td>
                            <td>
                                <p>{{ $order['hj_number'] }}</p>
                            </td>
                            <td>
                                <p>{{ $order['gname'] }}</p>
                            </td>
                            <td>
                                <p>{{ $order['hj_price_present'] }}</p>
                            </td>
                            <!--订单状态-->
                            <td>
                                <p>@if($order['hj_status'] == 'success') 成功 @elseif($order['hj_status'] == 'fail') 失败 @elseif($order['hj_status'] == 'refund') 申请退款 @elseif($order['hj_status'] == 'overrefund') 已退款 @else 未付款 @endif</p>
                            </td>
                            <td>
                                <p>
                                    @if($order['hj_is_success'] == 'no' && $order['hj_is_take'] == 'no')
                                        未接单
                                    @elseif($order['hj_is_success'] == 'no' && $order['hj_is_take'] == 'ing')
                                        接单中
                                    @elseif($order['hj_is_success'] == 'yes' && $order['hj_is_take'] == 'yes')
                                        订单完成
                                    @endif
                                </p>
                            </td>
                            <!--支付方式-->
                            <td>
                                <p>@if($order['hj_mode'] == 1) 微信支付 @elseif($order['hj_mode'] == 2) 支付宝支付 @else 现金支付 @endif</p>
                            </td>
                            <!--服务点-->
                            <td>
                                <p class="blueText">{{ $order['sname'] }}</p>
                            </td>
                            <td>
                                <p class="blueText">@if($order['hj_integral'] == 'true') -{{ $order['hj_integral_qingkuang'] }}积分 @else 未使用积分 @endif</p>
                            </td>
                            <td>
                                <p class="blueText">@if($order['hj_youhui'] == 'true') 抵扣{{ $order['hj_youhui_qingkuang'] }}元 使用的{{ $order['yname'] }} @else 未使用优惠券 @endif</p>
                            </td>
                            <td>
                                <p class="blueText">{{ date('Y-m-d H:i:s', $order['hj_end_time']) }}</p>
                            </td>
                        </tr>
         
                        </tbody></table>
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

@stop