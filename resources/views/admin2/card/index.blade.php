@extends('admin/head2')
@section('content')
<script src="{{ url('admin/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.js') }}"></script>
    <!--layer插件-->
    <script src="{{ url('admin/layer/layer.js') }}"></script>

    @if (count($errors) > 0)
        @foreach($errors->all() as $error)
            <script>
                window.onload = function () {
                    layer.msg('{{ $error }}');
                }

            </script>
        @endforeach
    @endif
    @if (session('msg'))
        <script>
            window.onload = function () {
                layer.msg('{{ session('msg') }}');
            }
        </script>
    @endif
<style>
#icoterie_list .two-axis .operate{padding:0;}
#icoterie_list .two-axis .operate .button{width:90px;height:30px;margin:0;float:left;}
#icoterie_list .two-axis .operate .button .btnText{margin-top: 5px;}
#icoterie_list .two-axis .operate .button .btnTwo{width:156px;height:26px;margin-top:-45px;left: 200px;}
#icoterie_list .two-axis .operate .button .btnTwo .btnText2{margin-top:2px;margin-right:-100px;}
.operate .shrink{
	background: #3D4C53;
    text-align: center;
    transition: .2s;
    border-radius: 3px;
    color: #fff;
    padding: 4px 60px;
    font-size: 1.25em;
    text-transform: uppercase;
    font-weight: 600;
}
.operate .shrink:hover {
    -webkit-transform: scale(0.8);
    -ms-transform: scale(0.8);
    transform: scale(0.8);
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
    background: #007ee5;
	}
</style>
<!-- /inner_content-->
<div class="inner_content">
	<!-- /inner_content_w3_agile_info-->
	<!-- breadcrumbs -->
	<div class="w3l_agileits_breadcrumbs">
		<div class="w3l_agileits_breadcrumbs_inner">
			<ul>
				<li><a href="main-page.html">仪表盘</a><span>«</span></li>
				<li><a href="main-page.html">营销</a><span>«</span></span></li>
				<li><a href="main-page.html">卡券列表</a><span>«</span></li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<div class="inner_content_w3_agile_info two_in tab-content">
		<!--h2 class="w3_inner_tittle">电子卡券</h2-->
      	<!--横向导航栏-->
			<ul class="nav nav-tabs" style="border-bottom:none;">
				<li class="active "><a href="#icoterie_list" data-toggle="tab">卡券列表</a></li>
				<li><a href="#icoterie_issue" data-toggle="tab">发行卡券</a></li>
				<li><a href="#icoterie_exclusive" data-toggle="tab">发放专属</a></li>
				<li><a href="#icoterie_staff" data-toggle="tab">发放员工</a></li>
				<li><a href="#icoterie_member" data-toggle="tab">发放会员</a></li>
			</ul>
		<!-- tables -->
		<div class="agile-tables tab-pane fade active in" id="icoterie_list">
			<div class="w3l-table-info agile_info_shadow">
				<h3>卡券列表</h3>
				<table id="table-two-axis" class="two-axis">
					<thead>
						<tr>
							<th>卡券名称</th>
							<th>卡券类型</th>
							<th>卡券用途</th>
							<th>合作商家</th>
							<th>联系人名</th>
							<th>联系电话</th>
							<th>卡券售价</th>
							<th>创建日期</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<!--tr>
							<td>自动洗车</td>
							<td>至尊卡</td>
							<td>全套</td>
							<td>河北小熊洗车服务股份有限公司</td>
							<td>郭有福</td>
							<td>0318-8888235</td>
							<td>10</td>
							<td>2019-05-27</td>
							<td>
								<div class="button">
									<p class="btnText">修改</p>
									<div class="btnTwo">
										<p class="btnText2">GO!</p>
									</div>
								</div>

								<div class="button">
									<p class="btnText">停用</p>
									<div class="btnTwo">
										<p class="btnText2">X</p>
									</div>
								</div>
							</td>
						</tr-->
						@foreach($card as $v)
						<tr>
							<td>{{ $v['name'] }}</td>
							<td>@if($v['mold']  == 0) 普通卡 @else 专属卡 @endif</td>
							<td>@if($v['type']  == 0) 全部 @elseif($v['type']  == 1) 商品 @elseif($v['type']  == 2) 洗车 @else 加油 @endif</td>
							<td>{{ $v['corporate'] }}</td>
							<td>{{ $v['contact_name'] }}</td>
							<td>{{ $v['contact_phone'] }}</td>
							<td>{{ $v['price'] }}</td>
							<td> {{ date('Y-m-d', $v['create_time']) }}</td>
							<td class="operate">
								<div class="button" style="margin-right:10px;"><a href="{{ url('admin/card/update/'.$v['id']) }}">
									<p class="btnText">修改</p>
									<div class="btnTwo">
										<p class="btnText2">GO!</p>
									</div></a>
								</div>

								<div class="button"><a href="{{ url('admin/card/del/'.$v['id']) }}">
									<p class="btnText">停用</p>
									<div class="btnTwo">
										<p class="btnText2">X</p>
									</div></a>
								</div>
								
								<div class="shrink">Shrink</button>
							</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
				<div>{{ $card->links() }}</div>
			</div>
		</div>
		<!-- //tables -->
		
		<div class="wthree_general graph-form agile_info_shadow tab-pane" id="icoterie_issue">
			<h3 class="w3_inner_tittle two">发行卡券</h3>
			<div class="grid-1 ">
				<div class="form-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Focused Input</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>
						<div class="form-group">
							<label for="disabledinput" class="col-sm-2 control-label">Disabled Input</label>
							<div class="col-sm-8">
								<input disabled="" type="text" class="form-control1" id="disabledinput" placeholder="Disabled Input">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control1" id="inputPassword" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
							<div class="col-sm-8">
								<div class="checkbox-inline1"><label><input type="checkbox"> Unchecked</label></div>
								<div class="checkbox-inline1"><label><input type="checkbox" checked=""> Checked</label></div>
								<div class="checkbox-inline1"><label><input type="checkbox" disabled=""> Disabled Unchecked</label></div>
								<div class="checkbox-inline1"><label><input type="checkbox" disabled="" checked=""> Disabled Checked</label></div>
							</div>
						</div>
						<div class="form-group">
							<label for="checkbox" class="col-sm-2 control-label">Checkbox Inline</label>
							<div class="col-sm-8">
								<div class="checkbox-inline"><label><input type="checkbox"> Unchecked</label></div>
								<div class="checkbox-inline"><label><input type="checkbox" checked=""> Checked</label></div>
								<div class="checkbox-inline"><label><input type="checkbox" disabled=""> Disabled Unchecked</label></div>
								<div class="checkbox-inline"><label><input type="checkbox" disabled="" checked=""> Disabled Checked</label></div>
							</div>
						</div>
						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Dropdown Select</label>
							<div class="col-sm-8">
								<select name="selector1" id="selector1" class="form-control1">
									<option>Lorem ipsum dolor sit amet.</option>
									<option>Dolore, ab unde modi est!</option>
									<option>Illum, fuga minus sit eaque.</option>
									<option>Consequatur ducimus maiores voluptatum minima.</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Multiple Select</label>
							<div class="col-sm-8">
								<select multiple="" class="form-control1">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="txtarea1" class="col-sm-2 control-label">Textarea</label>
							<div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
						</div>
						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">Radio</label>
							<div class="col-sm-8">
								<div class="radio block"><label><input type="radio"> Unchecked</label></div>
								<div class="radio block"><label><input type="radio" checked=""> Checked</label></div>
								<div class="radio block"><label><input type="radio" disabled=""> Disabled Unchecked</label></div>
								<div class="radio block"><label><input type="radio" disabled="" checked=""> Disabled Checked</label></div>
							</div>
						</div>
						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">Radio Inline</label>
							<div class="col-sm-8">
								<div class="radio-inline"><label><input type="radio"> Unchecked</label></div>
								<div class="radio-inline"><label><input type="radio" checked=""> Checked</label></div>
								<div class="radio-inline"><label><input type="radio" disabled=""> Disabled Unchecked</label></div>
								<div class="radio-inline"><label><input type="radio" disabled="" checked=""> Disabled Checked</label></div>
							</div>
						</div>
						<div class="form-group">
							<label for="smallinput" class="col-sm-2 control-label label-input-sm">Small Input</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1 input-sm" id="smallinput" placeholder="Small Input">
							</div>
						</div>
						<div class="form-group">
							<label for="mediuminput" class="col-sm-2 control-label">Medium Input</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="mediuminput" placeholder="Medium Input">
							</div>
						</div>
						<div class="form-group mb-n">
							<label for="largeinput" class="col-sm-2 control-label label-input-lg">Large Input</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1 input-lg" id="largeinput" placeholder="Large Input">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>																	
		<!--//set-2-->
					
		<!-- /social_media-->
		<div class="social_media_w3ls">
			<div class="col-md-3 socail_grid_agile facebook">
                <ul class="icon_w3_info">
					<li>
						<a href="#" class="wthree_facebook">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					</li>
					<li>Facebook</li>
				</ul>
				<ul class="icon_w3_social">
					<li><i class="fa fa-comment-o" aria-hidden="true"></i></li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i></li>
					<li><i class="fa fa-user" aria-hidden="true"></i></li>
                </ul>
				<div class="clearfix"></div>
				<div class="bottom_info_social">
					<div class="col-md-4 agile_w3l_social_media_text_img">
						<img src="/icoterie/images/admin.jpg" alt=""/>
					</div>
					<div class="col-md-8 agile_w3l_social_media_text">
						<h4>Hurisa Joe</h4>
						<p>Lorem ipsum dolor sit amet</p>
					</div>				
					<div class="clearfix"></div>
				</div>
            </div>
			
			<div class="col-md-3 socail_grid_agile twitter">
                <ul class="icon_w3_info">
					<li>
						<a href="#" class="wthree_facebook">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</li>
					<li>Twitter</li>
				</ul>
				<ul class="icon_w3_social">
					<li><i class="fa fa-comment-o" aria-hidden="true"></i></li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i></li>
					<li><i class="fa fa-user" aria-hidden="true"></i></li>
                </ul>
				<div class="clearfix"></div>
				<div class="bottom_info_social">
					<div class="col-md-4 agile_w3l_social_media_text_img">
						<img src="/icoterie/images/a1.jpg" alt="">
					</div>
					<div class="col-md-8 agile_w3l_social_media_text">
						<h4>Jasmin Joe</h4>
						<p>Lorem ipsum dolor sit amet</p>
					</div>
					<div class="clearfix"></div>
				</div>
            </div>
			
			<div class="col-md-3 socail_grid_agile gmail">
                <ul class="icon_w3_info">
					<li>
						<a href="#" class="wthree_facebook">
							<i class="fa fa-google-plus" aria-hidden="true"></i>
						</a>
					</li>
					<li>Google+</li>
				</ul>
				<ul class="icon_w3_social">
					<li><i class="fa fa-comment-o" aria-hidden="true"></i></li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i></li>
					<li><i class="fa fa-user" aria-hidden="true"></i></li>
                </ul>
				<div class="clearfix"></div>
				<div class="bottom_info_social">
					<div class="col-md-4 agile_w3l_social_media_text_img">
						<img src="/icoterie/images/a2.jpg" alt="">
					</div>
					<div class="col-md-8 agile_w3l_social_media_text">
						<h4>John Pal</h4>
						<p>Lorem ipsum dolor sit amet</p>
					</div>
					<div class="clearfix"></div>
				</div>
            </div>
			
			<div class="col-md-3 socail_grid_agile dribble">		  
				<ul class="icon_w3_info">
					<li>
						<a href="#" class="wthree_facebook">
							<i class="fa fa-dribbble" aria-hidden="true"></i>
						</a>
					</li>
					<li>Dribbble</li>
				</ul>
				<ul class="icon_w3_social">
					<li><i class="fa fa-comment-o" aria-hidden="true"></i></li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i></li>
					<li><i class="fa fa-user" aria-hidden="true"></i></li>
                </ul>
				<div class="clearfix"></div>
				<div class="bottom_info_social">
					<div class="col-md-4 agile_w3l_social_media_text_img">
						<img src="/icoterie/images/a4.jpg" alt="">
					</div>
					<div class="col-md-8 agile_w3l_social_media_text">
						<h4>Honey Pal</h4>
						<p>Lorem ipsum dolor sit amet</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>										
		</div>
		<!-- //social_media-->
	</div>
	<!-- //inner_content_w3_agile_info-->
</div>
<script>
    function dele() {
        $("#price").hide();
    }
    function add() {
        $("#price").show();
    }
</script>
<script>
    function abc() {
        if ($('#sttt1').attr('class') == 'open1') {
            $('#sttt1').attr('class','close1');
            $('#sttt2').attr('class','close2');
            $('#sttt2 input').attr('value','0');

        } else if($('#sttt1').attr('class') == 'close1') {
            $('#sttt1').attr('class','open1');
            $('#sttt2').attr('class','open2');
            $('#sttt2 input').attr('value','1');
        }
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
            url: "{{ url('/admin/card/upload') }}",
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