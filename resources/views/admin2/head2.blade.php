<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Home</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
	<!-- //custom-theme -->
	<link href="/icoterie/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/icoterie/css/component.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/icoterie/css/export.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/icoterie/css/flipclock.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/icoterie/css/circles.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/icoterie/css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/icoterie/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //custom-theme -->
	<link rel="stylesheet" type="text/css" href="/icoterie/css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="/icoterie/css/basictable.css" />
	<link href="/icoterie/css/component.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="/icoterie/css/font-awesome.css" rel="stylesheet" type="text/css"> 
	<!-- font-awesome-icons -->
	<link href="/icoterie/css/font-awesome.css" rel="stylesheet" type="text/css"> 
	<!-- //font-awesome-icons -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
	<!-- banner -->
	<div class="wthree_agile_admin_info">
		<!-- /w3_agileits_top_nav-->
		<!-- /nav-->
		<div class="w3_agileits_top_nav">
			<ul id="gn-menu" class="gn-menu-main">
				<!-- /nav_agile_w3l -->
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><i class="fa fa-list" aria-hidden="true"></i><span>菜单</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller scrollbar1">
							<ul class="gn-menu agile_menu_drop">
								<li><a href="{{ url('admin/index') }}"> <i class="fa fa-tachometer"></i> 仪表盘</a></li>
								<li>
									<a href="#"><i class="fa  fa-barcode" aria-hidden="true"></i> 商品 <i class="fa fa-angle-down" aria-hidden="true"></i></a> 
									<ul class="gn-submenu">
										<li class="mini_list_agile"><a href="{{ url('admin/goods/index') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 商品管理</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 商品发布</a></li>
										<li class="mini_list_agile"><a href="{{ url('admin/cate/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 分类管理</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 规格管理</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 评论管理</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/project/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 平台自营</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 采集导入</a></li>
										
									</ul>
								</li>
								<li>
									<a href="{{ url('admin/record/order') }}"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>订单 <i class="fa fa-angle-down" aria-hidden="true"></i></a> 
									<ul class="gn-submenu">
										<!--li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 订单管理</a></li>
										<li class="mini_list_w3"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 退款订单</a></li>
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 退货订单</a></li>
										<li class="mini_list_w3"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 提货订单</a></li-->
										<li class="mini_list_agile"><a href="{{ url('admin/order/car') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 洗车订单</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/order/good') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 商品订单</a></li>
										<li class="mini_list_agile"><a href="{{ url('admin/order/card') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 卡券订单</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/order/day?hj_start_time=0') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 员工洗车</a></li>
										<li class="mini_list_agile"><a href="{{ url('admin/order/goodsorder?hj_start_time=0') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 员工优品</a></li>
									</ul>
								</li><!--
								<li><a href="table.html"> <i class="fa fa-users" aria-hidden="true"></i> 会员</a>
									<ul class="gn-submenu">
										<li class="mini_list_agile"><a href="{{ url('admin/site/index') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 会员管理</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 标签管理</a></li>
										<li class="mini_list_agile"><a href="{{ url('admin/integral/index') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 会员积分</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 会员等级</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 积分规则</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/only/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 专属客户</a></li>
										<li class="mini_list_agile"><a href="{{ url('admin/big/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 大客户管理</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/catebig/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 大客户分类</a></li>
										<li class="mini_list_agile"><a href="{{ url('admin/vip/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> VIP用户管理</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/car/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 车辆管理</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="fa fa-user-md" aria-hidden="true"></i>团长 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 团长管理</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 团长设置</a></li>
										
									</ul>
								</li>
								<li><a href="table.html"> <i class="fa fa-user" aria-hidden="true"></i> 分销员</a>
									<ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 分销员列表</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 分销员审核</a></li>
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 分销员等级</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 分销设置</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 提现申请</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 历史提现</a></li>
										
									</ul>
								</li>
								<li><a href="#"><i class="fa fa-truck" aria-hidden="true"></i>配送 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 配送单管理</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 生成配送单</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 配送路线</a></li>
									</ul>
								</li>-->
								<li><a href="#"><i class="fa fa-university" aria-hidden="true"></i>门店 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_w3"><a href="{{ url('admin/catestore/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 门店分类</a></li>
										<li class="mini_list_agile"><a href="{{ url('admin/store/index') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 门店列表</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/staff/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 店员导购</a></li>
                                        <!--li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 门店设置</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 供应商列表</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 加盟商列表</a></li-->
									</ul>
								</li>
								<li><a href="#"><i class="fa fa-list" aria-hidden="true"></i>营销 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<!--li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 幸运大转盘</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 刮刮卡</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 炸鸡蛋</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 抽奖</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 摇一摇</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 红包</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 礼品</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 投票</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 买几送几</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 满额优惠</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 限时抢购</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 组合套餐</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 经典拼团</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 混合批发</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 单品批发</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 卡券专享</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 预售</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 常用促销</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 互动营销</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 运营工具</a></li-->
                                      	<li class="mini_list_agile"><a href="{{ url('admin/coupon/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 优惠券</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/card/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 卡券列表</a></li>
                                      	<li class="mini_list_agile"><a href="{{ url('admin/card/list') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 发放记录</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/card/recode') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 核销记录</a></li>
                                      	<li class="mini_list_agile"><a href="{{ url('admin/card/clist') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 使用 </a></li>
									</ul>
								</li><!--
								<li><a href="#"><i class="fa fa-list" aria-hidden="true"></i>财务 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 交易流水</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 会员预存</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 团长结算</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 佣金流水</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 配送工资</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 门店结算</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 供应商结算</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 加盟商结算</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="fa fa-pie-chart" aria-hidden="true"></i>统计 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 交易统计</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 会员统计</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 团长统计</a></li>
									</ul>
								</li>-->
								<li><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i>系统 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="{{ url('admin/config/index') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 站点设置</a></li>
										<li class="mini_list_w3"><a href="{{ url('admin/user/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 管理员</a></li>
										<li class="mini_list_agile"><a href="{{ url('admin/permission/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 权限菜单</a></li><!--
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 消息设置</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 支付方式</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 物流公司</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 提现设置</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 区域管理</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 部门管理</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 站点地图</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 平台公告</a></li>-->
										<li class="mini_list_w3"><a href="{{ url('admin/operation/index') }}"> <i class="fa fa-caret-right" aria-hidden="true"></i> 操作日志</a></li>
										<li class="mini_list_agile"><a href="{{ url('admin/banner/index') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> 轮播管理</a></li>
									</ul>
								</li><!--
								<li><a href="#"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>内容 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 文章分类</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 文章列表</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 关键锚文</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 友情链接</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="fa fa-file-word-o" aria-hidden="true"></i>帮助 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 帮助内容</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 分类管理</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="fa fa-list" aria-hidden="true"></i>微商城 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 基本配置</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 自定义菜单</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 图文素材</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 自动回复</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="fa fa-list" aria-hidden="true"></i>小程序 <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 基本配置</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 支付设置</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 消息模板</a></li>

									</ul>
								</li>
								<li><a href="#"><i class="fa fa-list" aria-hidden="true"></i>APP <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								    <ul class="gn-submenu">
										<li class="mini_list_agile"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> 版本管理</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 支付配置</a></li>
										<li class="mini_list_agile"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 推送设置</a></li>
										<li class="mini_list_w3"><a href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> 消息列表</a></li>
									</ul>
								</li>
								-->
								<!--li><a href="charts.html"> <i class="fa fa-line-chart" aria-hidden="true"></i> 图表</a></li>
								<li><a href="maps.html"><i class="fa fa-map-o" aria-hidden="true"></i> 地图</a></li>
								<li class="page">
									<a href="#"><i class="fa fa-files-o" aria-hidden="true"></i> 页面 <i class="fa fa-angle-down" aria-hidden="true"></i></a>
										 <ul class="gn-submenu">
						
									  <li class="mini_list_agile"> <a href="signin.html"> <i class="fa fa-caret-right" aria-hidden="true"></i> 登入</a></li>
									   <li class="mini_list_w3"><a href="signup.html"> <i class="fa fa-caret-right" aria-hidden="true"></i> 注册</a></li>
									   <li class="mini_list_agile error"><a href="404.html"> <i class="fa fa-caret-right" aria-hidden="true"></i> 错误</a></li>
	
										<li class="mini_list_w3_line"><a href="calendar.html"> <i class="fa fa-caret-right" aria-hidden="true"></i> 历法</a></li>
									</ul>
								</li>
								<li>
									<a href="#"> <i class="fa fa-suitcase" aria-hidden="true"></i>更多 <i class="fa fa-angle-down" aria-hidden="true"></i></a> 
									<ul class="gn-submenu">
										<li class="mini_list_agile"><a href="faq.html"> <i class="fa fa-caret-right" aria-hidden="true"></i> Faq</a></li>
										<li class="mini_list_w3"><a href="blank.html"> <i class="fa fa-caret-right" aria-hidden="true"></i> Blank Page</a></li>
									</ul>
								</li-->
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<!-- //nav_agile_w3l -->
				<li class="second logo"><h1><a href="{{ url('admin/index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>洁力小熊</a></h1></li>
				<li class="second admin-pic">
					<ul class="top_dp_agile">
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="/icoterie/images/admin.jpg" alt="{{ session('user')['hj_username'] }}" title="{{ session('user')['hj_username'] }}"> </span> 
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="{{ url('admin/config/index') }}"><i class="fa fa-cog"></i>设置</a> </li> 
								<li> <a href="#"><i class="fa fa-user"></i>简况</a> </li> 
								<li> <a href="{{ url('admin/loginout') }}"><i class="fa fa-sign-out"></i>登出</a> </li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="second top_bell_nav">
					<ul class="top_dp_agile ">
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-bell-o" aria-hidden="true"></i> <span class="badge blue">4</span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>您的通知</h3>
									</div>
								</li>
								<li>
									<a href="#">
										<div class="user_img"><img src="/icoterie/images/a3.jpg" alt=""></div>
										<div class="notification_desc">
											<h6>约翰史密斯</h6>
											<p>多尔莫尔</p>
											<p><span>1小时前</span></p>
										</div>
										<div class="clearfix"></div>	
									</a>
								</li>
								<li class="odd">
									<a href="#">
										<div class="user_img"><img src="/icoterie/images/a1.jpg" alt=""></div>
										<div class="notification_desc">
											<h6>茉莉利奥</h6>
											<p>多尔莫尔</p>
											<p><span>3小时前</span></p>
										</div>
										<div class="clearfix"></div>	
									</a>
								</li>
								<li>
									<a href="#">
										<div class="user_img"><img src="/icoterie/images/a2.jpg" alt=""></div>
										<div class="notification_desc">
											<h6>詹姆斯·史密斯</h6>
											<p>多尔莫尔</p>
											<p><span>2小时前</span></p>
										</div>
										<div class="clearfix"></div>	
									</a>
								</li>
								<li>
									<a href="#">
										<div class="user_img"><img src="/icoterie/images/a4.jpg" alt=""></div>
										<div class="notification_desc">
											<h6>詹姆斯·史密斯</h6>
											<p>多尔莫尔</p>
											<p><span>1小时前</span></p>
										</div>
										<div class="clearfix"></div>	
									</a>
								</li>
								<li>
									<div class="notification_bottom">
										<a href="#">See all Notifications</a>
									</div> 
								</li>
							</ul>
						</li>		
					</ul>
				</li>
				<li class="second top_bell_nav">
					<ul class="top_dp_agile ">
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="badge blue">3</span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>你的信息</h3>
									</div>
								</li>
								<li>
									<a href="#">
										<div class="user_img"><img src="/icoterie/images/a3.jpg" alt=""></div>
										<div class="notification_desc">
											<h6>詹姆斯·史密斯</h6>
											<p>多尔莫尔</p>
											<p><span>3小时前</span></p>
										</div>
										<div class="clearfix"></div>	
									</a>
								</li>
								<li class="odd">
									<a href="#">
										<div class="user_img"><img src="/icoterie/images/a1.jpg" alt=""></div>
										<div class="notification_desc">
										    <h6>茉莉利奥</h6>
											<p>多尔莫尔</p>
											<p><span>2小时前</span></p>
										</div>
										<div class="clearfix"></div>	
									</a>
								</li>
								<li>
									<a href="#">
										<div class="user_img"><img src="/icoterie/images/a2.jpg" alt=""></div>
										<div class="notification_desc">
										    <h6>詹姆斯·史密斯</h6>
											<p>多尔莫尔</p>
											<p><span>1小时前</span></p>
										</div>
										<div class="clearfix"></div>	
									</a>
								</li>
								<li>
									<div class="notification_bottom">
										<a href="#">查看所有消息</a>
									</div> 
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="second top_bell_nav">
					<ul class="top_dp_agile ">
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue">9</span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>您有4个悬而未决的任务</h3>
									</div>
								</li>
								<li>
									<a href="#">
										<div class="task-info">
											<span class="task-desc">数据库更新</span><span class="percentage">40%</span>
											<div class="clearfix"></div>	
										</div>
										<div class="progress progress-striped active">
											<div class="bar yellow" style="width:40%;"></div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="task-info">
											<span class="task-desc">仪表板完成</span><span class="percentage">90%</span>
											<div class="clearfix"></div>	
										</div>
										<div class="progress progress-striped active">
											<div class="bar green" style="width:90%;"></div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="task-info">
											<span class="task-desc">移动应用程序</span><span class="percentage">33%</span>
											<div class="clearfix"></div>	
										</div>
										<div class="progress progress-striped active">
											<div class="bar red" style="width: 33%;"></div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="task-info">
											<span class="task-desc">固定问题</span><span class="percentage">80%</span>
											<div class="clearfix"></div>	
										</div>
										<div class="progress progress-striped active">
											<div class="bar  blue" style="width: 80%;"></div>
										</div>
									</a>
								</li>
								<li>
									<div class="notification_bottom">
										<a href="#">查看所有悬而未决的任务</a>
									</div> 
								</li>
							</ul>
						</li>	
					</ul>
				</li>

				<li class="second w3l_search">
					<form action="#" method="post">
						<input type="search" name="search" placeholder="Search here..." required="">
						<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</li>
				<li class="second full-screen">
					<section class="full-top">
						<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
					</section>
				</li>
			</ul>
			<!-- //nav -->
		</div>
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
		
			@yield('content')
			
		<!-- //inner_content-->
	</div>
	<!-- banner -->
	<!--copy rights start here-->
	<div class="copyrights">
		 <p>Copyright &copy; 2019.Icoterie All rights reserved</p>
	</div>	
	<!--copy rights end here-->
	<!-- js -->
	<script type="text/javascript" src="/icoterie/js/jquery-2.1.4.min.js"></script>
	<!-- /amcharts -->
	<script type="text/javascript" src="/icoterie/js/amcharts.js"></script>
	<script type="text/javascript" src="/icoterie/js/serial.js"></script>
	<script type="text/javascript" src="/icoterie/js/export.js"></script>	
	<script type="text/javascript" src="/icoterie/js/light.js"></script>
	<!-- Chart code -->
	<script type="text/javascript">
		var chart = AmCharts.makeChart("chartdiv", {
			"theme": "light",
			"type": "serial",
			"startDuration": 2,
			"dataProvider": [{
				"country": "USA",
				"visits": 4025,
				"color": "#FF0F00"
			}, {
				"country": "China",
				"visits": 1882,
				"color": "#FF6600"
			}, {
				"country": "Japan",
				"visits": 1809,
				"color": "#FF9E01"
			}, {
				"country": "Germany",
				"visits": 1322,
				"color": "#FCD202"
			}, {
				"country": "UK",
				"visits": 1122,
				"color": "#F8FF01"
			}, {
				"country": "France",
				"visits": 1114,
				"color": "#B0DE09"
			}, {
				"country": "India",
				"visits": 984,
				"color": "#04D215"
			}, {
				"country": "Spain",
				"visits": 711,
				"color": "#0D8ECF"
			}, {
				"country": "Netherlands",
				"visits": 665,
				"color": "#0D52D1"
			}, {
				"country": "Russia",
				"visits": 580,
				"color": "#2A0CD0"
			}, {
				"country": "South Korea",
				"visits": 443,
				"color": "#8A0CCF"
			}, {
				"country": "Canada",
				"visits": 441,
				"color": "#CD0D74"
			}, {
				"country": "Brazil",
				"visits": 395,
				"color": "#754DEB"
			}, {
				"country": "Italy",
				"visits": 386,
				"color": "#DDDDDD"
			}, {
				"country": "Taiwan",
				"visits": 338,
				"color": "#333333"
			}],
			"valueAxes": [{
				"position": "left",
				"axisAlpha":0,
				"gridAlpha":0
			}],
			"graphs": [{
				"balloonText": "[[category]]: <b>[[value]]</b>",
				"colorField": "color",
				"fillAlphas": 0.85,
				"lineAlpha": 0.1,
				"type": "column",
				"topRadius":1,
				"valueField": "visits"
			}],
			"depth3D": 40,
			"angle": 30,
			"chartCursor": {
				"categoryBalloonEnabled": false,
				"cursorAlpha": 0,
				"zoomable": false
			},
			"categoryField": "country",
			"categoryAxis": {
				"gridPosition": "start",
				"axisAlpha":0,
				"gridAlpha":0

			},
			"export": {
				"enabled": true
			 }

		}, 0);
	</script>
	<!-- Chart code -->
	<script type="text/javascript">
		var chart = AmCharts.makeChart("chartdiv1", {
			"type": "serial",
			"theme": "light",
			"legend": {
				"horizontalGap": 10,
				"maxColumns": 1,
				"position": "right",
				"useGraphSettings": true,
				"markerSize": 10
			},
			"dataProvider": [{
				"year": 2017,
				"europe": 2.5,
				"namerica": 2.5,
				"asia": 2.1,
				"lamerica": 0.3,
				"meast": 0.2,
				"africa": 0.1
			}, {
				"year": 2016,
				"europe": 2.6,
				"namerica": 2.7,
				"asia": 2.2,
				"lamerica": 0.3,
				"meast": 0.3,
				"africa": 0.1
			}, {
				"year": 2015,
				"europe": 2.8,
				"namerica": 2.9,
				"asia": 2.4,
				"lamerica": 0.3,
				"meast": 0.3,
				"africa": 0.1
			}],
			"valueAxes": [{
				"stackType": "regular",
				"axisAlpha": 0.5,
				"gridAlpha": 0
			}],
			"graphs": [{
				"balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
				"fillAlphas": 0.8,
				"labelText": "[[value]]",
				"lineAlpha": 0.3,
				"title": "Europe",
				"type": "column",
				"color": "#000000",
				"valueField": "europe"
			}, {
				"balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
				"fillAlphas": 0.8,
				"labelText": "[[value]]",
				"lineAlpha": 0.3,
				"title": "North America",
				"type": "column",
				"color": "#000000",
				"valueField": "namerica"
			}, {
				"balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
				"fillAlphas": 0.8,
				"labelText": "[[value]]",
				"lineAlpha": 0.3,
				"title": "Asia-Pacific",
				"type": "column",
				"color": "#000000",
				"valueField": "asia"
			}, {
				"balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
				"fillAlphas": 0.8,
				"labelText": "[[value]]",
				"lineAlpha": 0.3,
				"title": "Latin America",
				"type": "column",
				"color": "#000000",
				"valueField": "lamerica"
			}, {
				"balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
				"fillAlphas": 0.8,
				"labelText": "[[value]]",
				"lineAlpha": 0.3,
				"title": "Middle-East",
				"type": "column",
				"color": "#000000",
				"valueField": "meast"
			}, {
				"balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
				"fillAlphas": 0.8,
				"labelText": "[[value]]",
				"lineAlpha": 0.3,
				"title": "Africa",
				"type": "column",
				"color": "#000000",
				"valueField": "africa"
			}],
			"rotate": true,
			"categoryField": "year",
			"categoryAxis": {
				"gridPosition": "start",
				"axisAlpha": 0,
				"gridAlpha": 0,
				"position": "left"
			},
			"export": {
				"enabled": true
			 }
		});
	</script>
	<!-- //amcharts -->
	<script src="/icoterie/js/Chart.min.js"></script>
	<script src="/icoterie/js/Chart.min.js"></script>
	<script src="/icoterie/js/modernizr.custom.js"></script>
	<script src="/icoterie/js/classie.js"></script>
	<script src="/icoterie/js/gnmenu.js"></script>
	<script>
		new gnMenu( document.getElementById( 'gn-menu' ) );
	</script>
	<!-- script-for-menu -->
	<!-- /circle-->
	<script type="text/javascript" src="/icoterie/js/circles.js"></script>
	<script type="text/javascript">
		var colors = [
			['#ffffff', '#fd9426'], ['#ffffff', '#fc3158'],['#ffffff', '#53d769'], ['#ffffff', '#147efb']
		];
		for (var i = 1; i <= 7; i++) {
			var child = document.getElementById('circles-' + i),
			percentage = 30 + (i * 10);
			Circles.create({
				id:         child.id,
				percentage: percentage,
				radius:     80,
				width:      10,
				number:   	percentage / 1,
				text:       '%',
				colors:     colors[i - 1]
			});
		}
	</script>
	<!-- //circle -->
	<!--skycons-icons-->
	<script type="text/javascript" src="/icoterie/js/skycons.js"></script>
	<script type="text/javascript">
		var icons = new Skycons({"color": "#fcb216"}),
		list  = [
			"partly-cloudy-day"
		],
		i;

		for(i = list.length; i--; )
			icons.set(list[i], list[i]);
			icons.play();
	</script>
	<script type="text/javascript">
		var icons = new Skycons({"color": "#fff"}),
		list  = [
			"clear-night","partly-cloudy-night", "cloudy", "clear-day", "sleet", "snow", "wind","fog"
		],
		i;
		for(i = list.length; i--; )
		icons.set(list[i], list[i]);
		icons.play();
	</script>
	<!--//skycons-icons-->
	<!-- //js -->
	<script type="text/javascript" src="/icoterie/js/screenfull.js"></script>
	<script type="text/javascript">
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
	</script>
	<script type="text/javascript" src="/icoterie/js/flipclock.js"></script>
	<script type="text/javascript">
		var clock;
		$(document).ready(function() {
			clock = $('.clock').FlipClock({
		        clockFace: 'HourlyCounter'
		    });
		});
	</script>
	<script type="text/javascript" src="/icoterie/js/bars.js"></script>
	<script type="text/javascript" src="/icoterie/js/jquery.nicescroll.js"></script>
	<script type="text/javascript" src="/icoterie/js/scripts.js"></script>
	<script type="text/javascript" src="/icoterie/js/bootstrap-3.1.1.min.js"></script>
</body>
</html>