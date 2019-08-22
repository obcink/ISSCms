<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台_登录</title>
	<link rel="stylesheet" type="text/css" href="{{ url('admin/css/style.css') }}">
	<script type="text/javascript" src="{{ url('admin/js/jquery-3.2.1.js') }}"></script>
	<script type="text/javascript" src="{{ url('admin/js/jss1.js') }}"></script>
</head>
<body >
	<div class="login">
		@if(session('msg'))<span id="lu"> {{ session('msg') }} </span>@endif
		<div class="hou"><i>后台管理系统</i></div>
		
		<div class="kuang1">
			<form class="kuang" action="{{ url('admin/login_icoterie') }}" method="post">
				{{ csrf_field() }}
				<p>用户登录</p>
				<input type="text" name="hj_username" placeholder="用户名" class="hu" />
				<input type="password" name="hj_password" placeholder="密码" class="mi" />
				<button>登录</button>
			</form>
		</div>
		{{--<div class="banq">版权所有 辉丰时代教育科技河北有限责任公司</div>--}}
	</div>
	
</body>
</html>