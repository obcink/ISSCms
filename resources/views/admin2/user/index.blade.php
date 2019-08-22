@extends('admin/head')
@section('content')

<div class="addPages">

    <section id="hiddenDiv">
        <p class="title1">账号管理 <a style="padding-left: 20px;" href="{{ url('admin/user/add') }}">添加账号</a>

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
        <div class="allShow2">
        	{{--<p class="goodsTextTitle">平台开关</p>--}}
			{{--<div id="pinai1" style="display:inline-block;" class="open1">--}}
				{{--<div id="pinai2" class="open2"></div>--}}
			{{--</div>--}}
            <table style="margin-top:20px;" class="showTable">
                <tr>
                  	<th>用户ID</th>
                    <th>用户名</th>
                    <th>修改密码</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
              	
                <tr>
                  	<td>
                         <p>{{ $v['id'] }}</p>
                   </td>
                    <!--姓名-->
                    <td style="width: 300px">
                        <form action="{{ url('admin/user/update/'.$v['id']) }}" method="post">
                            <input class="moneyNumber1" type="text" name="hj_username" value="{{ $v['hj_username'] }}" >
                            <span class="moneyButton" style="display: block;" onclick="oChangeNone(this)">修改</span>
                            <input class="moneyButton" type="submit" style="display: none" value="确定">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </td>
                    <!--修改密码-->
                    <td>
                        <a href="{{ url('admin/user/updatepwd/'.$v['id']) }}"><p class="modify">修改密码</p></a>
                    </td>
                    <td>
                        <a href="{{ url('admin/user/del/'.$v['id']) }}"><p class="modify">删除</p></a>
                        <a href="{{ url('admin/user/auth/'.$v['id']) }}"><p class="modify">授权</p></a>
                    </td>
                </tr>
                    @endforeach
            </table>
        </div>
    </section>
    <!--账号管理-->
</div>
<script>
    $('.navListLi:nth-child(2)').css('height','');
    $('.navListLi:nth-child(3)').css('height','50px');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>
@stop