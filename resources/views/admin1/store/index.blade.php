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
            <li class="active"><a href="#icoterie_list" data-toggle="tab">门店列表</a></li>
            <li><a href="#icoterie_add" data-toggle="tab">门店添加</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
			<!--门店列表-->
            <div class="tab-pane fade in active" id="icoterie_list">
                <div class="allShow2">
                    <table class="showTable" style="width:100%;">
                        <tbody>
							<tr>
								<th>门店编号</th>
								<th>门店简称</th>
								<th>门店全名</th>
								<th>门店地址</th>
								<th>门店标识</th>
								<th>门店照片</th>
								<th>门店类型</th>
								<th>门店状态</th>
								<th>联系电话</th>
								<th>营业时间</th>
								
								<th>操作</th>
							</tr>
							
							@foreach($store as $v)
							<tr>
								<td>
									{{ $v['id'] }}
								</td>
								<td>
									{{ $v['alias_name'] }}
								</td>
								<td>
									{{ $v['store_name'] }}
								</td>
								<td>
									{{ $v['province'] }}{{ $v['city'] }}{{ $v['district'] }}{{ $v['store_address'] }}
								</td>
								<td>
									@if($v['store_logo']) 已传 @else 未传 @endif
								</td>
								<td>
									@if($v['store_backdrop']) 已传 @else 未传 @endif
								</td>
								<td>
									@if($v['attribute'] ==0) 全套 @elseif($v['attribute'] ==1) 商品 @elseif($v['attribute'] ==2) 洗车 @else 加油 @endif
								</td>
								<td>
									@if($v['receipt_stutus'] == '1') 营业 @else 休息 @endif
								</td>
								<td>
									{{ $v['store_phone'] }}
								</td>
								<td>
									{{ $v['start_time'] }} - {{ $v['end_time'] }}
								</td>
								<td>
									<p class="delete"><a href="{{ url('admin/store/update/'.$v['id']) }}">编辑</a></p>
									<p class="delete"><a href="{{ url('admin/store/del/'.$v['id']) }}">删除</a></p>
								</td>
							</tr>
							@endforeach
                        </tbody>
					</table>
                        <div>{{ $store->links() }}</div>
                </div>
            </div>
			
            <!--门店分类-->
            <div class="tab-pane fade" id="icoterie_add">
                <div class="allShow2">
                    <form action="{{ url('admin/store/add') }}" method="post">
                        <ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">门店简称：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="alias_name" type="text" placeholder="请输入简称">
                                  </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">门店全名：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="store_name" type="text" placeholder="请输入全名">
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
                                        <input class="goodsInput" id="doorInput2" name="store_address" type="text" placeholder="请输入门店地址"> 
                                      	<span class="tigText">如:(xxxx路xxx号) </span>
                                      	<span class="tigText"><a href = "https://lbs.qq.com/tool/getpoint/" target="_blank">坐标拾取</a></span>
                                      	<input class="goodsTextTitle" id="doorInput21" name="longitude" type="text" placeholder="请输入坐标经度">
                                      	<input class="goodsTextTitle" id="doorInput22" name="latitude" type="text" placeholder="请输入坐标伟度">
                                    </li>
                                    <!--选择分类-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">门店分类：</p>
                                        <select name="attribute" class="link" id="coatChose4">
                                            <option value="0">全套</option>
											<option value="1">商品</option>
											<option value="2">洗车</option>
                                          <option value="3">加油</option>
                                        </select>
                                    </li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">归属企业：</p>
                                        <select name="cid" class="goodsTextTitle" id="coatChose4">
                                            @foreach($company as $v)
                                            <option value="{{ $v['id'] }}">{{ $v['corporate'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    
                                    <!--门店电话-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">门店电话：</p>
                                        <input class="goodsInput" id="doorInput3" name="store_phone" type="text" placeholder="请输入门店电话">
                                    </li>
                                    <!--营业时间-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">营业时间：</p>
                                        <input class="goodsTextTitle" id="doorInput4" name="start_time" type="text" placeholder="8:00"> - <input class="goodsTextTitle" id="doorInput5" name="end_time" type="text" placeholder="24:00">
                                    </li>
                                    <!--logo图-->
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">logo：<span class="tigText">建议尺寸：400*400px。</span></p>
                                        <div class="goodsImgDiv" id="aaa1">
                                            <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                            <input class="fileButton2" onclick="abc(1)" name="file_upload" id="file_upload1" type="file">
                                            <input type="hidden" id="goods_thumb1" name="store_logo" value="">
                                        </div>
                                    </li>
                                    <!--背景图-->
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">背景图：<span class="tigText">建议尺寸：720*270px，大小不超过200KB</span></p>
                                        <div class="goodsImgDiv" id="aaa2">
                                            <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                            <input class="fileButton2" onclick="abc(2)" name="file_upload" id="file_upload2" type="file">
                                            <input type="hidden" id="goods_thumb2" name="store_backdrop" value="">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">微信二维码：<span class="tigText">上传1张图片，建议大小：像素。150*167像素</span></p>
                                        <div class="goodsImgDiv" id="aaa0">
                                            <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                            <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                            <input type="hidden" name="store_wechat_payment" id="goods_thumb0" value="">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">支付宝二维码：<span class="tigText">上传1张图片，建议大小：像素。150*167像素</span></p>
                                        <div class="goodsImgDiv" id="aaa3">
                                            <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                            <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(3)" name="file_upload" data="data3" id="file_upload3" type="file">
                                            <input type="hidden" name="store_alipay_payment" id="goods_thumb3" value="">
										</div>
                                    </li>
                                </ul>
                            </li>
                            
                            <!--门店简介-->
                            <li>
                                <p class="vipTitle">门店简介</p>
                                <textarea class="textShow" name="store_introduce" id="jianjie" placeholder="请输入简介 "></textarea>
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
    new PCAS("province","city","district","河北省","衡水市","桃城区");
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