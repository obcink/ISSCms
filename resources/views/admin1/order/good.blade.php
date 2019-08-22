@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

    <aside class="aside0" id="hiddenDiv10" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab3" class="nav nav-tabs">
            <li class="active"><a href="#record1" data-toggle="tab">商品订单</a></li>
            <li style="margin-left: 200px;">
                <form action="{{ url('admin/order/good') }}" method="get">
                    <input type="text" name="hj_phone" placeholder="请输入手机号">
                    <input type="text" name="hj_number" placeholder="请输入订单编号">
                    <input type="text" name="hj_name" placeholder="请输入站点">
                    <select name="hj_status" id="">
                        <option value="">全部</option>
                        <option value="success">成功</option>
                        <option value="unpay">未付款</option>
                        <option value="fail">失败</option>
                        <option value="refund">申请退款</option>
                        <option value="overrefund">已退款</option>
                    </select>
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
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
                            <th>订单流水编号</th>
                            <th>手机号</th>
                            <th>商品名称</th>
                            <th>金额</th>
                            <th>支付状态</th>
                            <th>订单状态</th>
                            <th>支付方式</th>
                            <th>服务点</th>
                            <th>订单日期</th>
                            {{--<th>备注</th>--}}
                            <th>操作</th>
                            <th>编辑</th>
                        </tr>
                        @foreach($good as $v)
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
                                <p>{{ $v['user_phone'] }}</p>
                            </td>
                            <td>
                                <p>{{ $v['gname'] }}</p>
                            </td>
                            <td>
                                <p>{{ $v['hj_price_present'] }}</p>
                            </td>
                            {{--<td>--}}
                                {{--<p>{{ $v['hj_refund'] }}</p>--}}
                            {{--</td>--}}
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
                            <td>
                                <p>@if($v['hj_mode'] == 1) 微信支付 @elseif($v['hj_mode'] == 2) 支付宝支付 @else 现金支付 @endif</p>
                            </td>
                            <td>
                                <p class="blueText">{{ $v['sname'] }}</p>
                            </td>
                            <td>
                                <p>{{ date('Y-m-d H:i:s', $v['hj_end_time']) }}</p>
                            </td>
                            {{--<td>--}}
                                {{--<p>{{ $v['hj_content'] }}</p>--}}
                            {{--</td>--}}
                            <td>
                            <p class="delete">
                                        <a href="{{ url('admin/order/show/'.$v['id']) }}">查看详情</a>
                                    </p><!--$v['hj_status'] == 'success' || $v['hj_status'] == 'refund' || -->
                                @if($v['status'] == 'overpay')
                                    <p class="delete">
                                        <a href="javascript:;" onclick="tui({{ $v['hj_water_order_number'] }})">退款</a>
                                    </p>
                                @endif
                                
                            </td>
                            <td>
                                @if($v['hj_is_take'] == 'no' && $v['hj_status'] == 'success')
                                    <p class="delete" onclick="goods_status('{{ $v['id'] }}','{{ $v['hj_is_take'] }}')">接单</p>
                                    @elseif($v['hj_is_take'] == 'ing' && $v['hj_status'] == 'success')
                                    <p class="delete" onclick="goods_status('{{ $v['id'] }}','{{ $v['hj_is_take'] }}')">完成</p>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                </div>
            </div>
            <div>{{ $good->appends(['hj_number' => $number, 'hj_name' => $name, 'hj_status' => $status, 'hj_phone' => $phone]) }}</div>
            <a style="color: #000;" href="{{ url('admin/order/good/export?hj_number='.$number.'&hj_name='.$name.'&hj_status='.$status.'&hj_phone='.$phone) }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
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
        layer.confirm('请确认您是否退款', {
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

						}else if(data.status == 'fail'){

							layer.msg('退款失败');
							setTimeout("location.href = location.href;",1000);

						} else if(data.status == 'fail1'){

                            layer.msg('员工端下的支付订单不能退款');
                            setTimeout("location.href = location.href;",1000);

                        }else if(data.status =='pass'){

							layer.msg('退款成功');
							setTimeout("location.href = location.href;",1000);

						}  else if(data.status =='meiyou'){

							layer.msg('积分不够，不能退款');
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
    function goods_status(id,hj_is_take){

        var formData = new FormData();
        formData.append('id',id);
        formData.append('hj_is_take',hj_is_take);
        formData.append('_token',"{{ csrf_token() }}");

        $.ajax({
            type: "POST",
            url: "{{ url('admin/order/goods_status') }}",
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