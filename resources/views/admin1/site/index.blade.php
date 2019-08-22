@extends('admin/head')
@section('content')


    <style>
        .nav-tabs form input{
            margin-left: 20px;
            padding-left: 10px;
        }
    </style>
<div class="addPages">


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
<!-------------------引入页面------------------->
    <!-------我的账号------->

    <section id="hiddenDiv27" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li class="active "><a href="#louser" data-toggle="tab">本站用户</a></li>
            <li><a href="#pllouser" data-toggle="tab">添加用户</a></li>
            <li style="margin-left: 200px;">
                <form action="{{ url('admin/site/index') }}" method="get">
                    <input type="text" name="hj_phone" placeholder="请输入手机号">
                    <input type="date" name="hj_time" placeholder="请输入注册时间">
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
			<li style="float: right;"><a onclick="abc()" href="{{ url('admin/site/upload') }}"><input style="position: absolute; width: 75px; opacity: 0;" type="file" name="file_upload">导入信息</a></li>
            <li style="float: right;"><a href="{{ url('admin/site/download') }}">下载模板</a></li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="louser">
                <!--本站用户-->
                <div class="allShow2">
                    <table class="showTable">
                        <tbody><tr>

                          	<th>ID</th>
                            <th>微信名称</th>
                            <th>手机号</th>
                            <th>头像</th>
                            <th>积分</th>
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
                            <!--车牌号-->
                            <td>
                                {{ $v['hj_phone'] }}
                            </td>

                            <!--卡券总数/剩余-->
                            <td>
                                <img width="50px;" src="{{ $v['hj_headimgurl'] }}" alt="">
                            </td>
                            <td>
                                {{ $v['hj_free_price'] }}
                            </td>
                            <!--注册时间-->
                            <td>
                                {{ date('Y/m/d H:i:s', $v['hj_time']) }}
                            </td>
                            <!--操作-->
                            <td>
                                <p class="delete"><a href="{{ url('admin/site/update/'.$v['id']) }}">编辑</a></p>
                                <p class="delete"><a href="{{ url('admin/site/del/'.$v['id']) }}">停用</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $data->appends(['hj_phone' => $phone, 'hj_time' => $time]) }}</div>
                    <a style="color: #000;" href="{{ url('admin/site/export?hj_phone='.$phone.'&hj_time='.$time) }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
                </div>
            </div>
            <!--添加用户-->
            <div class="tab-pane fade" id="pllouser">
                <div class="allShow2">
                    <form action="{{ url('admin/site/add') }}" method="post">
                        <ul class="information">
                            <!--添加用户-->
                            <li>
                                <ul class="informationList">
                                    <!--姓名-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">姓名：</p>
                                        <input class="goodsInput" id="lour1" name="hj_username" type="text" placeholder="">
                                    </li>
                                    <!--手机号-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">手机号：</p>
                                        <input class="goodsInput" id="lour2" name="hj_phone" type="text" placeholder="">
                                    </li>
                                    <!--车牌号-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">车牌号：</p>
                                        <input class="goodsInput" id="lour3" name="hj_carnum" type="text" placeholder="多个车牌号可用逗号隔开">
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
                url: "{{ url('/admin/site/reset') }}",
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
            url: "{{ url('/admin/site/upload') }}",
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
        $('.navListLi:first-child').css('height','50px');
      	//$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
    </script>

@stop