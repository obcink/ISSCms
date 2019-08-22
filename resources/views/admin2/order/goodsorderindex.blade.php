@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

    <aside class="aside0" id="hiddenDiv10" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab3" class="nav nav-tabs">
            <li  class="active"><a href="#record1" data-toggle="tab">商品订单</a></li>
            <form style="margin-left: 200px;" action="{{ url('admin/order/goodsorder') }}" method="get">
                用户类型 <select  class="link" id="coatChose4" name="hj_user_type">
                    <option value="">全部</option>
                    <option value="1">普通会员</option>
                    <option value="2">VIP用户</option>
                    <option value="3">大客户</option>
                </select>
                下单时间 <select  class="link" id="coatChose4" name="hj_start_time">
                    <option value="0">全部</option>
                    <option value="1">今日下单</option>
                </select>
                <input style="padding: 5px 10px; background-color: #ddd; margin-left: 20px; border: none;"  type="submit" value="查询">
            </form>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--商品订单-->
            <div class="tab-pane fadein active" id="record1">
                <div class="allShow">
                    <table style="width: 100%;" class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>订单编号</th>
                            <th>用户类型</th>
                            <th>车牌号</th>
                            <th>手机号</th>
                            <th>订单状态</th>
                            <th>商品名称</th>
                            <th>支付方式</th>
                            <th>价格</th>
                            <th>服务点</th>
                            <th>订单日期</th>
                            <th>照片记录</th>
                        </tr>
                        @foreach($goodorder as $v)
                        <tr>
                            <td>
                                <p>{{ $v['id'] }}</p>
                            </td>
                            <td>
                                <p>{{ $v['hj_number'] }}</p>
                            </td>
                            <td>
                                <p>@if($v['hj_user_type'] == 1) 普通会员 @elseif($v['hj_user_type'] == 4) vip @elseif($v['hj_user_type'] == 3) 大客户 @endif</p>
                            </td>
                            <td>
                                <p>{{ $v['hj_car_number'] }}</p>
                            </td>
                            <!--手机号-->
                            <td>
                                <p class="blueText">{{ $v['hj_phone'] }}</p>
                            </td>
                            <!--订单编号-->

                            <!--订单状态-->
                            <td>
                                <p>@if($v['hj_status'] == 'success') 成功 @elseif($v['hj_status'] == 'fail') 失败 @else 未付款 @endif</p>
                            </td>
                            <!--服务项目-->
                            <td>
                                <p>{{ $v['gname'] }}</p>
                            </td>
                            <td>
                                <p>@if($v['hj_mode'] == 1) 微信支付 @elseif($v['hj_mode'] == 2) 支付宝支付 @else 现金支付 @endif</p>
                            </td>
                            <td>
                                <p>{{ $v['hj_price_present'] }}</p>
                            </td>
                            <!--服务点-->
                            <td>
                                <p class="blueText">{{ $v['sname'] }}</p>
                            </td>
                            <td>
                                <p>{{ date('Y-m-d H:i:s', $v['hj_end_time']) }}</p>
                            </td>
                            <!--操作管理-->
                            <td>
                                <img id="show" onclick="show('{{ $v['hj_taking_photos'] }}')" width="50px;" height="50px;" src="{{ $v['hj_taking_photos'] }}" alt="">
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $goodorder->appends(['hj_start_time' => $hj_start_time, 'hj_user_tupe' => $hj_user_type]) }}</div>
                </div>
            </div>
            </div>
        </div>
    </aside>
</div>
<script>
    $('.navListLi:nth-child(2)').css('height','50px');
    $('.navListLi:nth-child(3)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>
<script>
    function show(img) {
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            //area: ['700px','700px '],
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: '<img style="width:100%;" src="'+img+'" alt="">'
        });

    }
</script>
@stop