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
            <li class="active"><a href="#record0" data-toggle="tab">车辆管理</a></li>
            <li><a href="#outlet1" data-toggle="tab">添加车辆</a></li>
            <li style="margin-left: 100px;">
                <form action="{{ url('admin/car/index') }}" method="get">
                    <input type="text" name="hj_phone" placeholder="请输入电话">
                    <input type="text" name="hj_name" placeholder="请输入汽车品牌">
                    <input type="text" name="hj_number" placeholder="请输入车牌号">
                    <input type="text" name="hj_color" placeholder="请输入颜色">
                    <input type="text" name="hj_safe_name" placeholder="请输入保险信息">
                    {{--车险到期时间 <input type="date" name="hj_end_time">--}}
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
                            <th>用户名称</th>
                            <th>手机号</th>
                            <th>汽车品牌</th>
                            <th>车牌号</th>
                            <th>颜色</th>
                            <th>车险信息</th>
                            <th>车险到期时间</th>
                            <th>添加时间</th>
                            <th>车辆图片</th>
                            <th>操作管理</th>
                        </tr>
                        @foreach($data as $v)
                        <tr>
                            <!--车牌号-->
                            <td>
                                <p>{{ $v['id'] }}</p>
                            </td>
                            <td>
                                <p>{{ $v['uname'] }}</p>
                            </td>
                            <!--手机号-->
                            <td>
                                <p class="blueText">{{ $v['hj_phone'] }}</p>
                            </td>
                            <!--订单编号-->
                            <td>
                                <p>{{ $v['hj_name'] }}</p>
                            </td>
                            <!--订单状态-->
                            <td>
                                <p>{{ $v['hj_number'] }}</p>
                            </td>
                            <!--服务项目-->
                            <td>
                                <p>{{ $v['hj_color'] }}</p>
                            </td>
                            <!--订单日期-->
                            <td>
                                <p>{{ $v['hj_safe_name'] }}</p>
                            </td>
                            <!--支付方式-->
                            <td>
                                <p>{{ date('Y-m-d', $v['hj_end_time']) }}</p>
                            </td>
                            <td>
                                <p>{{date('Y-m-d H:i:s', $v['hj_create_time']) }}</p>
                            </td>
                            <td>
                                <p><img width="100px;" height="28px" onclick="show('{{ $v['hj_pic'] }}')" src="{{ $v['hj_pic'] }}" alt=""></p>
                            </td>
                            <td>
                                <p class="delete"><a href="{{ url('admin/car/update/'.$v['id']) }}">编辑</a></p>
                                <p class="delete"><a href="{{ url('admin/car/del/'.$v['id']) }}">删除</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $data->appends(['hj_phone' => $phone, 'hj_number' => $number, 'hj_name' => $name, 'hj_safe_name' => $safe_name, 'hj_color' => $color]) }}</div>
                    <a style="color: #000;" href="{{ url('admin/car/export?hj_phone='.$phone.'&hj_number='.$number.'&hj_name='.$name.'&hj_safe_name='.$safe_name.'&hj_color='.$color) }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
                </div>
            </div>
            <div class="tab-pane fade" id="outlet1">
                <div class="allShow2">
                    <form action="{{ url('admin/car/add') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--产品信息-->

                            <li>
                                <ul class="informationList">
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">用户手机号：</p>
                                        <input class="goodsInput" id="goodsInput1" name="hj_phone" type="text" placeholder="请输入用户手机号">
                                    </li>
                                    <li>
                                        <p class="informationTitle">商品属性</p>
                                        <div class="attribute">
                                            <ul class="attributeList" id="attributeList">

                                                <li style="width: 420px;">
                                                    <span class="tigDiv"></span>
                                                    <p class="goodsTextTitle">选择车辆品牌：</p>
                                                    <select name="p1"></select>
                                                    <select name="c1"></select>
                                                </li>
                                                <li>
                                                    <span class="tigDiv"></span>
                                                    <p class="attributeName">车牌号：</p>
                                                    <input type="text" id="goodsInput4" name="hj_number" class="attributeInput attributeInput1" value="" placeholder="0">
                                                </li>
                                                <li>
                                                    <span class="tigDiv"></span>
                                                    <p class="attributeName attributeInput2">颜色：</p>
                                                    <input type="text" id="goodsInput8" name="hj_color" placeholder="0" class="attributeInput" value="">
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!--所属门店-->
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">车险信息：</p>
                                        <input type="text" name="hj_safe_name" value="">
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">车险到期时间：</p>
                                        <input type="date" name="hj_end_time" value="">
                                    </li>
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">车辆照片：<span class="tigText">上传1张图片，建议大小：不超过200KB。</span></p>
                                        <div class="goodsImgDiv" id="aaa0">
                                            <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                            <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                            <input type="hidden" name="hj_pic" id="goods_thumb0" value="">
                                        </div>
                                    </li>
                        </ul>
                        <!--保存提交按钮-->
                        <div class="buttonDiv">
                            <input class="submitButton" type="submit" value="保存提交">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </aside>
</div>
<script type="text/javascript">
    function abc(index) {
        $("input[data = 'data"+index+"']").change(function () {
            uploadImage(index);
        });
    };
    function uploadImage(id) {
        // 判断是否有选择上传文件
        var imgPath = $("input[data = 'data"+id+"']").val();
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
        formData.append('file_upload',$("input[data = 'data"+id+"']")[0].files[0]);
        formData.append('_token',"{{ csrf_token() }}");
//        console.log(formData);
        $.ajax({
            type: "POST",
            url: "{{ url('/admin/goods/upload') }}",
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
    $('.navListLi:nth-child(2)').css('height','50px');
    $('.navListLi:nth-child(3)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>
<script language="javascript" src="{{ url('admin/js/car.js') }}"></script>
<script language="javascript">

    new PCAS("p1","c1","A","奥迪-A3");

</script>
@stop