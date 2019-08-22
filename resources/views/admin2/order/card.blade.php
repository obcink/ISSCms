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
            <li class="active"><a href="#record2" data-toggle="tab">卡券订单</a></li>
            <li style="margin-left: 200px;">
                <form action="{{ url('admin/order/card') }}" method="get">
                    <input type="text" name="hj_number" placeholder="请输入订单编号">
                    <input type="text" name="hj_store_name" placeholder="请输入站点名称">
                    <select name="hj_status" id="">
                        <option value="">全部</option>
                        <option value="success">未发货</option>
                        <option value="overpay">已发货</option>
                        <option value="refund">申请退款</option>
                        <option value="overrefund">已退款</option>
                    </select>
                    <select name="hj_card_status" id="">
                        <option value="">全部</option>
                        <option value="1">卡券兑换</option>
                        <option value="2">购买卡券</option>
                    </select>
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fadein active" id="record2">
                <div class="allShow">
                    <table style="width: 100%;" class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>订单编号</th>
                            <th>订单流水编号</th>
                            <th>卡券使用次数</th>
                            <th>支付方式</th>
                            <th>订单状态</th>
                            <th>服务名称</th>
                            <th>商品名称</th>
                            <th>站点名称</th>
                            <th>订单日期</th>
                            <th>操作</th>
                        </tr>
                        @foreach($card as $v)
                            <tr>
                                <!--车牌号-->
                                <td>
                                    <p>{{ $v['id'] }}</p>
                                </td>
                                {{--<!--头像-->--}}
                                {{--<!--<td>--}}
                                    {{--<img class="userImg" src="images/userImg.jpg" alt="">--}}
                                {{--</td>-->--}}
                                {{--<!--手机号-->--}}
                                {{--<td>--}}
                                    {{--<p class="blueText">{{ $v['hj_phone'] }}</p>--}}
                                {{--</td>--}}
                                <!--订单编号-->
                                <td>
                                    <p>{{ $v['hj_number'] }}</p>
                                </td>
                                <td>
                                    <p>{{ $v['hj_water_order_number'] }}</p>
                                </td>
                                <td>
                                    <p>{{ $v['hj_num_coupon'] }}</p>
                                </td>
                                <!--支付方式-->
                                <td>
                                    <p>@if($v['hj_card_status'] == 1) 卡券兑换 @elseif($v['hj_card_status'] == 2) 购买卡券 @endif</p>
                                </td>
                                <td>
                                    <p style="background: @if($v['hj_status'] == 'success') #3f4349 @elseif($v['hj_status'] == 'overpay') orange @else #ccc @endif;line-height: 28px;height: 28px;width: 63px; color: #fff;" onclick="status('{{ $v['hj_status'] }}','{{ $v['id'] }}','{{ $v['hj_card_status'] }}')" >@if($v['hj_status'] == 'success' && $v['hj_card_status'] == 1) 未发货 @elseif($v['hj_status'] == 'success' && $v['hj_card_status'] == 2) 成功 @elseif($v['hj_status'] == 'fail') 失败 @elseif($v['hj_status'] == 'refund') 申请退款 @elseif($v['hj_status'] == 'overrefund') 已退款 @elseif($v['hj_status'] == 'overpay') 已发货  @else 未支付 @endif</p>
                                </td>
                                <td>
                                    <p class="blueText">{{ $v['pname'] }}</p>
                                </td>
                                <td>
                                    <p class="blueText">{{ $v['gname'] }}</p>
                                </td>
                                <td>
                                    <p class="blueText">{{ $v['store_name']?$v['store_name']:'总店' }}</p>
                                </td>
                                <td>
                                    <p>{{ date('Y-m-d H:i:s', $v['hj_end_time']) }}</p>
                                </td>
                                <!--操作管理-->
                                <td>
                                    @if(!empty($v['pname']) && $v['hj_status'] == 'success' && $v['hj_is_take'] == 'no' && $v['hj_is_success'] == 'no')
                                        <p class="delete">
                                            <a href="javascript:;" onclick="tui({{ $v['hj_water_order_number'] }})">
                                                退款
                                            </a>
                                        </p>
                                        @elseif(!empty($v['gname']) && $v['hj_status'] || $v['hj_status'] == 'overpay')
                                        <p class="delete">
                                            <a href="javascript:;" onclick="tui({{ $v['hj_water_order_number'] }})">
                                                退款
                                            </a>
                                        </p>
                                    @endif
                                {{--<p class="delete">删除</p>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody></table>
                </div>
            </div>
            <div>{{ $card->appends(['hj_number' => $number, 'hj_status' => $status, 'hj_card_status' => $card_status, 'hj_store_name' => $name]) }}</div>
            <a style="color: #000;" href="{{ url('admin/order/card/export?hj_number='.$number.'&hj_status='.$status.'&hj_card_status='.$card_status.'&hj_store_name='.$name) }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
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
    function status(status,id,card_status) {

        if (card_status == 2) {

            layer.msg('购买卡券不用发货');
            return false;

        }
        layer.msg('请稍等...');
        var formData = new FormData();
        formData.append('hj_type',status);
        formData.append('id',id);
        formData.append('_token',"{{ csrf_token() }}");
//        console.log(formData);
        $.ajax({
            type: "POST",
            url: "{{ url('admin/order/status') }}",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 1) {
                    layer.msg('发货成功,请确认是否真实发货');
                    setTimeout(function(){window.location.reload();},2000);
                } else {
                    layer.msg('订单已完成,不能发货');
                }
            }
        });

    }
</script>

@stop