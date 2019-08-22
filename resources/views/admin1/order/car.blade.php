@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->


    <script src="{{ url('admin/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.js') }}"></script>
    <!--layer插件-->
    <script src="{{ url('admin/layer/layer.js') }}"></script>

    <style>
        #carnum{
            display: inline-block;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;

        }
    </style>
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
            <li class="active"><a href="#record0" data-toggle="tab">洗车订单</a></li>
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
                  	 <input type="date" name="hj_wan_time">
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
                            <th>订单流水编号</th>
                            <th>手机号</th>
                            <th>车牌号</th>
                            <th>服务项目</th>
                            <th>金额</th>
                            <th>支付状态</th>
                            <th>订单状态</th>
                            <th>支付方式</th>
                            <th>服务点</th>
                            <th>订单日期</th>
                            <th>操作</th>
                            <th>编辑</th>
                            <th>查看订单</th>
                        </tr>
                        @foreach($car as $v)
                        <tr>
                            <td>
                                <p>{{ $v['id'] }}</p>
                            </td>
                            <td>
                                <p>{{ $v['hj_number'] }}</p>
                            </td>
                            <td>
                                <p>{{ $v['hj_water_order_number'] }}</p>
                            </td>
                            <td>
                                <p class="blueText">@if($v['hj_phone']) {{ $v['hj_phone'] }} @else {{ $v['order_hj_phone'] }} @endif</p>
                            </td>
                            <td>
                                <a title="{{ $v['hj_car_number'] }}" id="carnum">{{ $v['hj_car_number'] }}</a>
                            </td>
                            <td>
                                <p>{{ $v['pname'] }}</p>
                            </td>
                            <td>
                                <p>{{ $v['hj_price_present'] }}</p>
                            </td>
                            <!--订单状态-->
                            <td>
                                <p>@if($v['hj_status'] == 'success') 成功 @elseif($v['hj_status'] == 'fail') 失败 @elseif($v['hj_status'] == 'refund') 申请退款 @elseif($v['hj_status'] == 'overrefund') 已退款 @else 未付款 @endif</p>
                            </td>
                            <td>
                                <p>
                                    @if($v['hj_is_success'] == 'no' && $v['hj_is_take'] == 'no')
                                        未接单
                                    @elseif($v['hj_is_success'] == 'no' && $v['hj_is_take'] == 'ing')
                                        接单中
                                    @elseif($v['hj_is_success'] == 'yes' && $v['hj_is_take'] == 'yes')
                                        订单完成
                                    @endif
                                </p>
                            </td>
                            <!--支付方式-->
                            <td>
                                <p>@if($v['hj_mode'] == 1) 微信支付 @elseif($v['hj_mode'] == 2) 支付宝支付 @else 现金支付 @endif</p>
                            </td>
                            <!--服务点-->
                            <td>
                                <p class="blueText">{{ $v['sname'] }}</p>
                            </td>
                            <td>
                                <p class="blueText">{{ date('Y-m-d H:i:s', $v['hj_end_time']) }}</p>
                            </td>
                            <!--操作管理 $v['hj_status'] == 'success' || -->
                            <td>
                                @if( $v['hj_status'] == 'refund' && $v['hj_is_take'] == 'no' && $v['hj_is_success'] == 'no')
                                    <p class="delete">
                                        <a href="javascript:;" onclick="tui({{ $v['hj_water_order_number'] }})">退款</a>
                                    </p>
                                @endif
                            </td>
                            <td>
                                @if($v['hj_status'] == 'success' && $v['hj_is_take'] == 'no')
                                    <p class="delete" onclick="order_status('{{ $v['id'] }}','{{ $v['hj_is_take'] }}')">接单</p>
                                    @elseif($v['hj_status'] == 'success' && $v['hj_is_take'] == 'ing')
                                    <p class="delete" onclick="order_status('{{ $v['id'] }}','{{ $v['hj_is_take'] }}')">完成</p>
                                @endif
                            </td>
                            <td>
                                <p class="delete">
                                    <a href="{{ url('admin/order/detail/'.$v['id']) }}" >查看订单</a>
                                </p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                </div>
            </div>
            <div>{{ $car->appends(['hj_phone' => $phone, 'hj_number' => $number, 'hj_name' => $name, 'hj_is_take' => $status, 'hj_car_number' => $car_number]) }}</div>
            <a style="color: #000;" href="{{ url('admin/order/car/export?hj_phone='.$phone.'&hj_number='.$number.'&hj_name='.$name.'&hj_is_take='.$status.'&hj_car_number='.$car_number) }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
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

<script>
    function tui(id){
        layer.confirm('请确认是否退款,如是卡券兑换,卡券次数直接回退到用户账号', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.ajax(
                {
                    url:"{{ url('/admin/order/goodupdate') }}/"+id,
                    type:'post',
                    data:{"_token":"{{ csrf_token() }}"},
                    success:function(data){
                        if(data.status == 'ing'){
                            layer.msg('接单中不能退款');
                            setTimeout("location.href = location.href;",1000);
                        } else if(data.status == 'yes'){

                            layer.msg('订单完成不能退款');
                            setTimeout("location.href = location.href;",1000);

                        }else if(data.status == 'fail1'){

                            layer.msg('员工端下的支付订单不能退款');
                            setTimeout("location.href = location.href;",1000);

                        }else if(data.status == 'fail'){

							layer.msg('退款失败');
							setTimeout("location.href = location.href;",1000);

						} else if(data.status == 'pass'){

							layer.msg('退款成功');
							setTimeout("location.href = location.href;",1000);

						}
					},
                    dataType:'json'
                }
            );
        });


    }
</script>

<script>
    function order_status(id,hj_is_take){

        var formData = new FormData();
        formData.append('hj_is_take',hj_is_take);
        formData.append('id',id);
        formData.append('_token',"{{ csrf_token() }}");

        $.ajax({
            type: "POST",
            url: "{{ url('admin/order/car_status') }}",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 1) {
                    layer.msg('修改成功');
                    setTimeout(function(){window.location.reload();},1000);
                } else {
                    layer.msg('修改失败');
                    setTimeout(function(){window.location.reload();},1000);
                }
            }
        });
    }
</script>

@stop