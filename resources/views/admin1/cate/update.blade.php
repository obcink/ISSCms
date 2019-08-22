
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
            <li>修改商品分类</li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/cate/update/'.$data['id']) }}" method="post">
                    {{ csrf_field() }}
                    <div class="rightDiv">
                        <p class="rightTitle">修改商品分类</p>
                        <div class="rightText">
                            <p class="textTitle">分类名称：</p>
                            <input class="textInput" id="goodsClass" value="{{ $data['hj_name'] }}" name="hj_name" type="text" placeholder="请填写分类名称">
                        </div>
                        <input type="submit" class="submit" id="addButton2" value="修改">
                    </div>
                </form>
            </div>
        </div>
        </section>
    </div>
    <script>
        $('.navListLi:first-child').css('height','50px');
      	$('.navListLi:nth-child(2)').css('height','50px');
      	//$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
    </script>
@stop