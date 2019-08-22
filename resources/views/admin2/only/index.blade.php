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

    <section id="hiddenDiv28" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li class="active "><a href="#excus" data-toggle="tab">专属客户列表</a></li>
            <li><a href="{{ url('admin/only/new') }}">专属审核管理</a></li>
            <li><a href="#plexcus" data-toggle="tab">添加个人专属客户</a></li>
            <li><a href="#plexcus2" data-toggle="tab">添加公司专属客户</a></li>
            <li><a href="#plexcus1" data-toggle="tab">专属说明</a></li>
            <li style="margin-left: 200px;">
                <form action="{{ url('admin/only/index') }}" method="get">
                    <input type="text" name="hj_username" placeholder="请输入用户名">
                    <input type="text" name="hj_phone" placeholder="请输入手机号">
                    {{--<select name="hj_status" id="">--}}
                        {{--<option value="">全部</option>--}}
                        {{--<option value="0">个人</option>--}}
                        {{--<option value="1">公司</option>--}}
                    {{--</select>--}}
                    <input type="date" name="hj_time">
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="excus">
                <!--专属客户列表-->
                <div class="allShow2">
                    <table style="width: 100%;" class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>联系人姓名</th>
                            <th>用户类型</th>
                            <th>公司名称</th>
                            <th>工商注册号</th>
                            <th>身份证号</th>
                            {{--<th>站点名称</th>--}}
                            <th>联系手机号</th>
                            {{--<th>地址</th>--}}
                            {{--<th>营业时间</th>--}}
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
                                {{ $v['hj_contact_name'] }}
                            </td>
                            <td>
                                @if(!empty($v['hj_registration_number'])) 公司 @else 个人  @endif
                            </td>
                            <td>
                                {{ $v['hj_company'] }}
                            </td>
                            <td>
                                {{ $v['hj_registration_number'] }}
                            </td>
                            <td>
                                {{ $v['hj_idnumber'] }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $v['hj_name'] }}--}}
                            {{--</td>--}}
                            <!--余额-->
                            <td>
                                {{ $v['hj_contact_phone'] }}
                            </td>

                            <td>
                                {{ date('Y/m/d H:i:s', $v['hj_time']) }}
                            </td>
                            <!--操作-->
                            <td>
                                <p class="delete"><a href="{{ url('admin/only/update/'.$v['id']) }}">编辑</a></p>
                                <p class="delete"><a href="{{ url('admin/only/del/'.$v['id']) }}">删除</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $data->appends(['hj_phone' => $phone, 'hj_username' => $username, 'hj_time' => $time]) }}</div>
                    <a style="color: #000;" href="{{ url('admin/only/export?hj_phone='.$phone.'&hj_time='.$time.'&hj_username='.$username) }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
                </div>
            </div>
            <!--添加专属客户-->
            <div class="tab-pane fade" id="plexcus">
                <div class="allShow2">
                    <form action="{{ url('admin/only/add') }}" method="post">
                        <ul class="information">
                            <!--添加专属客户-->
                            <li>
                                <ul class="informationList">
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">联系人姓名：</p>
                                        <input class="goodsInput" id="ecs1" name="hj_contact_name" type="text" placeholder="">
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">联系人电话：</p>
                                        <input class="goodsInput" id="ecs2" name="hj_contact_phone" type="text" placeholder="">
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">身份证号：</p>
                                        <input class="goodsInput" id="ecs2" name="hj_idnumber" type="text" placeholder="">
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
            <div class="tab-pane fade" id="plexcus2">
                <div class="allShow2">
                    <form action="{{ url('admin/only/add') }}" method="post">
                        <ul class="information">
                            <!--添加专属客户-->
                            <li>
                                <ul class="informationList">
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">联系人姓名：</p>
                                        <input class="goodsInput" id="ecs1" name="hj_contact_name" type="text" placeholder="">
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">联系人电话：</p>
                                        <input class="goodsInput" id="ecs2" name="hj_contact_phone" type="text" placeholder="">
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">公司名称：</p>
                                        <input class="goodsInput" id="ecs2" name="hj_company" type="text" placeholder="">
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">工商注册号：</p>
                                        <input class="goodsInput" id="ecs2" name="hj_registration_number" type="text" placeholder="">
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
            <div class="tab-pane fade" id="plexcus1">
                <div class="allShow2">
                    <form action="{{ url('admin/only/add') }}" method="post">
                        <ul class="information">
                            <!--添加专属客户-->
                            <li>
                                <ul class="informationList">
                                    <!--姓名-->
                                    <li style="height:200px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">文字说明：</p>
                                        <textarea name="hj_meta" id="" cols="80" rows="8">{{ $config['hj_meta'] }}</textarea>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        </li>
                        </ul>
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function abc(index) {
        $("#file_upload"+index).change(function () {
            uploadImage(index);
        });
    };
    function uploadImage(id) {
        // 判断是否有选择上传文件
        var imgPath = $("#file_upload"+id).val();
        if (imgPath == "") {
            alert("请选择上传图片！");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'bmp') {
            alert("请选择图片文件");
            return;
        }
        var formData = new FormData();
        formData.append('file_upload',$('#file_upload'+id)[0].files[0]);
        formData.append('_token',"{{ csrf_token() }}");
//        console.log(formData);
        $.ajax({
            type: "POST",
            url: "{{ url('/admin/store/upload') }}",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#goods_thumb'+id).val(data);
                $('#aaa'+id).append('<img style="position: absolute; left: 5px; top: 5px; width: 80px; height: 80px;" src="'+ data +'"/>');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }
</script>
<script type="text/javascript">
    $("textarea").blur(function() {
        var formData = new FormData();
        formData.append('value', $(this).val());
        formData.append('name', $(this).attr('name'));
        formData.append('_token',"{{ csrf_token() }}");
        $.ajax({
            type: "POST",
            url: "/admin/only/text",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $(this).attr('value', data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });

    });
</script>

<script language="javascript" src="{{ url('admin/js/PCASClass.js') }}"></script>
<script>
    new PCAS("hj_sheng","hj_shi","hj_xian","吉林省","吉林市","龙潭区");
</script>
<script>
    $('.navListLi:nth-child(2)').css('height','50px');
    $('.navListLi:nth-child(3)').css('height','');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>


@stop
