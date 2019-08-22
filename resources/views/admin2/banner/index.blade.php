@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

    <aside class="aside0" id="hiddenDiv3" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#outlet1" data-toggle="tab">首页轮播图添加</a></li>
            <li><a href="#outlet2" data-toggle="tab">商品轮播图添加</a></li>
          	<li><a href="#outlet3" data-toggle="tab">快捷洗车轮播添加</a></li>
          	<li><a href="#outlet4" data-toggle="tab">会员榜贴横幅添加</a></li>
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
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--商品添加-->
            <div class="tab-pane fadein active" id="outlet1">
                <div class="allShow2">
                    <form action="{{ url('admin/banner/index') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
                                    <!--广告图-->
                                    <li>
                                        <p class="goodsTextTitle">轮播图：</p><span class="tigText">最多添加五张，建议大小：不超过750*300像素。</span></p>
                                        <div class="goodsImgDiv">
                                            <!--规格组列表-->
                                            <ul class="specificationsList" id="specificationsList">
                                                <li>
                                                    <!--删除按钮-->
                                                    <span class="delete2 hid" onclick="deleteBtn2(this)">×</span>
                                                    <!--规格图列表:规格分组名称、图片、规格-->
                                                    <ul class="goodsSpecificationsList" id="goodsSpecificationsList">
                                                        @foreach($pic as $k => $v)
                                                            <li class="guang" id="aaa{{ $k+1 }}">
                                                                <!--删除按钮-->
                                                                <span onclick="deleteBtn2(this)" class="delete2">×</span>
                                                                <!--点击上传图片-->
                                                                <input class="fileButton3" onclick="abc({{ $k+1 }})" style="position: absolute; z-index: 98;" name="file_upload" data="data{{ $k+1 }}" id="file_upload{{ $k+1 }}" type="file">
                                                                <input type="hidden" id="goods_thumb{{ $k+1 }}" name="hj_pic[]" value="{{ $v }}">
                                                                <img src="{{ $v }}" style="position: absolute; left: 5px; top: 5px; width: 80px; height: 80px;" alt="">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <!--添加广告图-->
                                                    <p class="addGoodsSpecifications" id="addButton">+</p>
                                                </li>
                                            </ul>
                                        </div>
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
            <div class="tab-pane fadein" id="outlet2">
                <div class="allShow2">
                    <form action="{{ url('admin/banner/goodsadd') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
                                    <!--广告图-->
                                    <li>
                                        <p class="goodsTextTitle">轮播图：</p><span class="tigText">最多添加五张，建议大小：不超过750*350像素。</span></p>
                                        <div class="goodsImgDiv">
                                            <!--规格组列表-->
                                            <ul class="specificationsList" id="specificationsList">
                                                <li>
                                                    <!--删除按钮-->
                                                    <span class="delete2 hid" onclick="deleteBtn2(this)">×</span>
                                                    <!--规格图列表:规格分组名称、图片、规格-->
                                                    <ul class="goodsSpecificationsList" id="goodsSpecificationsList">
                                                        @foreach($pic2 as $k => $v)
                                                            <li class="guang" id="aaa{{ $k+6 }}">
                                                                <!--删除按钮-->
                                                                <span onclick="deleteBtn2(this)" class="delete2">×</span>
                                                                <!--点击上传图片-->
                                                                <input class="fileButton3" onclick="bcd({{ $k+6 }})" style="position: absolute; z-index: 98;" name="file_upload" data="data{{ $k+6 }}" id="file_upload{{ $k+1 }}" type="file">
                                                                <input type="hidden" id="goods_thumb{{ $k+6 }}" name="hj_pic[]" value="{{ $v }}">
                                                                <img src="{{ $v }}" style="position: absolute; left: 5px; top: 5px; width: 80px; height: 80px;" alt="">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <!--添加广告图-->
                                                    <p class="addGoodsSpecifications" id="addButton">+</p>
                                                </li>
                                            </ul>
                                        </div>
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
			<div class="tab-pane fadein" id="outlet3">
                <div class="allShow2">
                    <form action="{{ url('admin/banner/kuaijieadd') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
                                    <!--广告图-->
                                    <li>
                                        <p class="goodsTextTitle">轮播图：</p><span class="tigText">最多添加五张，建议大小：不超过750*350像素。</span></p>
                                        <div class="goodsImgDiv">
                                            <!--规格组列表-->
                                            <ul class="specificationsList" id="specificationsList">
                                                <li>
                                                    <!--删除按钮-->
                                                    <span class="delete2 hid" onclick="deleteBtn2(this)">×</span>
                                                    <!--规格图列表:规格分组名称、图片、规格-->
                                                    <ul class="goodsSpecificationsList" id="goodsSpecificationsList">
                                                        @foreach($pic3 as $k => $v)
                                                            <li class="guang" id="aaa{{ $k+11 }}">
                                                                <!--删除按钮-->
                                                                <span onclick="deleteBtn2(this)" class="delete2">×</span>
                                                                <!--点击上传图片-->
                                                                <input class="fileButton3" onclick="bcd({{ $k+11 }})" style="position: absolute; z-index: 98;" name="file_upload" data="data{{ $k+11 }}" id="file_upload{{ $k+1 }}" type="file">
                                                                <input type="hidden" id="goods_thumb{{ $k+11 }}" name="hj_pic[]" value="{{ $v }}">
                                                                <img src="{{ $v }}" style="position: absolute; left: 5px; top: 5px; width: 80px; height: 80px;" alt="">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <!--添加广告图-->
                                                    <p class="addGoodsSpecifications" id="addButton">+</p>
                                                </li>
                                            </ul>
                                        </div>
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
			<div class="tab-pane fadein" id="outlet4">
                <div class="allShow2">
                    <form action="{{ url('admin/banner/bangtieadd') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
                                    <!--广告图-->
                                    <li>
                                        <p class="goodsTextTitle">轮播图：</p><span class="tigText">最多添加五张，建议大小：不超过640*960像素。</span></p>
                                        <div class="goodsImgDiv">
                                            <!--规格组列表-->
                                            <ul class="specificationsList" id="specificationsList">
                                                <li>
                                                    <!--删除按钮-->
                                                    <span class="delete2 hid" onclick="deleteBtn2(this)">×</span>
                                                    <!--规格图列表:规格分组名称、图片、规格-->
                                                    <ul class="goodsSpecificationsList" id="goodsSpecificationsList">
                                                        @foreach($pic4 as $k => $v)
                                                            <li class="guang" id="aaa{{ $k+6 }}">
                                                                <!--删除按钮-->
                                                                <span onclick="deleteBtn2(this)" class="delete2">×</span>
                                                                <!--点击上传图片-->
                                                                <input class="fileButton3" onclick="bcd({{ $k+6 }})" style="position: absolute; z-index: 98;" name="file_upload" data="data{{ $k+6 }}" id="file_upload{{ $k+1 }}" type="file">
                                                                <input type="hidden" id="goods_thumb{{ $k+6 }}" name="hj_pic[]" value="{{ $v }}">
                                                                <img src="{{ $v }}" style="position: absolute; left: 5px; top: 5px; width: 80px; height: 80px;" alt="">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <!--添加广告图-->
                                                    <p class="addGoodsSpecifications" id="addButton">+</p>
                                                </li>
                                            </ul>
                                        </div>
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
            url: "{{ url('/admin/banner/upload') }}",
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
<script type="text/javascript">
    function bcd(index) {
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
            url: "{{ url('/admin/banner/upload') }}",
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
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>

@stop