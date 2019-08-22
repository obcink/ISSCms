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
            <li><a href="{{ url('admin/car/index') }}">返回上一页</a></li>
            <li class="active"><a href="#record0" data-toggle="tab">车辆修改</a></li>
            {{--<li><a href="#outlet1" data-toggle="tab">添加车辆</a></li>--}}
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fadein active" id="record0">
                <div class="allShow2">
                    <form action="{{ url('admin/car/update/'.$data['id']) }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--产品信息-->

                            <li>
                                <ul class="informationList">
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">用户名称：</p>
                                        <input class="goodsInput" id="goodsInput1" disabled value="{{ $data['hj_phone'] }}" name="hj_phone" type="text" placeholder="请输入用户名称">
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
                                                    <input type="text" id="goodsInput4" name="hj_number" class="attributeInput attributeInput1" value="{{ $data['hj_number'] }}" placeholder="0">
                                                </li>
                                                <li>
                                                    <span class="tigDiv"></span>
                                                    <p class="attributeName attributeInput2">颜色：</p>
                                                    <input type="text" id="goodsInput8" name="hj_color" placeholder="0" class="attributeInput" value="{{ $data['hj_color'] }}">
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!--所属门店-->
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">车险信息：</p>
                                        <input type="text" name="hj_safe_name" value="{{ $data['hj_safe_name'] }}">
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">车险到期时间：</p>
                                        <input type="hidden" name="hj_time" value="{{ $data['hj_end_time'] }}">
                                        <input type="date" name="hj_end_time" value="">
                                    </li>
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">车辆照片：<span class="tigText">上传1张图片，建议大小：不超过200KB。</span></p>
                                        <div class="goodsImgDiv" id="aaa0">
                                            <img class="picture2" src="{{ $data['hj_pic'] }}" alt="">
                                            <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                            <input type="hidden" name="hj_pic" id="goods_thumb0" value="{{ $data['hj_pic'] }}">
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
    $('.navListLi:first-child').css('height','50px');
      	//$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
</script>
<script language="javascript" src="{{ url('admin/js/car.js') }}"></script>
<script language="javascript">

    new PCAS("p1","c1","{{ $data['p1'] }}","{{ $data['c1'] }}");

</script>
@stop