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
            <li class="active"><a href="#icoterie_list" data-toggle="tab">服务项目列表</a></li>
            <li><a href="#icoterie_add" data-toggle="tab">服务项目添加</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            
            <!--商品列表-->
            <div class="tab-pane fade active in" id="icoterie_list">
                <div class="allShow2">
                    <table class="showTable">
                        <tbody>
                        <tr>
                          	<th>项目编号</th>
                            <th>服务项目名称</th>
                            <th>服务项目价格</th>
                            <th>获得积分(个)</th>
                            <th>积分上限(元)</th>
                            <th>操作</th>
                        </tr>
                        @foreach($project as $v)
                        <tr>
                          	<td>
                                {{ $v['id'] }}
                            </td>
                            <!--商品名称-->
                            <td>
                                {{ $v['project_name'] }}
                            </td>
                            <!--商品名称-->
                            <td>
                                {{ $v['project_price'] }}
                            </td>
                            <td>
                                {{ $v['integral_gift'] }}
                            </td>
                            <!--商品名称-->
                            <td>
                                {{ $v['integral_top'] }}
                            </td>
                            <!--操作-->
                            <td>
                                <p class="delete"><a href="{{ url('admin/project/update/'.$v['id']) }}">编辑</a></p>
                                <p class="delete"><a href="{{ url('admin/project/del/'.$v['id']) }}">删除</a></p>
                                <p class="delete"><a href="javascript:;" onclick="status({{ $v['id'] }})" >@if($v['hj_status'] == 1) 启用中 @else 禁用中 @endif</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $project->links() }}</div>
                </div>
            </div>
          
          	<!--商品添加-->
            <div class="tab-pane fade" id="icoterie_add">
                <div class="allShow2">
                    <form action="{{ url('admin/project/add') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">服务项目名称：</p>
                                        <input class="goodsInput" id="goodsInput1" name="project_name" type="text" placeholder="请输入服务项目名称">
                                    </li>
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">服务项目价格：</p>
                                        <input class="goodsInput" id="goodsInput1" name="project_price" type="text" placeholder="请输入服务项目价格">
                                      	<span>元</span>
                                    </li>
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">项目获得积分：</p>
                                        <input class="goodsInput" id="goodsInput1" name="integral_gift" type="text" placeholder="请输入要获得多少积分">
                                    </li>
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">积分抵扣上限：</p>
                                        <input class="goodsInput" id="goodsInput1" name="integral_top" type="text" placeholder="请输入抵扣上限">
                                        <span>元</span>
                                    </li>
                                </ul>
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
            url: "{{ url('/admin/project/upload') }}",
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
    function status(id){

        var formData = new FormData();
        formData.append('id',id);
        formData.append('_token',"{{ csrf_token() }}");
//        console.log(formData);
        $.ajax({
            type: "POST",
            url: "{{ url('/admin/project/status') }}",
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
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	//$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
</script>
@stop