@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

    <aside class="aside0" id="hiddenDiv25" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab3" class="nav nav-tabs">
            <li class="active"><a href="#current0" data-toggle="tab">充值流水记录</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--充值流水记录-->
            <div class="tab-pane fadein active" id="current0">
                <div class="allShow">
                    <table class="showTable">
                        <tbody><tr>
                            <th>订单编号</th>
                            <th>手机号</th>
                            <th>充值金额(元)</th>
                            <th>支付状态</th>
                            <th>交易方式</th>
                            <th>时间</th>
                        </tr>
                        @foreach($chongzhi as $v)
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
                            <!--充值金额-->
                            <td>
                                <p class="blueText">{{ $v['hj_price'] }}</p>
                            </td>
                            <!--支付状态-->
                            <td>
                                <p>已支付</p>
                            </td>
                            <!--交易方式-->
                            <td>
                                <p class="blueText">@if($v['hj_mode'] == '1') 微信支付 @elseif($v['hj_mode'] == '2') 支付宝支付 @else 现金支付 @endif</p>
                            </td>
                            <!--时间-->
                            <td>
                                <p>{{ date('Y-m-d H:i:s', $v['hj_time']) }}</p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                </div>
            </div>
                <div>{{ $chongzhi->links() }}</div>
            <a style="color: #000;" href="{{ url('admin/record/recharge/export') }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
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