@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

    @if (count($errors) > 0)
        @foreach($errors->all() as $error)
            <script>
                window.onload = function () {
                    layer.msg('{{ $error }}');
                }
            </script>
        @endforeach
    @endif
    @if (session('msg'))
        <script>
            window.onload = function () {
                layer.msg('{{ session('msg') }}');
            }
        </script>
    @endif

    <section id="hiddenDiv29" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li class="active "><a href="#bigct" data-toggle="tab">VIP列表</a></li>
            <li><a href="#plbigct" data-toggle="tab">添加VIP客户</a></li>
            <li style="margin-left: 200px;">
                <form action="{{ url('admin/vip/index') }}" method="get">
                    <input type="text" name="hj_phone" placeholder="请输入手机号">
                    <input type="text" name="hj_username" placeholder="请输入姓名">
                    {{--<input type="text" name="hj_name" placeholder="请输入站点名称">--}}
                    <input type="date" name="hj_time">
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
            <li style="float: right;"><a onclick="abc()" href="javascript:;"><input style="position: absolute; width: 75px; opacity: 0;" type="file" name="file_upload">导入信息</a></li>
            <li style="float: right;"><a href="{{ url('admin/vip/download') }}">下载模板</a></li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="bigct">
                <!--大客户列表-->
                <div class="allShow2">
                    <table class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>姓名</th>
                            <th>手机号</th>
                            {{--<th>站点名称</th>--}}
                            <th>注册时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $v)
                        <tr>
                            <!--序号-->
                            <td>
                                {{ $v['id'] }}
                            </td>
                            <!--姓名-->
                            <td>
                                {{ $v['hj_username'] }}
                            </td>
                            <!--单位-->
                            <td>
                                {{ $v['hj_phone'] }}
                            </td>

                            <!--注册时间-->
                            <td>
                                {{ date('Y/m/d H:i:s', $v['hj_time']) }}
                            </td>
                            <!--操作-->
                            <td>
                                <p class="delete"><a href="{{ url('admin/vip/update/'.$v['id']) }}">编辑</a></p>
                                <p class="delete"><a href="{{ url('admin/vip/del/'.$v['id']) }}">删除</a></p>
                                <p style="width: 100px;" class="delete"><a href="{{ url('admin/vip/look/'.$v['id']) }}">查看车牌号</a></p>
                              	<p style="width: 100px;" class="delete"><a href="https://zhi.xiaoxiongxiche.com/home/wx/vip/{{ $v['id'] }}">小程序码</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $data->appends(['hj_phone' => $phone, 'hj_username' => $username, 'hj_time' => $time]) }}</div>
                    <a style="color: #000;" href="{{ url('admin/vip/export?hj_phone='.$phone.'&hj_time='.$time.'&hj_username='.$username) }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
                </div>
            </div>
            <!--添加大客户-->
            <div class="tab-pane fade" id="plbigct">
                <div class="allShow2">
                    <form action="{{ url('admin/vip/add') }}" method="post">
                        <ul class="information">
                            <!--添加大客户-->
                            <li>
                                <ul class="informationList">
                                    <!--姓名-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">姓名：</p>
                                        <input class="goodsInput" id="clt1" name="hj_username" type="text" placeholder="">
                                    </li>
                                    <!--手机号-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">手机号：</p>
                                        <input class="goodsInput" id="clt2" name="hj_phone" type="text" placeholder="">
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">车牌号：</p>
                                        <input class="goodsInput" id="clt3" name="hj_carnum" type="text" placeholder="多个车牌号可用逗号隔开">
                                    </li>
                                    {{--<li style="height:50px;">--}}
                                        {{--<span class="tigDiv"></span>--}}
                                        {{--<p class="goodsTextTitle ddqq">所属站点：</p>--}}
                                        {{--<select name="hj_siteid" class="link" id="coatChose4">--}}
                                            {{--@foreach($store as $v)--}}
                                                {{--<option value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</li>--}}
                                    <!--大客户单位-->
                                    {{--<li style="height:50px;">--}}
                                        {{--<span class="tigDiv"></span>--}}
                                        {{--<p class="goodsTextTitle ddqq">大客户单位：</p>--}}
                                        {{--<input class="goodsInput" id="clt4" name="hj_company" type="text" placeholder="">--}}
                                    {{--</li>--}}
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
<script type="text/javascript">
    function abc() {
        $("input[name = 'file_upload']").change(function () {
            uploadImage();
        });
    };
    function uploadImage() {
        // 判断是否有选择上传文件
        var imgPath = $("input[name = 'file_upload']").val();
        if (imgPath == "") {
            alert("请选择上传文件！");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'xls' && strExtension != 'xlsx') {
            alert("请选择excel文件");
            return;
        }
        var formData = new FormData();
        formData.append('file_upload',$("input[name = 'file_upload")[0].files[0]);
        formData.append('_token',"{{ csrf_token() }}");
//        console.log(formData);
        $.ajax({
            type: "POST",
            url: "{{ url('/admin/vip/upload') }}",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                setTimeout("location.href = location.href;",1500);
                setTimeout("layer.msg('导入成功')",1000);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }
</script>
<script>
    $('.navListLi:nth-child(2)').css('height','50px');
    $('.navListLi:nth-child(3)').css('height','');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>
@stop