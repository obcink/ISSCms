
@extends('admin/head')
@section('content')
    <div class="addPages">

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

    <section id="hiddenDiv26">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li>修改权限</li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="pljobnum">
                <div class="allShow2">
                    <form action="{{ url('admin/permission/update/'.$data['id']) }}" method="post">
                        <ul class="information">
                            <!--添加新员工-->
                            <li>
                                <ul class="informationList">
                                    <!--姓名-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">权限名称：</p>
                                        <input class="goodsInput" id="epyg1" name="hj_name" value="{{ $data['hj_name'] }}" type="text" placeholder="">
                                    </li>
                                    <!--工号-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">权限描述：</p>
                                        <input style="width: 600px;" class="goodsInput" id="epyg2" name="hj_desc" type="text" value="{{ $data['hj_desc'] }}">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    {{ csrf_field() }}
                    <!--保存提交按钮-->
                        <div class="buttonDiv">
                            <input class="submitButton" type="submit" value="修改">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>
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