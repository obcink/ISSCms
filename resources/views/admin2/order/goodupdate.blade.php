
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
            <li><a href="javascript:history.back(-1);">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">编辑订单</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/order/goodupdate/'.$data['id']) }}" method="post">
                    {{ csrf_field() }}
                    <div class="rightDiv" style="height: 300px;">
                        <p class="rightTitle">订单编号</p>
                        <div class="rightText">
                            <input class="textInput" disabled id="goodsClass" value="{{ $data['hj_number'] }}" name="hj_number" type="text">
                        </div>


                        <p class="rightTitle">退款金额</p>
                        <div class="rightText">
                            <input class="textInput" id="goodsClass"  name="hj_refund" type="text">
                        </div>


                        <p class="rightTitle">备注</p>
                        <div class="rightText">
                            <input class="textInput" id="goodsClass"  name="hj_content" type="text">
                        </div>

                    </div>
                    <input type="submit" class="submit" id="addButton2" value="修改">
                </form>
            </div>
        </div>
        </section>
    </div>
    <script>
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','50px');
        $('.navListLi:nth-child(10)').css('height','');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop