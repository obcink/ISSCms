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
    <style>
        #carnum{
            display: inline-block;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;

        }
    </style>

    <section id="hiddenDiv29" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li class="active "><a href="#bigct" data-toggle="tab">大客户列表</a></li>
            <!--li><a href="#spsp0" data-toggle="tab">车辆编码</a></li-->
          	<li><a href="{{ url('admin/clist/index') }}">车辆编码</a></li>
            <li><a href="#plbigct" data-toggle="tab">添加大客户</a></li>
            <li style="margin-left: 200px;">
                <form action="{{ url('admin/big/index') }}" method="get">
                    <input type="text" name="hj_username" placeholder="请输入用户名">
                    <input type="text" name="hj_carnum" placeholder="请输入车牌号">
                    <select name="hj_cate_id" id="">
                        <option value="">全部</option>
                        @foreach($cate as $v)
                            <option value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
                        @endforeach
                    </select>
                    <input type="date" name="hj_time">
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
            <li style="float: right;"><a onclick="abc()" href="javascript:;"><input style="position: absolute; width: 75px; opacity: 0;" type="file" name="file_upload">导入信息</a></li>
            <li style="float: right;"><a href="{{ url('admin/big/download') }}">下载模板</a></li>
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
                            <th>单位</th>
                            <th>车牌号</th>
                            <th>手机号</th>
                            <th>赠送余额剩余</th>
                            <th>下单次数</th>
                            <th>卡券总数/剩余</th>
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
                                {{ $v['dname'] }}
                            </td>
                            <!--车牌号-->
                            <td style="width: 250px;">
                                <a id="carnum" href="javascript:;" title="{{ $v['hj_carnum'] }}">{{ $v['hj_carnum'] }}</a>
                            </td>
                            <td style="width: 250px;">
                                {{ $v['hj_phone'] }}
                            </td>
                            
                            <!--赠送余额剩余-->
                            <td>
                              {{ $v['hj_free_price']?$v['hj_free_price']:0 }}
                            </td>
                         	<td>
                                {{ $v['hj_order_num'] }}次
                            </td>
                            <!--卡券总数/剩余-->
                            <td>
                               {{ $v['hj_card_num'] }}/{{ $v['hj_card_rem'] }}
                            </td>
                            <!--注册时间-->
                            <td>
                                {{ date('Y/m/d H:i:s', $v['hj_time']) }}
                            </td>
                            <!--操作-->
                            <td>
                                <p class="delete"><a href="{{ url('admin/big/update/'.$v['id']) }}">编辑</a></p>
                                <p class="delete"><a href="{{ url('admin/big/del/'.$v['id']) }}">删除</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $data->appends(['hj_carnum' => $carnum, 'hj_username' => $username, 'hj_cate_id' => $cate_id, 'hj_time' => $time]) }}</div>
                    <a style="color: #000;" href="{{ url('admin/big/export?hj_carnum='.$carnum.'&hj_time='.$time.'&hj_username='.$username.'&hj_cate_id='.$cate_id) }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
                </div>
            </div>
          
            <div class="tab-pane fade" id="spsp0">

                <div class="show">
                    <!--添加分类-->
                        <div class="rightDiv">
                            <p class="rightTitle">添加单位分类</p>
                            {{ csrf_field() }}
                            <div class="rightText">
                                <p class="textTitle">分类名称：</p>
                                <input class="textInput" id="doorClass" name="hj_name" type="text" placeholder="请填写分类名称">
                            </div>
                            <input type="submit" onclick="bcd()" class="submit" id="addDoor" value="添加">
                        </div>
                    <!--分类展示部分-->
                    <div class="leftDiv">
                        <!--分类展示列表-->
                        <p class="title">已添加分类</p>
                        <ul class="classList" id="menClass">
                            <!--分类名称与操作-->
                            <li>
                                @foreach($cate as $v)
                                    <div class="classModifyDiv">
                                        <p class="className">{{ $v['hj_name'] }}</p>
                                        <div class="modify2">
                                            <p class="delete"><a href="{{ url('admin/catebig/update/'.$v['id']) }}">编辑</a></p>
                                            <p class="delete"><a href="{{ url('admin/catebig/del/'.$v['id']) }}">删除</a></p>
                                        </div>
                                    </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--添加大客户-->
            <div class="tab-pane fade" id="plbigct">
                <div class="allShow2">
                    <form action="{{ url('admin/big/add') }}" method="post">
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
                                    <!--车牌号-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">车牌号：</p>
                                        <input class="goodsInput" id="clt3" name="hj_carnum" type="text" placeholder="多个车牌号可用逗号隔开">
                                    </li>
                                    <!--大客户单位-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">大客户单位：</p>
                                        <select name="hj_cate_id" id="">
                                            @foreach($cate as $v)
                                                <option value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
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
            url: "{{ url('/admin/big/upload') }}",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                layer.msg(data);
//                setTimeout("layer.msg(data)",1000);
                setTimeout("location.href = location.href;",1500);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }
</script>
<script>
    function bcd() {

        var formData = new FormData();
        formData.append('hj_name',$("#doorClass").val());
        formData.append('_token',"{{ csrf_token() }}");
//        console.log(formData);
        $.ajax({
            type: "POST",
            url: "{{ url('/admin/catebig/add') }}",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                layer.msg(data.msg, {icon: 1});
                var t=setTimeout("location.href = location.href;",500);
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