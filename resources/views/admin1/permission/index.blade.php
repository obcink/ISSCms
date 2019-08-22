@extends('admin/head')
@section('content')

    <style>
        .nav-tabs form input{
            margin-left: 20px;
            padding-left: 10px;
        }
    </style>

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

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

    <section id="hiddenDiv26" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li class="active "><a href="#jobrec" data-toggle="tab">权限列表</a></li>
            <li><a href="#pljobnum" data-toggle="tab">添加权限</a></li>
            {{--<li style="margin-left: 200px;">--}}
                {{--<form action="{{ url('admin/staff/index') }}" method="get">--}}
                    {{--<input type="text" name="hj_phone" placeholder="请输入电话">--}}
                    {{--<input type="text" name="hj_number" placeholder="请输入工号">--}}
                    {{--<input type="text" name="hj_name" placeholder="请输入站点名称">--}}
                    {{--<input style="padding: 0 10px;" type="submit" value="查询">--}}
                {{--</form>--}}
            {{--</li>--}}
            {{--<li style="float: right;"><a onclick="abc()" href="{{ url('admin/staff/upload') }}"><input style="position: absolute; width: 75px; opacity: 0;" type="file" name="file_upload">导入信息</a></li>--}}
            {{--<li style="float: right;"><a href="{{ url('admin/staff/download') }}">下载模板</a></li>--}}
        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="jobrec">
                <!--员工信息-->
                <div class="allShow2">
                    <table class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>权限名称</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $v)
                        <tr>
                            <!--姓名-->
                            <td>
                                {{ $v['id'] }}
                            </td>
                            <!--工号-->
                            <td>
                                {{ $v['hj_name'] }}
                            </td>
                            <!--操作-->
                            <td>
                                <p class="delete"><a href="{{ url('admin/permission/update/'.$v['id']) }}">编辑</a></p>
                                <p class="delete"><a href="{{ url('admin/permission/del/'.$v['id']) }}">删除</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>{{ $data->links() }}</div>
                </div>
            </div>
            <!--添加新员工-->
            <div class="tab-pane fade" id="pljobnum">
                <div class="allShow2">
                    <form action="{{ url('admin/permission/add') }}" method="post">
                        <ul class="information">
                            <!--添加新员工-->
                            <li>
                                <ul class="informationList">
                                    <!--姓名-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">权限名称：</p>
                                        <input class="goodsInput" id="epyg1" name="hj_name" type="text" placeholder="">
                                    </li>
                                    <!--工号-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">权限描述：</p>
                                        <input style="width: 600px;" class="goodsInput" id="epyg2" name="hj_desc" type="text" value="App\Http\Controllers\Admin\">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        {{ csrf_field() }}
                        <!--保存提交按钮-->
                        <div class="buttonDiv">
                            <input class="submitButton" type="submit" value="添加">
                        </div>
                    </form>
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
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        //$('.navListLi:last-child').css('height','50px');
    </script>

@stop