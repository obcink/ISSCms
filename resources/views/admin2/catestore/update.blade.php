
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
            <li><a href="{{ url('admin/catestore/index') }}">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改门店分类</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/catestore/update/'.$data['id']) }}" method="post">
                    <div class="rightDiv">
                        <p class="rightTitle">修改门店分类</p>
                        {{ csrf_field() }}
                        <div class="rightText">
                            <p class="textTitle">分类名称：</p>
                            <input class="textInput" id="doorClass" name="hj_name" value="{{ $data['hj_name'] }}" type="text" placeholder="请填写分类名称">
                        </div>
                        <input type="submit" class="submit" id="addDoor" value="修改">
                    </div>
                </form>
            </div>
        </div>
        </section>
    </div>
    <script>
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop