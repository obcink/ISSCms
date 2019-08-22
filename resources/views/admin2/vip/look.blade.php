@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

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

    <section id="hiddenDiv29" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li><a href="javascript:history.back(-1);">返回上一页</a></li>
            <li class="active "><a href="#bigct" data-toggle="tab">{{ $user['hj_contact_name'] }}用户的所有车牌号</a></li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="bigct">
                <!--大客户列表-->
                <div class="allShow2">
                    <table class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>联系人姓名</th>
                            <th>车牌号</th>
                            <th>操作</th>
                        </tr>
                        @foreach($car as $k=>$v)
                        <tr>
                            <!--序号-->
                            <td>
                                {{ $k }}
                            </td>
                            <!--姓名-->
                            <td>
                                {{ $user['hj_username'] }}
                            </td>
                            <td>
                                {{ $v }}
                            </td>
                            <!--操作-->
                            <td>
                                <p class="delete"><a href="{{ url('admin/vip/cardel?car='.$k.'&uid='.$user['id']) }}">删除</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $('.navListLi:nth-child(2)').css('height','50px');
    $('.navListLi:nth-child(3)').css('height','');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>
@stop