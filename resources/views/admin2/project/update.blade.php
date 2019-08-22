
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
            <li><a href="{{ url('admin/project/index') }}">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改项目</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/project/update/'.$data['id']) }}" method="post">
                    {{ csrf_field() }}
                    <ul class="information">
                        <!--产品信息-->
                        <li>
                            <ul class="informationList">
                                {{--<li style="height:50px;">--}}
                                    {{--<span class="tigDiv"></span>--}}
                                    {{--<p class="goodsTextTitle">门店分类：</p>--}}
                                    {{--<select name="hj_store_id" class="link" id="coatChose4">--}}
                                        {{--<option value="0">通用门店</option>--}}
                                        {{--@foreach($cate as $v)--}}
                                            {{--<option @if($data['hj_store_id'] == $v['id']) selected @endif value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</li>--}}
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">服务项目名称：</p>
                                    <input class="goodsInput" id="goodsInput1" name="hj_name" value="{{ $data['hj_name'] }}" type="text" placeholder="请输入服务项目名称">
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">服务项目价格：</p>
                                    <input class="goodsInput" id="goodsInput1" name="hj_price" value="{{ $data['hj_price'] }}" type="text" placeholder="请输入服务项目价格">
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">项目获得积分：</p>
                                    <input class="goodsInput" id="goodsInput1" name="hj_integral" value="{{ $data['hj_integral'] }}" type="text" placeholder="请输入要获得多少积分">
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">积分抵扣上限：</p>
                                    <input class="goodsInput" id="goodsInput1" name="hj_int_top" value="{{ $data['hj_int_top'] }}" type="text" placeholder="请输入抵扣上限">
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
    <script>
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop