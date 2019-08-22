
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
            <li class="active"><a data-toggle="tab">修改专属用户</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plexcus">
            <div class="allShow2">
                <form action="{{ url('admin/only/update/'.$data['id']) }}" method="post">
                    <ul class="information">
                        <!--添加专属客户-->
                        <li>
                            <ul class="informationList">
                                <!--姓名-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">联系人姓名：</p>
                                    <input class="goodsInput" id="ecs1" name="hj_contact_name" value="{{ $data['hj_contact_name'] }}" type="text" placeholder="">
                                </li>
                                <!--手机号-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">联系人电话：</p>
                                    <input class="goodsInput" id="ecs2" name="hj_contact_phone" value="{{ $data['hj_contact_phone'] }}" type="text" placeholder="">
                                </li>
                            </ul>
                        </li>
                    </ul>
                {{ csrf_field() }}
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
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop