@extends('admin/head')
@section('content')

    <style>
        .nav-tabs form input{
            margin-left: 20px;
            padding-left: 10px;
        }
    </style>
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

    <section id="hiddenDiv26" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li class="active "><a href="#jobrec" data-toggle="tab">员工信息</a></li>
            <li><a href="#pljobnum" data-toggle="tab">添加新员工</a></li>
            <li style="margin-left: 200px;">
                <form action="{{ url('admin/staff/index') }}" method="get">
                    <input type="text" name="hj_phone" placeholder="请输入电话">
                    <input type="text" name="hj_number" placeholder="请输入工号">
                    <input type="text" name="hj_name" placeholder="请输入站点名称">
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
            <li style="float: right;"><a onclick="abc()" href="{{ url('admin/staff/upload') }}"><input style="position: absolute; width: 75px; opacity: 0;" type="file" name="file_upload">导入信息</a></li>
            <li style="float: right;"><a href="{{ url('admin/staff/download') }}">下载模板</a></li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="jobrec">
                <!--员工信息-->
                <div class="allShow2">
                    <table class="showTable">
                        <tbody><tr>
                          	<th>用户id</th>
                            <th>用户名</th>
                            <th>工号</th>
                            <th>联系电话</th>
                            <th>所属站点</th>
                            <th>添加日期</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $v)
                        <tr>
                          	<td>
                                {{ $v['id'] }}
                            </td>
                            <!--姓名-->
                            <td>
                                {{ $v['hj_name'] }}
                            </td>
                            <!--工号-->
                            <td>
                                {{ $v['hj_number'] }}
                            </td>
                            <td>
                                {{ $v['hj_phone'] }}
                            </td>
                            <!--所属站点-->
                            <td>
                                {{ $v['alias_name'] }} _ {{ $v['sname'] }}
                            </td>
                            <!--添加日期-->
                            <td>
                                {{ date('Y/m/d H:i:s', $v['hj_time']) }}
                            </td>
                            <!--操作-->
                            <td>
                                <p class="delete"><a href="{{ url('admin/staff/update/'.$v['id']) }}">编辑</a></p>
                                <p class="delete"><a href="{{ url('admin/staff/del/'.$v['id']) }}">离职</a></p>
                                <p class="delete"><a href="javascript:;" onclick="reset({{ $v['id'] }})">重置密码</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>{{ $data->appends(['hj_phone' => $phone, 'hj_number' => $number, 'hj_name' => $name]) }}</div>
                    <a style="color: #000;" href="{{ url('admin/staff/export?hj_phone='.$phone.'&hj_number='.$number.'&hj_name='.$name) }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
                </div>
            </div>
            <!--添加新员工-->
            <div class="tab-pane fade" id="pljobnum">
                <div class="allShow2">
                    <form action="{{ url('admin/staff/add') }}" method="post">
                        <ul class="information">
                            <!--添加新员工-->
                            <li>
                                <ul class="informationList">
                                    <!--姓名-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">姓名：</p>
                                        <input class="goodsInput" id="epyg1" name="hj_name" type="text" placeholder="">
                                    </li>
                                    <!--工号-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">工号：</p>
                                        <input class="goodsInput" id="epyg2" name="hj_number" type="text" placeholder="">
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">手机号：</p>
                                        <input class="goodsInput" id="epyg2" name="hj_phone" type="text" placeholder="">
                                    </li>
                                    <!--密码-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">密码：</p>
                                        <input class="goodsInput" id="epyg3" name="hj_password" type="password" placeholder="">
                                    </li>
                                    <!--所属站点-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">所属站点：</p>
                                        <select name="hj_siteid" class="link" id="coatChose4">
                                            @foreach($store as $v)
                                                <option value="{{ $v['id'] }}">{{ $v['alias_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                  	<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">员工岗位：</p>
                                        <select name="str_id" class="link" id="coatChose5">
                                            @foreach($structure as $v)
                                                <option value="{{ $v['id'] }}">{{ $v['job'] }}</option>
                                            @endforeach
                                        </select>
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

        function reset(id) {
            setTimeout("layer.msg('重置中...')",0);
            var formData = new FormData();
            formData.append('id',id);
            formData.append('_token',"{{ csrf_token() }}");

            $.ajax({
                type: "POST",
                url: "{{ url('/admin/staff/reset') }}",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {

                    if (data == 1) {

                        setTimeout("layer.msg('重置成功,密码为000000')",1000);

                    } else if(data == 0) {

                        setTimeout("layer.msg('重置失败')",1000);

                    }

//                    setTimeout("location.href = location.href;",1500);
//                    setTimeout("layer.msg('导入成功')",1000);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });

        }

    </script>

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
            url: "{{ url('/admin/staff/upload') }}",
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