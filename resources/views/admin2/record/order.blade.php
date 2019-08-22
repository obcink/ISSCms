@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

    <aside class="aside0" id="hiddenDiv25" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab3" class="nav nav-tabs">
            <li class="active"><a href="#current1" data-toggle="tab">订单流水管理</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--订单流水管理-->
            <div class="tab-pane fadein active" id="current1">
                <div class="allShow">
                    <table class="showTable">
                        <tbody><tr>
                            <th>订单编号</th>
                            <th>手机号</th>
                            <th>车牌号</th>
                            <th>商品名称</th>
                            <th>订单金额(元)</th>
                            <th>服务站点</th>
                            <th>订单状态</th>
                            <th>付款方式</th>
                            <th>订单日期</th>
                        </tr>
                        @foreach($dingdan as $v)
                        <tr>
                            <!--订单编号-->
                            <td>
                                <p>{{ $v['hj_number'] }}</p>
                            </td>
                            <!--头像-->
                            <!--<td>
                                <img class="userImg" src="images/userImg.jpg" alt="">
                            </td>-->
                            <!--手机号-->
                            <td>
                                <p>{{ $v['hj_phone'] }}</p>
                            </td>
                            <!--车牌号-->
                            <td>
                                <p>{{ $v['hj_car_number'] }}</p>
                            </td>
                            <!--项目-->
                            <td>
                                <p>{{ $v['gname'] }}</p>
                            </td>
                            <!--订单金额-->
                            <td>
                                <p class="blueText">53</p>
                            </td>
                            <!--服务站点-->
                            <td>
                                <p>{{ $v['sname'] }}</p>
                            </td>
                            <!--订单状态-->
                            <td>
                                <p>已支付</p>
                            </td>
                            <!--付款方式-->
                            <td>
                                <p class="blueText">@if($v['hj_mode'] == '1') 微信支付 @elseif($v['hj_mode'] == '2') 支付宝支付 @else 现金支付 @endif</p>
                            </td>
                            <!--订单日期-->
                            <td>
                                <p>{{ date('Y-m-d H:i:s', $v['hj_time']) }}</p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                </div>
                <div>{{ $dingdan->links() }}</div>
                <a style="color: #000;" href="{{ url('admin/record/order/export') }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
            </div>
        </div>
    </aside>
</div>
<script>
    $('.navListLi:nth-child(2)').css('height','50px');
    $('.navListLi:nth-child(3)').css('height','50px');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
</script>
@stop