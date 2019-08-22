@extends('admincp/index/head')
@section('content')

<style>/*
#icoterie_list .two-axis thead th:first-child{width:80px;}
#icoterie_list .two-axis thead th:nth-last-child(2){width:100px;}
#icoterie_list .two-axis thead th:last-child{width:150px;}

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
	}*/
</style>
<!-- /inner_content-->
<div class="inner_content">
	<!-- /inner_content_w3_agile_info-->
	<!-- breadcrumbs -->
	<div class="w3l_agileits_breadcrumbs">
		<div class="w3l_agileits_breadcrumbs_inner">
			<ul>
				<li><a href="main-page.html">仪表盘</a><span>«</span></li>
				<li><a href="main-page.html">系统</a><span>«</span></span></li>
				<li><a href="main-page.html">操作日志</a><span>«</span></li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<div class="inner_content_w3_agile_info two_in tab-content">
		<!--h2 class="w3_inner_tittle">电子卡券</h2-->
      	<!--横向导航栏-->
			<!--ul class="nav nav-tabs" style="border-bottom:none;">
				<li class="active "><a href="#icoterie_list" data-toggle="tab">操作日志</a></li>
				<li><a href="#icoterie_issue" data-toggle="tab">发行卡券</a></li>
				<li><a href="#icoterie_exclusive" data-toggle="tab">发放专属</a></li>
				<li><a href="#icoterie_staff" data-toggle="tab">发放员工</a></li>
				<li><a href="#icoterie_member" data-toggle="tab">发放会员</a></li>
			</ul->
		<!-- tables -->
		<div class="agile-tables tab-pane fade active in" id="icoterie_list">
			<div class="w3l-table-info agile_info_shadow">
				<h3 class="w3_inner_tittle two">LOG LIST</h3>
				<table id="table-breakpoint">
					<thead>
						<tr>
							<th>LOG ID</th>
							<th>event</th>
							<th>LOG IP</th>
							<th>LOG TIME</th>
						</tr>
					</thead>
					<tbody>
					@foreach($data as $v)
						<tr>
							<td>{{ $v->log_id }}</td>
							<td>{{ $v->log_info }}</td>
							<td>{{ $v->ip_address }}</td>
							<td>{{ date('Y-m-d H:i:s', $v->log_time) }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div>{{ $data->links() }}</div>
			</div>
		</div>
		<!-- //tables -->
	</div>
	<!-- //inner_content_w3_agile_info-->
</div>
@stop