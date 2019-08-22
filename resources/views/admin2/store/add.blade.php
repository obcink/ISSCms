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

    <aside class="aside0" id="hiddenDiv8" style="display: block;">
        <!--横向导航栏-->
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#spsp1" data-toggle="tab">门店添加</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
            <!--门店分类-->
            <div class="tab-pane fade in active" id="spsp1">
                <div class="allShow2">
                    <form action="{{ url('admin/store/useradd/'.$id) }}" method="post">
                        <ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">门店名称：<span class="tigText">最多十个字</span></p>
                                        <input class="goodsInput" id="doorInput1" name="hj_name" maxlength="10" type="text" placeholder="请输入产品名称">
                                    </li>
                                    <!--选择分类-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">门店分类：</p>
                                        <select name="hj_store_cate_id" class="link" id="coatChose4">
                                            @foreach($cate as $v)
                                            <option value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">服务项目：</p>
                                        <input class="tjsp" type="checkbox" name="hj_project_id[]" value="0">门店通用&nbsp;&nbsp;&nbsp;
                                        @foreach($project as $v)
                                            <input class="tjsp" type="checkbox" name="hj_project_id[]" value="{{ $v['id'] }}">&nbsp;{{ $v['hj_name'] }}&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">门店地区：</p>
                                        <select name="hj_sheng" class="link" id="coatChose4"></select>
                                        <select name="hj_shi" class="link" id="coatChose4"></select>
                                        <select name="hj_xian" class="link" id="coatChose4"></select>
                                    </li>
                                    <!--门店地址-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">门店地址：</p>
                                        <input class="goodsInput" id="doorInput2" name="hj_address" type="text" placeholder="请输入门店地址">
                                    </li>
                                    <!--门店电话-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">门店电话：</p>
                                        <input class="goodsInput" id="doorInput3" name="hj_phone" type="text" placeholder="请输入门店电话">
                                    </li>
                                    <!--营业时间-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">营业时间：</p>
                                        <input class="goodsInput" id="doorInput4" name="hj_start_time" type="text" placeholder="8:00"> - <input class="goodsInput" id="doorInput5" name="hj_end_time" type="text" placeholder="24:00">
                                    </li>
                                    <!--logo图-->
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">logo：<span class="tigText">建议尺寸：150*150px。</span></p>
                                        <div class="goodsImgDiv" id="aaa1">
                                            <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                            <input class="fileButton2" onclick="abc(1)" name="file_upload" id="file_upload1" type="file">
                                            <input type="hidden" id="goods_thumb1" name="hj_logo" value="">
                                        </div>
                                    </li>
                                    <!--背景图-->
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">背景图：<span class="tigText">建议尺寸：640*300px，大小不超过50KB</span></p>
                                        <div class="goodsImgDiv" id="aaa2">
                                            <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                            <input class="fileButton2" onclick="abc(2)" name="file_upload" id="file_upload2" type="file">
                                            <input type="hidden" name="hj_bgpic" id="goods_thumb2" value="">
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--推荐商品-->
                            {{--<li>--}}
                                {{--<div class="attribute">--}}
                                    {{--<ul class="attributeList" id="attributeList">--}}
                                        {{--推荐商品&nbsp;&nbsp;&nbsp;&nbsp;--}}
                                        {{--@foreach($goods as $v)--}}
                                            {{--<input class="tjsp" type="checkbox" name="hj_goodid[]" value="{{ $v['id'] }}">{{ $v['hj_name'] }} &nbsp;&nbsp;--}}
                                        {{--@endforeach&nbsp;&nbsp;&nbsp;&nbsp;--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            <li>
                                <div class="attribute">
                                    <ul class="attributeList" id="attributeList">
                                        推荐套餐
                                        @foreach($group as $v)
                                            <input class="tjsp" type="checkbox" name="hj_groupid[]" value="{{ $v['id'] }}">{{ $v['hj_name'] }} &nbsp;&nbsp;
                                        @endforeach&nbsp;&nbsp;&nbsp;&nbsp;
                                    </ul>
                                </div>
                            </li>
                            <!--门店简介-->
                            <li>
                                <p class="vipTitle">门店简介</p>
                                <textarea class="textShow" name="hj_content" id="jianjie" placeholder="请输入简介 "></textarea>
                            </li>
                        </ul>
                        <!--保存提交按钮-->
                        <div class="buttonDiv">
                            {{ csrf_field() }}
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
            url: "{{ url('/admin/store/upload') }}",
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
<script>
    new PCAS("hj_sheng","hj_shi","hj_xian","吉林省","吉林市","龙潭区");
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