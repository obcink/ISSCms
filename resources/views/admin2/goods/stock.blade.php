
@extends('admin/head')
@section('content')
    <style>
        .informationList li{
            line-height:40px;
        }
        .goodsInput{
            height: 40px;
            !important;
        }
    </style>

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
    <section id="hiddenDiv26">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li><a href="{{ url('admin/goods/index') }}">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改库存</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/goods/stock/'.$data['id']) }}" method="post">
                    {{ csrf_field() }}
                    <ul class="information">
                        <!--产品信息-->
                        <li>
                            <ul class="informationList">
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">商品名称：</p>
                                    <input class="goodsInput" id="goodsInput1" readonly value="{{ $data['hj_name'] }}" name="hj_name" type="text" placeholder="请输入产品名称">
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">商品编码：</p>
                                    <input class="goodsInput"  id="goodsInput1" readonly value="{{ $data['hj_goods_number'] }}" name="hj_goods_number" type="text" placeholder="请输入产品名称">
                                </li>
                                <!--产品属性-->
                                <li>
                                    <div class="attribute">
                                        <ul class="attributeList" id="attributeList">
                                            商品所属门店：
                                            @foreach($store as $v)
                                                @if($v['id'] == $data['hj_store_id']) <input type="hidden" name="hj_store_id" value="{{ $v['id'] }}"> @endif
                                            @endforeach
                                            <select name="hj_store_id" disabled class="link" id="coatChose">
                                                @foreach($store as $v)
                                                    <option @if($v['id'] == $data['hj_store_id']) selected @endif value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">商品分类：</p>
                                        @foreach($cate as $v)
                                            @if($v['id'] == $data['hj_cate_id']) <input type="hidden" name="hj_cate_id" value="{{ $v['id'] }}"> @endif
                                        @endforeach
                                    <select name="hj_cate_id" disabled class="link" id="coatChose">
                                        @foreach($cate as $v)
                                            <option @if($v['id'] == $data['hj_cate_id']) selected @endif value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <div class="attribute">
                                        <ul class="attributeList" id="attributeList">
                                            <li>
                                                <span class="tigDiv"></span>
                                                <p class="attributeName attributeInput2">现有库存：</p>
                                                <input type="text" id="goodsInput8" name="hj_stock" value="{{ $data['hj_stock']?$data['hj_stock']:0 }}" placeholder="0" class="attributeInput" value="">
                                                <p class="attributeIcon">件</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="attribute">
                                        <ul class="attributeList" id="attributeList">
                                            <li>
                                                <span class="tigDiv"></span>
                                                <p class="attributeName attributeInput2">添加库存：</p>
                                                <input type="text" id="goodsInput8" name="hj_addstock" value="" placeholder="0" class="attributeInput" value="">
                                                <p class="attributeIcon">件</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">发放人：</p>
                                    <input class="goodsInput" id="goodsInput1" name="hj_setname" type="text" placeholder="请输入发放人姓名">
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">接收人：</p>
                                    <input class="goodsInput" id="goodsInput1" name="hj_getname" type="text" placeholder="请输入接收人姓名">
                                </li>
                    </ul>
                    <!--保存提交按钮-->
                    <div class="buttonDiv">
                        <input class="submitButton" type="submit" value="修改提交">
                    </div>
                </form>
            </div>
        </div>
        </section>
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
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop