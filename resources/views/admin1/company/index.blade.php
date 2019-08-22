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
            <li class="active"><a href="#icoterie_list" data-toggle="tab">企业列表</a></li>
            <li><a href="#icoterie_add" data-toggle="tab">企业添加</a></li>
        </ul>
        <!--内容部分-->
        <div id="myTabContent" class="tab-content">
			<!--门店列表-->
            <div class="tab-pane fade in active" id="icoterie_list">
                <div class="allShow2">
                    <table class="showTable" style="width:100%;">
                        <tbody>
							<tr>
								<th>编号</th>
								<th>企业字号</th>
								<th>企业全称</th>
								<th>企业关系</th>
								<th>信用代码</th>
								<th>联系人</th>
								<th>联系电话</th>
								<th>添加时间</th>
								<th>更新时间</th>
								<th>操作</th>
							</tr>
							
							@foreach($company as $v)
							<tr>
								<td>
									{{ $v['id'] }}
								</td>
								<td>
									{{ $v['simple'] }}
								</td>
								<td>
									{{ $v['corporate'] }}
								</td>
								<td>
									@if($v['type'] == '1') 平台自营 @else 合作入驻 @endif
								</td>
								<td>
									{{ $v['credit'] }}
								</td>
								<td>
									{{ $v['contact_name'] }}
								</td>
								<td>
									{{ $v['contact_phone'] }}
								</td>
								
								<td>
									{{ $v['create_time'] }}
								</td>
								<td>
									{{ $v['update_time'] }}
								</td>
								<td>
									<p class="delete"><a href="{{ url('admin/company/update/'.$v['id']) }}">编辑</a></p>
									<p class="delete"><a href="{{ url('admin/company/del/'.$v['id']) }}">删除</a></p>
								</td>
							</tr>
							@endforeach
                        </tbody>
					</table>
                        <div>{{ $company->links() }}</div>
                </div>
            </div>
			
            <!--门店分类-->
            <div class="tab-pane fade" id="icoterie_add">
                <div class="allShow2">
                    <form action="{{ url('admin/company/add') }}" method="post">
                        <ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">企业字号：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="simple" type="text" placeholder="请输入简称">
									</li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">企业全称：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="corporate" type="text" placeholder="请输入全称">
                                    </li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">企业关系：</p>
                                        <select name="type" class="link" id="coatChose4">
                                            <option value="1">平台自营</option>
											<option value="2">合作入驻</option>
                                        </select>
                                    </li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">信用代码：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="credit" type="text" placeholder="请输入统一社会信用代码">
									</li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">联系人名：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="contact_name" type="text" placeholder="请输入法人全名">
                                    </li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">联系电话：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="contact_phone" type="text" placeholder="请输入法人电话">
                                    </li>
									                                    
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">卡券规则：</p>
                                        <select name="rid" class="goodsTextTitle" id="coatChose4">
                                            @foreach($integral as $v)
                                            <option value="{{ $v['id'] }}">{{ $v['worth'] }}/1</option>
                                            @endforeach
                                        </select>
                                    </li>
                                </ul>
                            </li>
                            
                            <!--门店简介-->
                            <li>
                                <p class="vipTitle">企业简介</p>
                                <textarea class="textShow" name="remarks" id="jianjie" placeholder="请输入简介 "></textarea>
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
            url: "{{ url('/admin/company/upload') }}",
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