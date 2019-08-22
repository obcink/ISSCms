
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
            <li>修改卡券分类</li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/catecard/update/'.$data['id']) }}" method="post">
                    {{ csrf_field() }}
                    <div style="height: 276px;" class="rightDiv">
                        <p class="rightTitle">修改卡券分类</p>
                        <div class="rightText">
                            <p class="textTitle">分类名称：</p>
                            <input class="textInput" id="goodsClass" value="{{ $data['hj_name'] }}" name="hj_name" type="text" placeholder="请填写分类名称">
                        </div>

                        <li>
                            <span class="tigDiv"></span>
                            <p class="goodsTextTitle">封面图：<span class="tigText">上传1张图片，建议大小：400*400像素。</span></p>
                            <div class="goodsImgDiv" id="aaa0">
                                <img class="picture2" src="{{ $data['hj_bgimg'] }}" alt="">
                                <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                <input type="hidden" name="hj_bgimg" id="goods_thumb0" value="{{ $data['hj_bgimg'] }}">
                            </div>
                        </li>

                        <input type="submit" class="submit" id="addButton2" value="修改">
                    </div>
                </form>
            </div>
        </div>
        </section>
    </div>
    <script>
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
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
@stop