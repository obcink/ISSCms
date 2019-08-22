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
            <li><a href="javascript:history.back(-1);">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改门店</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/store/update/'.$data['id']) }}" method="post">
                    <ul class="information">{{ csrf_field() }}
                        <!--产品信息-->
                        <li>
                            <ul class="informationList">
								<li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店简称：</p>
                                    <input class="goodsInput" id="doorInput1" name="alias_name" maxlength="10" value="{{ $data['alias_name'] }}" type="text" placeholder="请输入"> <span class="tigText">门店名称最多四个字</span>
                                </li>
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店全名：</p>
                                    <input class="goodsInput" id="doorInput1" name="store_name" maxlength="10" value="{{ $data['store_name'] }}" type="text" placeholder="请输入"> <span class="tigText">门店名称最多十个字</span>
                                </li>
								<li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店地区：</p>
                                    <select name="province" class="link" id="coatChose4"></select>
                                    <select name="city" class="link" id="coatChose4"></select>
                                    <select name="district" class="link" id="coatChose4"></select>
                                </li>
                                <!--门店地址-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店地址：</p>
                                    <input class="goodsInput" value="{{ $data['store_address'] }}" id="doorInput2" name="store_address" type="text" placeholder="请输入门店地址"> <span class="tigText">如:(xxxx路xxx号)</span>
                                </li>
                                <!--选择分类-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店分类：</p>
                                    <select name="attribute" class="link" id="coatChose4">
										<option @if($data['attribute'] == 0) selected @endif value="0">全套</option>
										<option @if($data['attribute'] == 1) selected @endif value="1">商品</option>
										<option @if($data['attribute'] == 2) selected @endif value="2">洗车</option>
										<option @if($data['attribute'] == 3) selected @endif value="3">加油</option>
                                    </select>
                                </li>
								<li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">归属企业：</p>
                                    <select name="cid" class="goodsTextTitle" id="coatChose4">
                                        @foreach($company as $v)
                                        <option @if($data['cid'] == $v['id']) selected @endif value="{{ $v['id'] }}">{{ $v['corporate'] }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                
                                <!--门店电话-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店电话：</p>
                                    <input class="goodsInput" id="doorInput3" value="{{ $data['store_phone'] }}" name="store_phone" type="text" placeholder="请输入门店电话">
                                </li>
                                <!--营业时间-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">营业时间：</p>
                                    <input class="goodsTextTitle" id="doorInput4" value="{{ $data['start_time'] }}" name="start_time" type="text" placeholder="8:00"> - <input class="goodsTextTitle" value="{{ $data['end_time'] }}" id="doorInput5" name="end_time" type="text" placeholder="24:00">
                                </li>
                                <!--logo图-->
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">logo：<span class="tigText">建议尺寸：400*400px。</span></p>
                                    <div class="goodsImgDiv" id="aaa1">
                                        <img class="picture2" src="{{ $data['store_logo'] }}" alt="">
                                        <input class="fileButton2" onclick="abc(1)" name="file_upload" id="file_upload1" type="file">
                                        <input type="hidden" id="goods_thumb1" name="store_logo" value="{{ $data['store_logo'] }}">
                                    </div>
                                </li>
                                <!--背景图-->
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">背景图：<span class="tigText">建议尺寸：720*270px，大小不超过200KB</span></p>
                                    <div class="goodsImgDiv" id="aaa2">
                                        <img class="picture2" src="{{ $data['store_backdrop'] }}" alt="">
                                        <input class="fileButton2" onclick="abc(2)" name="file_upload" id="file_upload2" type="file">
                                        <input type="hidden" name="store_backdrop" id="goods_thumb2" value="{{ $data['store_backdrop'] }}">
                                    </div>
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">微信二维码：<span class="tigText">上传1张图片，建议大小：像素。150*167像素</span></p>
                                    <div class="goodsImgDiv" id="aaa0">
                                        <img class="picture2" src="{{ $data['store_wechat_payment'] }}" alt="">
                                        <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                        <input type="hidden" name="store_wechat_payment" id="goods_thumb0" value="{{ $data['store_wechat_payment'] }}">
                                    </div>
                                </li>
                                <li>
                                <li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">支付宝二维码：<span class="tigText">上传1张图片，建议大小：像素。150*167像素</span></p>
                                    <div class="goodsImgDiv" id="aaa3">
                                        <img class="picture2" src="{{ $data['store_alipay_payment'] }}" alt="">
                                        <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(3)" name="file_upload" data="data3" id="file_upload3" type="file">
                                        <input type="hidden" name="store_alipay_payment" id="goods_thumb3" value="{{ $data['store_alipay_payment'] }}">
                                    </div>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <p class="vipTitle">门店简介</p>
                            <textarea class="textShow" name="store_introduce" id="jianjie" placeholder="请输入简介 ">{{ $data['store_introduce'] }}</textarea>
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
        new PCAS("province","city","district","{{ $data['province'] }}","{{ $data['city'] }}","{{ $data['district'] }}");
		//new PCAS("province","city","district","河北省","衡水市","桃城区");
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