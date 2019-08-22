
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
            <li><a href="{{ url('admin/goods/index') }}">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">添加组合套餐</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/goods/group/'.$id) }}" method="post">
                    {{ csrf_field() }}
                    <ul class="information">
                        <!--产品信息-->
                        <li>
                            <ul class="informationList">
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">套餐名称：</p>
                                    <input class="goodsInput" id="goodsInput1" name="hj_name" type="text" placeholder="请输入产品名称">
                                </li>
                                <!--选择分类-->
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">要组合的商品：</p>
                                    <select name="hj_good_secondid" class="link" id="coatChose">
                                        @foreach($data as $v)
                                            <option value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                {{--<li>--}}
                                    {{--<span class="tigDiv"></span>--}}
                                    {{--<p class="goodsTextTitle">商品编码：</p>--}}
                                    {{--<input class="goodsInput" id="goodsInput1" value="{{ $data['hj_goods_number'] }}" name="hj_goods_number" type="text" placeholder="请输入产品名称">--}}
                                {{--</li>--}}
                                {{--<!--规格-->--}}
                                {{--<!--封面图-->--}}
                                {{--<li>--}}
                                    {{--<span class="tigDiv"></span>--}}
                                    {{--<p class="goodsTextTitle">封面图：<span class="tigText">上传1张图片，建议大小：400*400像素。</span></p>--}}
                                    {{--<div class="goodsImgDiv" id="aaa0">--}}
                                        {{--<img class="picture2" src="{{ $data['hj_facepic'] }}" alt="">--}}
                                        {{--<input class="fileButton2" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">--}}
                                        {{--<input type="hidden" name="hj_facepic" id="goods_thumb0" value="{{ $data['hj_facepic'] }}">--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<!--广告图-->--}}
                                {{--<li>--}}
                                    {{--<p class="goodsTextTitle">广告图：</p><span class="tigText">最多添加五张，建议大小：400*400像素。</span><p></p>--}}
                                    {{--<div class="goodsImgDiv">--}}
                                        {{--<!--规格组列表-->--}}
                                        {{--<ul class="specificationsList" id="specificationsList">--}}
                                            {{--<li>--}}
                                                {{--<!--删除按钮-->--}}
                                                {{--<span class="delete2" onclick="deleteBtn2(this)">×</span>--}}
                                                {{--<!--规格图列表:规格分组名称、图片、规格-->--}}
                                                {{--<ul class="goodsSpecificationsList" id="goodsSpecificationsList">--}}
                                                    {{--@foreach($pic as $k => $v)--}}
                                                    {{--<li class="guang" id="aaa{{ $k+1 }}">--}}
                                                        {{--<!--删除按钮-->--}}
                                                        {{--<span onclick="deleteBtn2(this)" class="delete2">×</span>--}}
                                                        {{--<!--点击上传图片-->--}}
                                                        {{--<input class="fileButton3" onclick="abc({{ $k+1 }})" style="position: absolute; z-index: 98;" name="file_upload" data="data{{ $k+1 }}" id="file_upload{{ $k+1 }}" type="file">--}}
                                                        {{--<input type="hidden" id="goods_thumb{{ $k+1 }}" name="hj_pic[]" value="{{ $v }}">--}}
                                                        {{--<img src="{{ $v }}" style="position: absolute; left: 5px; top: 5px; width: 80px; height: 80px;" alt="">--}}
                                                    {{--</li>--}}
                                                    {{--@endforeach--}}
                                                {{--</ul>--}}
                                                {{--<!--添加广告图-->--}}
                                                {{--<p class="addGoodsSpecifications" id="addButton">+</p>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<!--产品属性-->--}}
                        {{--<li>--}}
                            {{--<p class="informationTitle">商品属性</p>--}}
                            {{--<div class="attribute">--}}
                                {{--<ul class="attributeList" id="attributeList">--}}
                                    {{--<li>--}}
                                        {{--<span class="tigDiv"></span>--}}
                                        {{--<p class="attributeName">商品原价：</p>--}}
                                        {{--<input type="text" id="goodsInput3" name="hj_price" value="{{ $data['hj_price'] }}" class="attributeInput attributeInput1" value="" placeholder="0">--}}
                                        {{--<p class="attributeIcon">元</p>--}}
                                    {{--</li>--}}
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="attributeName">商品价格：</p>
                                        <input type="text" id="goodsInput4" name="hj_price" class="attributeInput attributeInput1" value="" placeholder="0">
                                        <p class="attributeIcon">元</p>
                                    </li>
                                    {{--<li>--}}
                                        {{--<span class="tigDiv"></span>--}}
                                        {{--<p class="attributeName attributeInput2">商品库存：</p>--}}
                                        {{--<input type="text" id="goodsInput8" name="hj_stock" placeholder="0" class="attributeInput" value="">--}}
                                        {{--<p class="attributeIcon">件</p>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<!--商品所属门店-->--}}
                        {{--<li>--}}
                            {{--<div class="attribute">--}}
                                {{--<ul class="attributeList" id="attributeList">--}}
                                    {{--商品所属门店&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                                    {{--<select name="hj_store_id" class="link" id="coatChose">--}}
                                        {{--@foreach($store as $v)--}}
                                            {{--<option @if($v['id'] == $data['hj_store_id']) selected @endif value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<!--商品详情-->--}}
                        {{--<li>--}}
                            {{--<p class="informationTitle">产品详情</p>--}}
                            {{--<div class="goodsPictures">--}}
                                {{--<p class="goodsTextTitle">添加图片：<span class="tigText">注：最多只能添加十张，建议大小不超过200KB。</span></p>--}}
                                {{--<div class="addGoodsBannerDiv">--}}
                                    {{--<ul class="goodsBanner" id="goodsDetailsList">--}}
                                        {{--@foreach($content as $k => $v)--}}
                                        {{--<li class="ten" id="aaa{{ $k+6 }}">--}}
                                            {{--<span class="tigDiv"></span>--}}
                                            {{--<!--删除按钮-->--}}
                                            {{--<span class="delete2" onclick="deleteBtn2(this)">×</span>--}}
                                            {{--<!--点击上传图片-->--}}
                                            {{--<input class="fileButton2" style="position: absolute; z-index: 98;" data="data{{ $k+6 }}" onclick="abc({{ $k+6 }})" name="file_upload" id="file_upload{{ $k }}" type="file">--}}
                                            {{--<input type="hidden" id="goods_thumb{{ $k+6 }}" name="hj_content[]" value="{{ $v }}">--}}
                                            {{--<img src="{{ $v }}" style="position: absolute; left: 5px; top: 5px; width: 80px; height: 80px;" alt="">--}}
                                        {{--</li>--}}
                                         {{--@endforeach--}}
                                    {{--</ul>--}}
                                    {{--<p class="addGoodsDetails" id="addGoodsDetails">+</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<!--所属门店-->--}}
                        {{--<li>--}}
                            {{--<span class="tigDiv"></span>--}}
                            {{--<p class="goodsTextTitle">使用卡券需要消耗几次：</p>--}}
                            {{--<input type="text" name="hj_group" value="{{ $data['hj_group'] }}">--}}
                            {{--<input type="checkbox" name="hj_group[]" value="2">&nbsp;卡券兑换商品&nbsp;&nbsp;--}}
                            {{--<input type="checkbox" name="hj_group[]" value="3">&nbsp;积分兑换商品&nbsp;&nbsp;<br>--}}
                        {{--</li>--}}
                        {{--<!--选择分类-->--}}
                        {{--<li>--}}
                            {{--<span class="tigDiv"></span>--}}
                            {{--<p class="goodsTextTitle">所需卡券：</p>--}}
                            {{--<select name="hj_coil" class="link" id="washCard">--}}
                                {{--@foreach($catecard as $v)--}}
                                    {{--<option @if($data['hj_coil'] == $v['id']) selected @endif value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</li>--}}
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
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop