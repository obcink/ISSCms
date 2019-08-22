
@extends('admin/head')
@section('content')
    <div class="addPages">

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

    <section id="hiddenDiv26">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li><a href="javascript:history.back(-1);">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改VIP客户</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/vip/update/'.$data['id']) }}" method="post">
                    <ul class="information">
                        <!--添加大客户-->
                        <li>
                            <ul class="informationList">
                                <!--姓名-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">姓名：</p>
                                    <input class="goodsInput" id="clt1" name="hj_username" value="{{ $data['hj_username'] }}" type="text" placeholder="">
                                </li>
                                <!--手机号-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">手机号：</p>
                                    <input class="goodsInput" id="clt2" name="hj_phone" value="{{ $data['hj_phone'] }}" type="text" placeholder="">
                                </li>
                                {{--<li style="height:50px;">--}}
                                    {{--<span class="tigDiv"></span>--}}
                                    {{--<p class="goodsTextTitle ddqq">所属站点：</p>--}}
                                    {{--<select name="hj_siteid" class="link" id="coatChose4">--}}
                                        {{--@foreach($store as $v)--}}
                                            {{--<option @if($v['id'] == $data['hj_siteid']) selected @endif value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</li>--}}

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