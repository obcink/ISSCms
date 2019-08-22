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


    <section id="hiddenDiv24" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li class="active "><a href="#cadrc" data-toggle="tab">核销记录</a></li>
            <li style="margin-left: 200px;">
            <form action="{{ url('admin/card/recode') }}" method="get">
                {{--<input type="text" name="hj_phone" placeholder="请输入电话">--}}
                <input type="text" name="card_number" placeholder="请输入卡号">
                <input type="text" name="card_name" placeholder="请输入卡名称">
                <input type="text" name="store_name" placeholder="请输入站点名称">
                <input type="text" name="phone" placeholder="请输入手机号">
                <input style="padding: 0 10px;" type="submit" value="查询">
            </form>
            </li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
                <div class="tab-pane fade in active" id="cadrc1">
                    <div class="allShow2">
                        <div class="allShow2">
                            <table class="showTable">
                                <tbody><tr>
                                    <th>序号</th>
                                  	<th>车牌号</th>
                                    <th>用户名</th>
                                    <th>手机号</th>
                                    <th>卡名称</th>
                                    <th>卡号</th>
                                    <th>站点名称</th>
                                  	<th>员工</th>
                                    <th>电话</th>
                                    <th>时间</th>
                                  	<th>车牌照片</th>
                                    {{--<th>操作</th>--}}
                                </tr>
                                @foreach($recode as $v)
                                    <tr>
                                        {{--<!--名称-->--}}
                                        <td>
                                            {{ $v['id'] }}
                                        </td>
                                      	 <td>
                                            {{ $v['hj_car_number'] }}
                                        </td>
                                        <td>
                                            {{ $v['hj_username'] }}
                                        </td>
                                        <!--服务项目-->
                                        <td>
                                            {{ $v['hj_phone'] }}
                                        </td>
                                        <td>
                                            {{ $v['card_name'] }}
                                        </td>
                                        <td>
                                            {{ $v['hj_card_number'] }}
                                        </td>
                                        <td>
                                            {{ $v['store_name'] }}
                                        </td>
                                       <td>
                                            {{ $v['username'] }}   —   {{ $v['uname'] }}
                                        </td>
                                        <!--服务项目-->
                                        <td>
                                            {{ $v['phone'] }}
                                        </td>
                                        <!--有效期-->
                                        <td>
                                            {{ date('Y-m-d H:i:s', $v['hj_time']) }}
                                        </td>
                                      	<td>
                                            <img id="show" onclick="show('{{ $v['hj_taking_photos'] }}')" width="50px;" height="20px;" src="{{ $v['hj_taking_photos'] }}" alt="">
                                        </td>
                                        <!--操作-->
                                        {{--<td>--}}
                                            {{--<p class="delete"><a href="{{ url('store/card/update/'.$v['id']) }}">编辑</a></p>--}}
                                            {{--<p class="delete"><a href="{{ url('store/card/del/'.$v['id']) }}">删除</a></p>--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach
                                </tbody></table>
                            <div>{{ $recode->appends(['phone' => $phone, 'card_number' => $card_number, 'card_name' => $card_name, 'store_name' => $store_name]) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $('.navListLi:first-child').css('height','50px');
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	//$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
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