
@extends('admin/head')
@section('content')
    <div class="addPages">
    <section id="hiddenDiv26">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li><a href="{{ url('admin/car/index') }}">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改大客户</a></li>
        </ul>
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
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/big/update/'.$data['id']) }}" method="post">
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
                                <!--车牌号-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">车牌号：</p>
                                    <input class="goodsInput" id="clt3" name="hj_carnum" value="{{ $data['hj_carnum'] }}" type="text" placeholder="多个车牌号可用逗号隔开">
                                </li>
                                <!--大客户单位-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">大客户单位：</p>
                                    <select name="hj_cate_id" id="">
                                        @foreach($cate as $v)
                                            <option @if($v['id'] == $data['hj_cate_id']) selected @endif value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                        </li>
                    </ul>
                {{ csrf_field() }}
                <!--保存提交按钮-->
                    <div class="buttonDiv">
                        <input class="submitButton" type="submit" value="添加">
                    </div>
                </form>
            </div>
        </div>
        </section>
    </div>
    <script>
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop