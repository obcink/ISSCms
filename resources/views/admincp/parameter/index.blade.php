@extends('admincp/index/head')
@section('content')
<style>
.agile_info_shadow .button{float:left;}
.agile_info_shadow .button:first-child{margin-right:10px;}
.grids .row .col-md-2 .nav{color: #555;cursor: default;background-color: #fff;border: 1px solid #ddd;}
.grids .row .col-md-2 .nav li{border-top:1px solid #ddd;}
.grids .row .col-md-2 .nav li:first-child{border-top:none;}
</style>
<!-- /inner_content-->
<div class="inner_content">
	<!-- /inner_content_w3_agile_info-->
	<!-- breadcrumbs -->
	<div class="w3l_agileits_breadcrumbs">
		<div class="w3l_agileits_breadcrumbs_inner">
			<ul>
				<li><a href="{{ url('admincp/index') }}">仪表盘</a><span>«</span></li>
				<li><a href="main-page.html">系统</a><span>«</span></span></li>
				<li><a href="{{ url('admincp/basic/update/' . $id) }}">配置选项</a><span>«</span></li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<div class="inner_content_w3_agile_info two_in">
		<!--h2 class="w3_inner_tittle">电子卡券</h2-->
      	<!--横向导航栏-->
			<ul class="nav nav-tabs" style="border-bottom:none;">
				<li class="active "><a href="#icoterie_basic" data-toggle="tab">基本配置</a></li>
				<li><a href="#icoterie_interface" data-toggle="tab">开放接口</a></li>
			</ul>
		<!-- tables -->
		<div class="agile3-grids agile_info_shadow">	
			<!-- grids -->
			<div class="grids">
			    <div class="panel1 panel-widget top-grids">
					<div class="chute chute-center text-center">
						<div class="row mb40">
							<div class="col-md-2">
			<ul class="nav">
				<li><a href="#icoterie_platform" data-toggle="tab">平台设置</a></li>
				<li><a href="#icoterie_service" data-toggle="tab">客服设置</a></li>
				<li><a href="#icoterie_member" data-toggle="tab">会员设置</a></li>
			</ul>
							</div>
							<div class="col-md-10 tab-content">
		<div class="wthree_general graph-form agile_info_shadow tab-pane fade active in" id="icoterie_basic">
			<h3 class="w3_inner_tittle two">SITE BASIC</h3>
			<div class="grid-1 ">
				<div class="form-body">
					<form class="form-horizontal"  action="{{ url('admincp/parameter/index/' . $id) }}" method="post">{{ csrf_field() }}
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">站点名称</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" name="site_name" placeholder="Default Input" value="{{ $data['site_name'] }}">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>
						
						<div class="form-group mb-n">
							<label for="largeinput" class="col-sm-2 control-label label-input-lg">站点标题</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1 input-lg" id="largeinput"  name="site_title" placeholder="Large Input" name="path" value="{{ $data['site_title'] }}">
							</div>
							<div class="col-sm-2">
								<p class="help-block">标题将显示在浏览器的标题栏!</p>
							</div>
						</div>

						<div class="form-group mb-n">
							<label for="largeinput" class="col-sm-2 control-label label-input-lg">站点描述</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1 input-lg" id="largeinput"  name="site_description" placeholder="Large Input" name="path" value="{{ $data['site_description'] }}">
							</div>
							<div class="col-sm-2">
								<p class="help-block">描述内容，将显示在浏览器的Description!</p>
							</div>
						</div>
						<div class="form-group mb-n">
							<label for="largeinput" class="col-sm-2 control-label label-input-lg">站点关键词</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1 input-lg" id="largeinput"  name="site_keywords" placeholder="Large Input" name="path" value="{{ $data['site_keywords'] }}">
							</div>
							<div class="col-sm-2">
								<p class="help-block">关键字，将显示在浏览器的Keywords!</p>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">站点状态</label>
							<div class="col-sm-8">
								<div class="radio-inline">
									<label>
										<input type="radio" name="site_status" value="0" @if($data['site_status']==1) checked @endif/> Effective
									</label>
								</div>
								
								<div class="radio-inline">
									<label>
										<input type="radio" name="site_status" value="1" @if($data['site_status']==1) checked @endif/> Invalid
									</label>
								</div>
							</div>
						</div>
						
						<div class="buttonDiv">
                            <input class="submitButton" type="submit" value="Submit">
                        </div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="wthree_general graph-form agile_info_shadow tab-pane" id="icoterie_interface">
			<h3 class="w3_inner_tittle two">SITE INTERFACE</h3>
			<div class="grid-1 ">
				<div class="form-body">
					<form class="form-horizontal"  action="{{ url('admincp/parameter/create') }}" method="post">{{ csrf_field() }}
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">SITE DOMAIM</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" name="domain" placeholder="Default Input" value="">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>
						
						<div class="form-group mb-n">
							<label for="largeinput" class="col-sm-2 control-label label-input-lg">SITE PATH</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1 input-lg" id="largeinput" placeholder="Large Input" name="path" value="">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>
						
						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">SITE Status</label>
							<div class="col-sm-8">
								<div class="radio-inline">
									<label>
										<input type="radio" name="status" value="0"> Effective
									</label>
								</div>
								
								<div class="radio-inline">
									<label>
										<input type="radio" name="status" value="1" checked> Invalid
									</label>
								</div>
							</div>
						</div>
						
						<div class="buttonDiv">
                            <input class="submitButton" type="submit" value="Submit">
                        </div>
					</form>
				</div>
			</div>
		</div>	
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
		<!-- //grids -->

		
		<!-- //tables -->
		
																		
		<!--//set-2-->
	</div>
	<!-- //inner_content_w3_agile_info-->
</div>
@stop