@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

    <aside class="aside0" id="hiddenDiv10" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab3" class="nav nav-tabs">
            <li class="active"><a href="#record0" data-toggle="tab">洗车订单</a></li>
            <li><a href="#record1" data-toggle="tab">商品订单</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--洗车订单-->
            <div class="tab-pane fadein active" id="record0">
                <div class="allShow">
                    <table class="showTable">
                        <tbody><tr>
                          	<th>订单ID</th>
                            <th>车牌号</th>
                            <th>手机号</th>
                            <th>订单编号</th>
                            <th>订单状态</th>
                            <th>服务项目</th>
                            <th>订单日期</th>
                            <th>支付方式</th>
                            <th>服务点</th>
                            {{--<th>操作管理</th>--}}
                        </tr>
                        @foreach($carorder as $v)
                        <tr>
                          	<td>
                                <p>{{ $v['id'] }}</p>
                            </td>
                            <!--车牌号-->
                            <td>
                                <p>{{ $v['hj_car_number'] }}</p>
                            </td>
                            <!--头像-->
                            <!--<td>
                                <img class="userImg" src="images/userImg.jpg" alt="">
                            </td>-->
                            <!--手机号-->
                            <td>
                                <p class="blueText">{{ $v['hj_phone'] }}</p>
                            </td>
                            <!--订单编号-->
                            <td>
                                <p>{{ $v['hj_number'] }}</p>
                            </td>
                            <!--订单状态-->
                            <td>
                                <p>@if($v['hj_status'] == 'success') 成功 @elseif($v['hj_status'] == 'fail') 失败 @else 未付款 @endif</p>
                            </td>
                            <!--服务项目-->
                            <td>
                                <p>{{ $v['pname'] }}</p>
                            </td>
                            <!--订单日期-->
                            <td>
                                <p>{{ date('Y-m-d h:i:s', $v['hj_end_time']) }}</p>
                            </td>
                            <!--支付方式-->
                            <td>
                                <p>@if($v['hj_mode'] == 1) 微信支付 @elseif($v['hj_mode'] == 2) 支付宝支付 @else 现金支付 @endif</p>
                            </td>
                            <!--服务点-->
                            <td>
                                <p class="blueText">{{ $v['sname'] }}</p>
                            </td>
                            <!--操作管理-->
                            {{--<td>--}}
                                {{--<p class="delete">编辑</p>--}}
                                {{--<p class="delete" onclick="deleteBtn5(this)">删除</p>--}}
                            {{--</td>--}}
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $carorder->links() }}</div>
                </div>
            </div>
            <!--商品订单-->
            <div class="tab-pane fade" id="record1">
                <div class="allShow">
                    <table class="showTable">
                        <tbody><tr>
                            <th>车牌号</th>
                            <th>手机号</th>
                            <th>订单编号</th>
                            <th>订单状态</th>
                            <th>商品名称</th>
                            <th>订单日期</th>
                            <th>支付方式</th>
                            <th>服务点</th>
                            {{--<th>操作管理</th>--}}
                        </tr>
                        @foreach($goodorder as $v)
                        <tr>
                            <!--车牌号-->
                            <td>
                                <p>{{ $v['hj_car_number'] }}</p>
                            </td>
                            <!--头像-->
                            <!--<td>
                                <img class="userImg" src="images/userImg.jpg" alt="">
                            </td>-->
                            <!--手机号-->
                            <td>
                                <p class="blueText">{{ $v['hj_phone'] }}</p>
                            </td>
                            <!--订单编号-->
                            <td>
                                <p>{{ $v['hj_number'] }}</p>
                            </td>
                            <!--订单状态-->
                            <td>
                                <p>@if($v['hj_status'] == 'success') 成功 @elseif($v['hj_status'] == 'fail') 失败 @else 未付款 @endif</p>
                            </td>
                            <!--服务项目-->
                            <td>
                                <p>{{ $v['gname'] }}</p>
                            </td>
                            <!--订单日期-->
                            <td>
                                <p>{{ date('Y-m-d H:i:s', $v['hj_end_time']) }}</p>
                            </td>
                            <!--支付方式-->
                            <td>
                                <p>@if($v['hj_mode'] == 1) 微信支付 @elseif($v['hj_mode'] == 2) 支付宝支付 @else 现金支付 @endif</p>
                            </td>
                            <!--服务点-->
                            <td>
                                <p class="blueText">{{ $v['sname'] }}</p>
                            </td>
                            <!--操作管理-->
                            {{--<td>--}}
                                {{--<p class="delete">编辑</p>--}}
                                {{--<p class="delete">删除</p>--}}
                            {{--</td>--}}
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $goodorder->links() }}</div>
                </div>
            </div>
            </div>
        </div>
    </aside>
</div>
<script>
     $('.navListLi:first-child').css('height','50px');
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	//$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
</script>
@stop