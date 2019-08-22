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
        <ul style="margin-bottom: 30px;" class="nav nav-tabs">
            <li class="active"><a href="#record0" data-toggle="tab">操作记录</a></li>
            <li style="margin-left: 100px;">
                <form action="{{ url('admin/operation/index') }}" method="get">
                    开始时间：<input type="date" name="hj_start_time">
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--洗车订单-->
            <div class="tab-pane fadein active" id="record0">
                <div class="allShow">
                    <table class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>描述</th>
                            <th>ip</th>
                            <th>时间</th>
                            <th>操作管理</th>
                        </tr>
                        @foreach($data as $v)
                        <tr>
                            <!--车牌号-->
                            <td>
                                <p>{{ $v['id'] }}</p>
                            </td>
                            <td>
                                <p>{{ $v['hj_name'] }}</p>
                            </td>
                            <!--手机号-->
                            <td>
                                <p class="blueText">{{ $v['hj_ip'] }}</p>
                            </td>
                            <!--订单编号-->
                            <td>
                                <p>{{ date('Y-m-d H:i:s',$v['hj_time']) }}</p>
                            </td>
                            <!--订单状态-->
                            <td>
                                <p class="delete"><a href="{{ url('admin/operation/del/'.$v['id']) }}">删除</a></p
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $data->appends(['hj_start_time' => $start_time]) }}</div>
                </div>
            </div>
        </div>
    </aside>
</div>

<script>
    function show(url) {

        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            area: '100%,100%',
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: '<img src="'+url+'" alt=""/>'
        });

    }
</script>
<script>
    $('.navListLi:nth-child(2)').css('height','');
    $('.navListLi:nth-child(3)').css('height','50px');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>
@stop