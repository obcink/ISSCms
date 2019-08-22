
@extends('admin/head')
@section('content')
    <div class="addPages">
        <div class="title"><a style="padding-right: 20px;" href="{{ url('admin/user/index') }}">返回上一步</a>添加管理用户</div>

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

        <form action="{{ url('admin/user/add') }}" method="post">
            {{ csrf_field() }}
            <ul class="list">
                <li>
                    <p class="text">输入用户名：</p>
                    <input class="input" id="pwd" name="hj_username" type="text" placeholder="请输入用户名">
                    <p class="error" id="error1"></p>
                </li>
                <li>
                    <p class="text">输入密码：</p>
                    <input class="input" id="pwd1" name="hj_password" type="password" placeholder="请输入密码">
                    <p class="error" id="error2">* 必须为字母或数字，且长度不小于6位</p>
                </li>
                <li>
                    <input class="button" id="submit" type="submit" value="确认">
                </li>
            </ul>
        </form>
    </div>
    <script>
        $('.navListLi:first-child').css('height','50px');
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        //$('.navListLi:last-child').css('height','50px');
    </script>
@stop