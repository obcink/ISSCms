
@extends('admin/head')
@section('content')
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

    <section id="hiddenDiv26">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li><a href="{{ url('admin/only/index') }}">返回上一页</a></li>
            <li class="active"><a data-toggle="tab">修改选择站点</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plexcus">
            <div class="allShow2">
                <form action="{{ url('admin/only/check/'.$id) }}" method="post">
                    <ul class="information">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $id }}" />
                        <!--添加专属客户-->
                        <li>
                            <ul class="informationList">
                                <!--姓名-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">站点列表</p>
                                    <select name="hj_siteid">
                                    @foreach($store as $v)
                                        <option value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
                                    @endforeach
                                    </select>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <!--保存提交按钮-->
                    <div class="buttonDiv">
                        <input class="submitButton" type="submit" value="修改">
                    </div>
                </form>
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
    <script language="javascript" src="{{ url('admin/js/PCASClass.js') }}"></script>
    {{--<script>--}}
        {{--new PCAS("hj_sheng","hj_shi","hj_xian","{{ $store['hj_sheng'] }}","{{ $store['hj_shi'] }}","{{ $store['hj_xian'] }}");--}}
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