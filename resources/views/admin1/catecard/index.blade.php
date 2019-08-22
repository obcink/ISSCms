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

    <aside class="aside0" id="hiddenDiv3" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#outlet0" data-toggle="tab">卡券分类</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--门店分类-->
            <div class="tab-pane fade in active" id="outlet0">
                    <div class="show">
                        <!--添加分类-->
                        <form action="{{ url('admin/catecard/add') }}" method="post">
                            {{ csrf_field() }}
                        <div style="height: 276px;" class="rightDiv">

                            <p class="rightTitle">添加卡券分类</p>
                            <li>
                                <span class="tigDiv"></span>
                                <p class="goodsTextTitle">分类名称：</p>
                                <input class="textInput" id="goodsClass" name="hj_name" type="text" placeholder="请填写分类名称">
                            </li>


                            {{--<div class="rightText">--}}
                                {{--<p class="textTitle">分类名称：</p>--}}
                                {{--<input class="textInput" id="goodsClass" name="hj_name" type="text" placeholder="请填写分类名称">--}}
                            {{--</div>--}}
                            <li>
                                <span class="tigDiv"></span>
                                <p class="goodsTextTitle">封面图：<span class="tigText">上传1张图片，建议大小：400*400像素。</span></p>
                                <div class="goodsImgDiv" id="aaa0">
                                    <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                    <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                    <input type="hidden" name="hj_bgimg" id="goods_thumb0" value="">
                                </div>
                            </li>
                            <input type="submit" class="submit" id="addButton2" value="添加">
                        </div>
                        </form>
                        <!--分类展示部分-->
                        <div class="leftDiv">
                            <!--分类展示列表-->
                            <p class="title">已添加分类</p>
                            <ul class="classList" id="classList2">
                                <!--分类名称与操作-->
                                <li>
                                    @foreach($cate as $v)
                                    <div class="classModifyDiv">
                                        <p class="className">{{ $v['hj_name'] }}</p>
                                        <div class="modify2">
                                            <p class="delete"><a href="{{ url('admin/catecard/update/'.$v['id']) }}">编辑</a></p>
                                            <p class="delete"><a href="{{ url('admin/catecard/del/'.$v['id']) }}">删除</a></p>
                                        </div>
                                    </div>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
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
            url: "{{ url('/admin/catecard/upload') }}",
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
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	//$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
</script>
@stop