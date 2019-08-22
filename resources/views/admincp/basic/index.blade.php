@extends('admincp/index/head')
@section('content')
<style>
.agile_info_shadow .button{float:left;}
.agile_info_shadow .button:first-child{margin-right:10px;}
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
				<li><a href="{{ url('admincp/basic/index') }}">基础配置</a><span>«</span></li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<div class="inner_content_w3_agile_info two_in tab-content">
		<!--h2 class="w3_inner_tittle">电子卡券</h2-->
      	<!--横向导航栏-->
			<ul class="nav nav-tabs" style="border-bottom:none;">
				<li class="active "><a href="#icoterie_list" data-toggle="tab">站点列表</a></li>
				<li><a href="#icoterie_create" data-toggle="tab">添加站点</a></li>
			</ul>
		<!-- tables -->
		<div class="agile-tables tab-pane fade active in" id="icoterie_list">
			<div class="w3l-table-info agile_info_shadow">
				<h3 class="w3_inner_tittle two">SITE LIST</h3>
				<table id="table-breakpoint">
					<thead>
						<tr>
							<th>SITE ID</th>
							<th>SITE DOMAIM</th>
							<th>SITE PATH</th>
							<th>SITE STATUS</th>
							<th>OPERATE</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->domain }}</td>
							<td>{{ $v->path }}</td>
							<td>{{ $v->status }}</td>
							<td>
							<a href="{{ url('admincp/basic/update/'.$v->id) }}">
								<div class="button">
									<p class="btnText">UPDATE</p>
									<div class="btnTwo">
										<p class="btnText2">GO!</p>
									</div>
								</div>
							</a>
							<a href="{{ url('admincp/basic/destroy/'.$v->id) }}">
								<div class="button">
									<p class="btnText">DELETE</p>
									<div class="btnTwo">
										<p class="btnText2">X</p>
									</div>
								</div>
							</a>
							</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
				<div>{{ $data->links() }}</div>
			</div>
		</div>
		<!-- //tables -->
		
		<div class="wthree_general graph-form agile_info_shadow tab-pane" id="icoterie_create">
			<h3 class="w3_inner_tittle two">SITE GREATE</h3>
			<div class="grid-1 ">
				<div class="form-body">
					<form class="form-horizontal"  action="{{ url('admincp/basic/create') }}" method="post">{{ csrf_field() }}
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
		<!--//set-2-->
	</div>
	<!-- //inner_content_w3_agile_info-->
</div>
@stop