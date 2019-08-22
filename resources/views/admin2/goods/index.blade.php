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
            <li class="active"><a href="#outlet2" data-toggle="tab">商品列表</a></li>
            <li><a href="#outlet1" data-toggle="tab">商品添加</a></li>
            <li><a href="#outlet3" data-toggle="tab">入库记录</a></li>
            <li><a href="#outlet4" data-toggle="tab">组合套餐列表</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--商品添加-->
            <div class="tab-pane fade" id="outlet1">
                <div class="allShow2">
                    <form action="{{ url('admin/goods/add') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">商品名称：</p>
                                        <input class="goodsInput" id="goodsInput1" name="hj_name" type="text" placeholder="请输入产品名称">
                                    </li>
                                    <!--选择分类-->
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">商品分类：</p>
                                        <select name="hj_cate_id" class="link" id="coatChose">
                                            @foreach($cate as $v)
                                            <option value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">商品编码：</p>
                                        <input class="goodsInput" id="goodsInput1" name="hj_goods_number" type="text" placeholder="请输入商品编码">
                                    </li>
                                    <!--规格-->
                                    <!--封面图-->
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">封面图：<span class="tigText">上传1张图片，建议大小：像素。150*167像素</span></p>
                                        <div class="goodsImgDiv" id="aaa0">
                                            <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                            <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                            <input type="hidden" name="hj_facepic" id="goods_thumb0" value="">
                                        </div>
                                    </li>
                                    <!--广告图-->
                                    <li>
                                        <p class="goodsTextTitle">广告图：</p><span class="tigText">最多添加五张，建议大小：750*400像素。</span></p>
                                        <div class="goodsImgDiv">
                                            <!--规格组列表-->
                                            <ul class="specificationsList" id="specificationsList">
                                                <li>
                                                    <!--删除按钮-->
                                                    <span class="delete2 hid" onclick="deleteBtn2(this)">×</span>
                                                    <!--规格图列表:规格分组名称、图片、规格-->
                                                    <ul class="goodsSpecificationsList" id="goodsSpecificationsList">
                                                        {{--<li class="guang" id="aaa0">--}}
                                                            {{--<!--删除按钮-->--}}
                                                            {{--<span class="delete2" style="display: none">×</span>--}}
                                                            {{--<!--图片-->--}}
                                                            {{--<img class="picture3" src="{{ url('admin/images/picture.jpg') }}" alt="">--}}
                                                            {{--<!--点击上传图片-->--}}
                                                            {{--<input class="fileButton3" onclick="abc(0)" type="file" id="file_upload0" name="file_upload0">--}}
                                                            {{--<input type="hidden" name="hj_pic" id="goods_thumb0" value="">--}}
                                                        {{--</li>--}}
                                                    </ul>
                                                    <!--添加广告图-->
                                                    <p class="addGoodsSpecifications" id="addButton">+</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--产品属性-->
                            <li>
                                <p class="informationTitle">商品属性</p>
                                <div class="attribute">
                                    <ul class="attributeList" id="attributeList">
                                        <li>
                                            <span class="tigDiv"></span>
                                            <p class="attributeName">商品原价：</p>
                                            <input type="text" id="goodsInput3" name="hj_price" class="attributeInput attributeInput1" value="" placeholder="0">
                                            <p class="attributeIcon">元</p>
                                        </li>
                                        <li>
                                            <span class="tigDiv"></span>
                                            <p class="attributeName">商品现价：</p>
                                            <input type="text" id="goodsInput4" name="hj_new_price" class="attributeInput attributeInput1" value="" placeholder="0">
                                            <p class="attributeIcon">元</p>
                                        </li>
                                        <li>
                                            <span class="tigDiv"></span>
                                            <p class="attributeName attributeInput2">商品库存：</p>
                                            <input type="text" id="goodsInput8" name="hj_stock" placeholder="0" class="attributeInput" value="">
                                            <p class="attributeIcon">件</p>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <p class="informationTitle">积分属性</p>
                                <div class="attribute">
                                    <ul class="attributeList" id="attributeList">
                                        <li>
                                            <span class="tigDiv"></span>
                                            <p class="attributeName">获得积分：</p>
                                            <input type="text" id="goodsInput3" name="hj_integral" class="attributeInput attributeInput1" value="" placeholder="0">
                                            <p class="attributeIcon">个</p>
                                        </li>
                                        <li>
                                            <span class="tigDiv"></span>
                                            <p class="attributeName">最多抵扣：</p>
                                            <input type="text" id="goodsInput4" name="hj_int_top" class="attributeInput attributeInput1" value="" placeholder="0">
                                            <p class="attributeIcon">元</p>
                                        </li>
                                        {{--<li>--}}
                                            {{--<span class="tigDiv"></span>--}}
                                            {{--<p class="attributeName attributeInput2">商品库存：</p>--}}
                                            {{--<input type="text" id="goodsInput8" name="hj_stock" placeholder="0" class="attributeInput" value="">--}}
                                            {{--<p class="attributeIcon">件</p>--}}
                                        {{--</li>--}}
                                    </ul>
                                </div>
                            </li>
                            <!--商品所属门店-->
                            <li>
                                <div class="attribute">
                                    <ul class="attributeList" id="attributeList">
                                        商品所属门店
                                        <li style="width: 90%;margin-left: 20px;">
                                            @foreach($store as $v)
                                                <span style="width: 170px;display: inline-block; margin-right: 10px;"><input type="checkbox" name="hj_store_id[]" value="{{ $v['id'] }}">{{ $v['hj_name'] }}</span>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--商品详情-->
                            <li>
                                <p class="informationTitle">产品详情</p>
                                <div class="goodsPictures">
                                    <p class="goodsTextTitle">添加图片：<span class="tigText">注：最多只能添加十张，建议大小不超过200KB。</span></p>
                                    <div class="addGoodsBannerDiv">
                                        <ul class="goodsBanner" id="goodsDetailsList">
                                            {{--<li class="ten" id="aaa3">--}}
                                                {{--<span class="tigDiv"></span>--}}
                                                {{--<!--删除按钮-->--}}
                                                {{--<span class="delete2 hid" onclick="deleteBtn2(this)">×</span>--}}
                                                {{--<!--点击上传图片-->--}}
                                                {{--<input class="fileButton2" onclick="abc(3)" name="file_upload" id="file_upload3" type="file">--}}
                                                {{--<input type="hidden" id="goods_thumb3" name="hj_content[]" value="">--}}
                                            {{--</li>--}}
                                        </ul>
                                        <p class="addGoodsDetails" id="addGoodsDetails">+</p>
                                    </div>
                                </div>
                            </li>
                            <!--所属门店-->
                            <li>
                                <span class="tigDiv"></span>
                                <p class="goodsTextTitle">使用卡券需要消耗几次：</p>
                                <input type="text" name="hj_group" value=""> <span class="tigText">注：值为-1不在兑换商城显示</span>
                                {{--<input type="checkbox" name="hj_group[]" value="2">&nbsp;卡券兑换商品&nbsp;&nbsp;--}}
                                {{--<input type="checkbox" name="hj_group[]" value="3">&nbsp;积分兑换商品&nbsp;&nbsp;<br>--}}
                            </li>
                            <!--选择分类-->
                            {{--<li>--}}
                                {{--<span class="tigDiv"></span>--}}
                                {{--<p class="goodsTextTitle">所需卡券：</p>--}}
                                {{--<select name="hj_coil" class="link" id="washCard">--}}
                                    {{--@foreach($catecard as $v)--}}
                                        {{--<option value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</li>--}}
                        </ul>
                        <!--保存提交按钮-->
                        <div class="buttonDiv">
                            <input class="submitButton" type="submit" value="保存提交">
                        </div>
                    </form>
                </div>
            </div>
            <!--商品列表-->
            <div class="tab-pane fadein active" id="outlet2">
                <div class="allShow2">
                    <table class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>商品编码</th>
                            <th>商品名称</th>
                            <th>分类</th>
                            <th>门店</th>
                            <th>价格</th>
                            <th>销量</th>
                            <th>库存</th>
                            {{--<th>属性</th>--}}
                            <th>操作</th>
                        </tr>
                        @foreach($goods as $v)
                        <tr>
                            <!--商品名称-->
                            <td>
                                {{ $v['id'] }}
                            </td>
                            <td style="width: 130px;">
                                {{ $v['hj_goods_number'] }}
                            </td>
                            <td style="width: 220px;">
                                {{ $v['hj_name'] }}
                            </td>
                            <!--商品名称-->
                            <td style="width: 125px">
                                {{ $v['hj_cate_name'] }}
                            </td>
                            <!--分类-->
                            <td>
                                {{ $v['hj_store_name'] }}
                            </td>
                            <!--价格-->
                            <td>
                                <!--<p>原价：¥<span class="blueText">999</span></p>-->
                                <!--<p>现价：¥<span class="blueText">999</span></p>-->
                                <div class="price">
                                    <p class="price">原价：¥ {{ $v['hj_price'] }}</p> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <p class="price">现价：¥ {{ $v['hj_new_price'] }}</p>
                                </div>
                            </td>
                            <td style="width: 80px;">
                                {{ $v['hj_sales']?$v['hj_sales']:0 }}
                            </td>
                            <td style="width: 80px;">
                                {{ $v['hj_stock'] }}
                            </td>
                            <!--操作-->
                            <td style="width: 330px;">
                                <p class="delete"><a href="{{ url('admin/goods/stock/'.$v['id']) }}">入库</a></p>
                                <p class="delete"><a href="{{ url('admin/goods/update/'.$v['id']) }}">编辑</a></p>
                                <p class="delete"><a href="{{ url('admin/goods/del/'.$v['id']) }}">删除</a></p>
                                <p class="delete"><a href="{{ url('admin/goods/group/'.$v['id']) }}">组合套餐</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $goods->links() }}</div>
                </div>
            </div>
            <div class="tab-pane fade" id="outlet3">
                <div class="allShow2">
                    <table class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>商品编码</th>
                            <th>商品名称</th>
                            <th>商品分类</th>
                            <th>门店名称</th>
                            <th>入库数量</th>
                            <th>接收人</th>
                            <th>发放人</th>
                            <th>入库时间</th>
                        </tr>
                        @foreach($record as $v)
                            <tr>
                                <!--商品名称-->
                                <td>
                                    {{ $v['id'] }}
                                </td>
                                <td style="width: 220px;">
                                    {{ $v['hj_goods_number'] }}
                                </td>
                                <td style="width: 220px;">
                                    {{ $v['hj_name'] }}
                                </td>
                                <!--商品名称-->
                                <td style="width: 125px">
                                    {{ $v['hj_cate_name'] }}
                                </td>
                                <!--分类-->
                                <td>
                                    {{ $v['hj_store_name'] }}
                                </td>
                                <!--价格-->
                                <td>
                                    {{ $v['hj_stock'] }}
                                </td>
                                <td style="width: 80px;">
                                    {{ $v['hj_getname'] }}
                                </td>
                                <td style="width: 80px;">
                                    {{ $v['hj_setname'] }}
                                </td>
                                <!--操作-->
                                <td style="width: 200px;">
                                    {{ date('Y-m-d', $v['hj_time']) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $goods->links() }}</div>
                </div>
            </div>
            <div class="tab-pane fade" id="outlet4">
                <div class="allShow2">
                    <table class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>套餐名称</th>
                            <th>套餐价格</th>
                            <th>1商品名称</th>
                            <th>2商品名称</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($group as $v)
                            <tr>
                                <!--商品名称-->
                                <td>
                                    {{ $v['id'] }}
                                </td>
                                <td style="width: 220px;">
                                    {{ $v['hj_name'] }}
                                </td>
                                <td style="width: 220px;">
                                    {{ $v['hj_price'] }}
                                </td>
                                <!--商品名称-->
                                <td style="width: 125px">
                                    {{ $v['hj_name1'] }}
                                </td>
                                <!--分类-->
                                <td>
                                    {{ $v['hj_name2'] }}
                                </td>
                                <!--操作-->
                                <td style="width: 200px;">
                                    {{ date('Y-m-d h:i:s', $v['hj_time']) }}
                                </td>
                                <td style="width: 330px;">
                                    <p class="delete"><a href="{{ url('admin/goods/groupupdate?gid='.$v['hj_good_firstid'].'&id='.$v['id']) }}">编辑</a></p>
                                    <p class="delete"><a href="{{ url('admin/goods/groupdel/'.$v['id']) }}">删除</a></p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $goods->links() }}</div>
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