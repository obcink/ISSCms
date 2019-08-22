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

    <section id="hiddenDiv29" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li class="active "><a href="#bigct" data-toggle="tab">单位分类</a></li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">

            <div class="tab-pane fade in active" id="spsp0">

                <div class="show">
                    <!--添加分类-->
                        <div class="rightDiv">
                            <form action="{{ url('admin/catebig/add') }}" method="post">
                                <p class="rightTitle">添加单位分类</p>
                                {{ csrf_field() }}
                                <div class="rightText">
                                    <p class="textTitle">分类名称：</p>
                                    <input class="textInput" id="doorClass" name="hj_name" type="text" placeholder="请填写分类名称">
                                </div>
                                <input type="submit" class="submit" id="addDoor" value="添加">
                            </form>
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
        </div>
    </section>
</div>
{{--<script type="text/javascript">--}}
    {{--function abc() {--}}
        {{--$("input[name = 'file_upload']").change(function () {--}}
            {{--uploadImage();--}}
        {{--});--}}
    {{--};--}}
    {{--function uploadImage() {--}}
        {{--// 判断是否有选择上传文件--}}
        {{--var imgPath = $("input[name = 'file_upload']").val();--}}
        {{--if (imgPath == "") {--}}
            {{--alert("请选择上传文件！");--}}
            {{--return;--}}
        {{--}--}}
        {{--//判断上传文件的后缀名--}}
        {{--var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);--}}
        {{--if (strExtension != 'xls' && strExtension != 'xlsx') {--}}
            {{--alert("请选择excel文件");--}}
            {{--return;--}}
        {{--}--}}
        {{--var formData = new FormData();--}}
        {{--formData.append('file_upload',$("input[name = 'file_upload")[0].files[0]);--}}
        {{--formData.append('_token',"{{ csrf_token() }}");--}}
{{--//        console.log(formData);--}}
        {{--$.ajax({--}}
            {{--type: "POST",--}}
            {{--url: "{{ url('/admin/big/upload') }}",--}}
            {{--data: formData,--}}
            {{--async: true,--}}
            {{--cache: false,--}}
            {{--contentType: false,--}}
            {{--processData: false,--}}
            {{--success: function(data) {--}}
                {{--setTimeout("location.href = location.href;",1500);--}}
                {{--setTimeout("layer.msg('导入成功')",1000);--}}
            {{--},--}}
            {{--error: function(XMLHttpRequest, textStatus, errorThrown) {--}}
                {{--alert("上传失败，请检查网络后重试");--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
{{--</script>--}}
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