@extends('admin/head2')
@section('content')
	<div class="inner_content">
		<!-- /inner_content_w3_agile_info-->
		<div class="inner_content_w3_agile_info">
			<!-- /agile_top_w3_grids-->
			<div class="agile_top_w3_grids">
				<ul class="ca-menu">
					<li>
						<a href="#">
							<i class="fa fa-building-o" aria-hidden="true"></i>
							<div class="ca-content">
								<h4 class="ca-main">{{ $tom['tom_success']['count'] }}</h4>
								<h3 class="ca-sub">昨日订单</h3>
							</div>
						</a>
					</li>
					
					<li>
						<a href="#">
							<i class="fa fa-user" aria-hidden="true"></i>
							<div class="ca-content">
								<h4 class="ca-main one">{{ $tom['tom_success']['price'] }}</h4>
								<h3 class="ca-sub one">昨日营业额</h3>
							</div>
						</a>
					</li>
					
					<li>
						<a href="#">
							<i class="fa fa-database" aria-hidden="true"></i>
							<div class="ca-content">
								<h4 class="ca-main two">{{ $history['count'] }}</h4>
								<h3 class="ca-sub two">总订单量</h3>
							</div>
						</a>
					</li>
					
					<li>
						<a href="#">
							<i class="fa fa-tasks" aria-hidden="true"></i>
							<div class="ca-content">
								<h4 class="ca-main three">{{ $history['price'] }}</h4>
								<h3 class="ca-sub three">总销售额</h3>
							</div>
						</a>
					</li>
					
					<li>
						<a href="#">
							<i class="fa fa-clone" aria-hidden="true"></i>
							<div class="ca-content">
								<h4 class="ca-main four">30,808</h4>
								<h3 class="ca-sub four">新订单</h3>
							</div>
						</a>
					</li>
					<div class="clearfix"></div>
				</ul>
			</div>
			<!-- //agile_top_w3_grids-->
			<!-- /agile_top_w3_post_sections-->
			<div class="agile_top_w3_post_sections">
				<div class="col-md-6 agile_top_w3_post agile_info_shadow">
					<div class="img_wthee_post">
						<h3 class="w3_inner_tittle">最新报告</h3>
						<div class="stats-wrap">
							<div class="count_info"><h4 class="count">65,800,587 </h4><span class="year">总公司</span></div>
							<div class="year-info"><p class="text-no">20 </p><span class="year">本年度</span></div>
							<div class="clearfix"></div>
						</div>
						<div class="stats-wrap">
							<div class="count_info"><h4 class="count">2,690 </h4><span class="year">总公司</span></div>
							<div class="year-info"><p class="text-no">40 </p><span class="year">本月</span></div>
							<div class="clearfix"></div>
						</div>
						<div class="stats-wrap">
							<div class="count_info"><h4 class="count">24,660 </h4><span class="year">总公司</span></div>
							<div class="year-info"><p class="text-no">30 </p><span class="year">本周</span></div>
							<div class="clearfix"></div>
						</div>
						<div class="stats-wrap">
							<div class="count_info"><h4 class="count">1,204</h4><span class="year">总公司</span></div>
							<div class="year-info"><p class="text-no">10 </p><span class="year">今天</span></div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 agile_top_w3_post_info agile_info_shadow">
					<div class="img_wthee_post1">
						<h3 class="w3_inner_tittle"> 页面驻停</h3>
						<div class="main-example">
							<div class="clock"></div>
							<div class="message"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>			   
			<!-- //agile_top_w3_post_sections-->
			<!-- /w3ls_agile_circle_progress-->
			<div class="w3ls_agile_cylinder chart agile_info_shadow">
				<h3 class="w3_inner_tittle two"> 柱面图</h3>		
				<div id="chartdiv"></div>
			</div>
			<!-- /w3ls_agile_circle_progress-->
			<!-- /chart_agile-->	 
			<!-- /w3ls_agile_circle_progress-->
			<div class="w3ls_agile_circle_progress agile_info_shadow">
				<div class="cir_agile_info ">
					<h3 class="w3_inner_tittle">循环进展</h3>
					<div class="skill-grids">
						<div class="skills-grid text-center">
							<div class="circle" id="circles-1"></div>
							<p>HTML</p>
						</div>
						<div class="skills-grid text-center">
							<div class="circle" id="circles-2"></div>
							<p>摄影</p>
						</div>
						<div class="skills-grid text-center">
							<div class="circle" id="circles-3"></div>		
							<p>插图</p>
						</div>
						<div class="skills-grid text-center">
							<div class="circle" id="circles-4"></div>
							<p>CSS3</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- /w3ls_agile_circle_progress-->
			<!--/prograc-blocks_agileits-->
			<div class="prograc-blocks_agileits">
				<div class="col-md-6 bars_agileits agile_info_shadow">
					<h3 class="w3_inner_tittle two">日销售量</h3>
					<div class='bar_group'>
						<div class='bar_group__bar thin' label='Rating' show_values='true' tooltip='true' value='343'></div>
						<div class='bar_group__bar thin' label='Quality' show_values='true' tooltip='true' value='235'></div>
						<div class='bar_group__bar thin' label='Amount' show_values='true' tooltip='true' value='550'></div>
						<div class='bar_group__bar thin' label='Farming' show_values='true' tooltip='true' value='456'></div>
					</div>
				</div>
				
				<div class="col-md-6 fallowers_agile agile_info_shadow">
					<h3 class="w3_inner_tittle two">近期追随者</h3>
					<div class="work-progres">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>序号</th>
										<th>时间</th>
										<th>新增订单金额/数量</th>                                   										
										<th>平均客单价</th>
										<th>已付款订单金额/数量</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td>1</td>
									<td>昨天</td>
										<td> ￥{{ $tom['tom_sum']['price'] }}/{{ $tom['tom_sum']['count'] }}笔</td>                                 
										<td>￥{{ $tom['tom_fail']['price']?$tom['tom_fail']['price']:0 }}/{{ $tom['tom_fail']['count'] }}笔</td>
										<td>￥{{ $tom['tom_success']['price'] }}/{{ $tom['tom_success']['count'] }}笔</td>
									</tr>
									<tr>
										<td>2</td>
										<td>前天</td>
										<td>￥{{ $yes['yes_sum']['price'] }}/{{ $yes['yes_sum']['count'] }}笔</td>                               
										<td>￥{{ $yes['yes_fail']['price']?$yes['yes_fail']['price']:0 }}/{{ $yes['yes_fail']['count'] }}笔</td>
										<td>￥{{ $yes['yes_success']['price'] }}/{{ $yes['yes_success']['count'] }}笔</td>
									</tr>
									<tr>
										<td>3</td>
										<td>近7天</td>
										<td> ￥{{ $week['week_sum']['price'] }}/{{ $week['week_sum']['count'] }}笔</td>                                
										<td> ￥{{ $week['week_fail']['price']?$week['week_fail']['price']:0 }}/{{ $week['week_fail']['count'] }}笔</td>
										<td>￥{{ $week['week_success']['price'] }}/{{ $week['week_success']['count'] }}笔</td>
									</tr>
									<tr>
										<td>4</td>
										<td>近30天</td>
										<td>￥{{ $mouth['mouth_sum']['price'] }}/{{ $mouth['mouth_sum']['count'] }}笔</td>                                 
										<td> ￥{{ $mouth['mouth_fail']['price']?$mouth['mouth_fail']['price']:0 }}/{{ $mouth['mouth_fail']['count'] }}笔</td>
										<td> ￥{{ $mouth['mouth_success']['price'] }}/{{ $mouth['mouth_success']['count'] }}笔</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Tumblr</td>
										<td>David</td>                                
										<td><span class="label label-warning">在进行中</span></td>
										<td><span class="badge badge-danger">95%</span></td>
									</tr>
									<tr>
										<td>6</td>
										<td>Tesla</td>
										<td>Mickey</td>                                  
										<td><span class="label label-info">在进行中</span></td>
										<td><span class="badge badge-success">95%</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>											
				</div>
				<div class="clearfix"></div>
			</div>
			<!--//prograc-blocks_agileits-->
			<!-- /bottom_agileits_grids-->
			<div class="bottom_agileits_grids">
				<div class="col-md-4 profile-main">
					<div class="profile_bg_agile">
						<div class="profile-pic wthree">
							<h2>巴森杜雷尔</h2>
							<img src="/icoterie/images/profile.jpg" alt="Image"/>
							<p>网页设计师</p>
						</div>
						<div class="profile-ser">
							<div class="follow-grids-agileits-w3layouts">
								<div class="profile-ser-grids">
									<h3>粉丝</h3>
									<h4>2486</h4>
								</div>
								<div class="profile-ser-grids agileinfo">
									<h3>关注</h3>
									<h4>1582</h4>
								</div>
								<div class="profile-ser-grids no-border">
									<h3>评论</h3>
									<h4>1468</h4>
								</div>
								<div class="clearfix"> </div>
							</div>
							
							<div class="w3l_social_icons w3l_social_icons1">
								<ul>
									<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#" class="google_plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-8 chart_agile agile_info_shadow">
					<h3 class="w3_inner_tittle two">堆叠横条图</h3>
					<div id="chartdiv1"></div>	
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //bottom_agileits_grids-->
			<!-- /weather_w3_agile_info-->
			<div class="weather_w3_agile_info agile_info_shadow">
				<div class="weather_w3_inner_info">	      
					<div class="over_lay_agile">
						<h3 class="w3_inner_tittle">气象报告</h3>
						<ul>
							<li>
								<figure class="icons">
									<canvas id="partly-cloudy-day" width="60" height="60"></canvas>
								</figure>
								<h3>25 °C</h3>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="clear-day" width="60" height="60"></canvas>
								</figure>
								<div class="weather-text">
									<h4>WED</h4>
									<h5>27 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="snow" width="60" height="60"></canvas>
								</figure>
								<div class="weather-text">
									<h4>THU</h4>
									<h5>13 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="partly-cloudy-night" width="60" height="60"></canvas>
								</figure>
								<div class="weather-text">
									<h4>FRI</h4>
									<h5>18 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="cloudy" width="60" height="60"></canvas>
								</figure>
								<div class="weather-text">
									<h4>SAT</h4>
									<h5>15 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="fog" width="60" height="60"></canvas>
								</figure>
								<div class="weather-text">
									<h4>SUN</h4>
									<h5>11 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
						</ul>
					</div>
				</div>	
			</div>
			<!-- //weather_w3_agile_info-->
			<!-- /social_media-->
			<div class="social_media_w3ls">
				<div class="col-md-3 socail_grid_agile facebook">
                    <ul class="icon_w3_info">
						<li><a href="#" class="wthree_facebook"> <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li>脸谱网</li>
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
							<h4>乔</h4>
							<p>多尔莫尔 sit amet</p>
						</div>
						 <div class="clearfix"></div>
					</div>
                </div>
				<div class="col-md-3 socail_grid_agile twitter">
                    <ul class="icon_w3_info">
						<li><a href="#" class="wthree_facebook"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
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
							<p>多尔莫尔 sit amet</p>
						</div>
						<div class="clearfix"></div>
					</div>
                </div>
				<div class="col-md-3 socail_grid_agile gmail">
                    <ul class="icon_w3_info">
						<li><a href="#" class="wthree_facebook"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
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
							<p>多尔莫尔 sit amet</p>
						</div>
						<div class="clearfix"></div>
					</div>
                </div>
				<div class="col-md-3 socail_grid_agile dribble">
					<ul class="icon_w3_info">
						<li><a href="#" class="wthree_facebook"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
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
							<img src="/icoterie/images/a4.jpg" alt=""/>
						</div>
						<div class="col-md-8 agile_w3l_social_media_text">
							<h4>Honey Pal</h4>
							<p>多尔莫尔 sit amet</p>
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
@stop