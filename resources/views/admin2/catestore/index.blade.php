@extends('admin/head')
@section('content')


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

    <aside class="aside0" id="hiddenDiv8" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab" class="nav nav-tabs">
            <li><a href="#spsp0" data-toggle="tab">门店分类</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--添加分类-->
            <div class="tab-pane fade in active" id="spsp0">

                    <div class="show">
                        <!--添加分类-->
                        <form action="{{ url('admin/catestore/add') }}" method="post">
                            <div class="rightDiv">
                                <p class="rightTitle">添加门店分类</p>
                                {{ csrf_field() }}
                                <div class="rightText">
                                    <p class="textTitle">分类名称：</p>
                                    <input class="textInput" id="doorClass" name="hj_name" type="text" placeholder="请填写分类名称">
                                </div>
                                <input type="submit" class="submit" id="addDoor" value="添加">
                            </div>
                        </form>
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
                                            <p class="delete"><a href="{{ url('admin/catestore/update/'.$v['id']) }}">编辑</a></p>
                                            <p class="delete"><a href="{{ url('admin/catestore/del/'.$v['id']) }}">删除</a></p>
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
<script language="javascript" src="{{ url('admin/js/PCASClass.js') }}"></script>
<script>
    new PCAS("hj_sheng","hj_shi","hj_xian","吉林省","吉林市","龙潭区");
</script>
<script>
    $('.navListLi:nth-child(2)').css('height','50px');
    $('.navListLi:nth-child(3)').css('height','50px');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>

@stop