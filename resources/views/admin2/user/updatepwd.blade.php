
@extends('admin/head')
@section('content')
    <div class="addPages">
<section id="hiddenDiv2">
    <div class="title"><a style="padding-right: 20px;" href="{{ url('admin/user/index') }}">返回上一步</a>修改登录密码 @if(session('msg'))<span style="padding-left: 20px;"> {{ session('msg') }} </span>@endif</div>
    <form action="{{ url('admin/user/updatepwd/'.session('user')['id']) }}" method="post">
        {{ csrf_field() }}
        <ul class="list">
            <li>
                <p class="text">输入旧密码：</p>
                <input class="input" id="pwd" name="hj_password" type="password" placeholder="请输入旧密码">
                <p class="error" id="error1"></p>
            </li>
            <li>
                <p class="text">输入新密码：</p>
                <input class="input" id="pwd1" name="hj_newpassword" type="password" placeholder="请输入新密码">
                <p class="error" id="error2">* 必须为字母或数字，且长度不小于6位</p>
            </li>
            <li>
                <p class="text">确认密码：</p>
                <input class="input" id="pwd2" name="hj_repassword" type="password" placeholder="确认密码">
                <p class="error" id="error3"></p>
            </li>
            <li>
                <input class="button" id="submit" type="submit" value="确认">
            </li>
        </ul>
    </form>
</section>
    </div>
    <script>
        $('.navListLi:nth-child(2)').css('height','');
        $('.navListLi:nth-child(3)').css('height','50px');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop