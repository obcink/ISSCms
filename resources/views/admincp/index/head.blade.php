<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Icoterie Smart System Backstage</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
	<!-- //custom-theme -->
	<link rel="stylesheet" type="text/css" href="/icoterie/css/bootstrap.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/icoterie/css/component.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/icoterie/css/export.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/icoterie/css/flipclock.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/icoterie/css/circles.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/icoterie/css/style_grid.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/icoterie/css/style.css" media="all" />
	<!-- //custom-theme -->
	<link rel="stylesheet" type="text/css" href="/icoterie/css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="/icoterie/css/basictable.css" />
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
								<li><a href="{{ url('admincp/index') }}"> <i class="fa fa-tachometer"></i> 控制台</a></li>
						@if(session('menu'))	
							@foreach(session('menu') as $menu)
								@if($menu->pid==0)
								<li>
									@if($menu->url) <a href="{{ url($menu->url) }}"> @else <a href="#"> @endif
									<!--a href="{{ url($menu->url) }}"--> 
										<i class="fa {{ $menu->ico }}"></i> {{ $menu->name }}
										@if($menu->sub) <i class="fa fa-angle-down" aria-hidden="true"></i> @endif
									</a>@if($menu->sub)
									<ul class="gn-submenu">
										@foreach(session('menu') as $submenu)
											@if($submenu->pid==$menu->id)
											<li class="mini_list_agile">
												<a href="{{ url($submenu->url) }}"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ $submenu->name }}</a>
											</li>
											@endif
										@endforeach
									</ul>@endif
								</li>
								@endif
							@endforeach
						@endif
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<!-- //nav_agile_w3l -->
				<li class="second logo"><h1><a href="{{ url('admincp/index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>ISSB</a></h1></li>
				<li class="second admin-pic">
					<ul class="top_dp_agile">
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="/icoterie/images/admin.jpg" alt="{{ session('user')->user_name }}" title="{{ session('user')->user_name }}"> </span> 
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="{{ url('admincp/config/index') }}"><i class="fa fa-cog"></i>设置</a> </li> 
								<li> <a href="{{ url('admincp/management/update/'. session('user')->user_id) }}"><i class="fa fa-user"></i>简况</a> </li> 
								<li> <a href="{{ url('admincp/loginout') }}"><i class="fa fa-sign-out"></i>登出</a> </li>
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
	<div class="inner_content" style="padding: 0em 4em 4em 4em;margin-top: -6em;">		
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
				
			<div class="inner_content_w3_agile_info two_in tab-content">	
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
	</div>
		<!-- banner -->
		<!--copy rights start here-->
		<div class="copyrights">
			 <p>Copyright &copy; 2019.Icoterie All rights reserved</p>
		</div>
		<!--copy rights end here-->
	</div>
	
<!-- js -->
<script type="text/javascript" src="/icoterie/js/jquery-3.2.1.min.js"></script>

<!--layer插件-->
<script type="text/javascript" src="/icoterie/js/plugins/layer/layer.js"></script>
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
<script type="text/javascript" src="/icoterie/js/jquery.basictable.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table').basictable();

		$('#table-breakpoint').basictable({
			breakpoint: 768
		});

		$('#table-swap-axis').basictable({
			swapAxis: true
		});

		$('#table-force-off').basictable({
			forceResponsive: false
		});

		$('#table-no-resize').basictable({
			noResize: true
		});

		$('#table-two-axis').basictable();

		$('#table-max-height').basictable({
			tableWrapper: true
		});
	});
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