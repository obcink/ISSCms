
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
            <li><a href="{{ url('admin/coupon/index') }}">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改优惠券</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/coupon/update/'.$data['id']) }}" method="post">
                    {{ csrf_field() }}
                    <ul class="information">
                        <!--添加优惠券-->
                        <li>
                            <ul class="informationList">
                                <!--优惠券名称-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">优惠券名称：</p>
                                    <input class="goodsInput" id="coming" name="hj_name" value="{{ $data['hj_name'] }}" type="text" placeholder="">
                                </li>
                                <!--使用权限-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">优惠券类型：</p>
                                    <input  id="cotiao" @if($data['hj_type'] == '1') checked @endif value="1" name="hj_type" type="radio" placeholder="">普通优惠券
                                    <input  id="cotiao" @if($data['hj_type'] == '2') checked @endif value="2" name="hj_type" type="radio" placeholder="">首单立减优惠券
                                    <input  id="cotiao" @if($data['hj_type'] == '3') checked @endif value="3" name="hj_type" type="radio" placeholder="">周年活动优惠券
                                </li>
                                <!--使用条件-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">使用条件：</p>
                                    满 <input class="goodsInput" id="cotiao" name="hj_rule" value="{{ $data['hj_rule'] }}" type="text" placeholder=""> 元使用
                                </li>
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">抵用金额：</p>
                                    <input class="goodsInput" id="cotiao" name="hj_price" value="{{ $data['hj_price'] }}" type="text" placeholder=""> 元
                                </li>
                                <!--发放数量-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">发放数量：</p>
                                    <input class="goodsInput" id="cofa" name="hj_number" type="text" value="{{ $data['hj_number'] }}" placeholder=""> 张
                                </li>
                                <!--每人限领-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">每人总共限领：</p>
                                    <input class="goodsInput" id="coren" name="hj_receive_people" value="{{ $data['hj_receive_people'] }}" type="text" placeholder=""> 张
                                </li>
                                <!--每天限领-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">每人每天限领：</p>
                                    <input class="goodsInput" id="cotian" name="hj_receive_day" value="{{ $data['hj_receive_day'] }}" type="text" placeholder=""> 张
                                </li>
                                <!--有效期限-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ">领取截止日期：</p>
                                    <input class="goodsInput" id="cojieshu" name="hj_end_time" value="{{ date('Y-m-d',$data['hj_end_time']) }}" type="date" placeholder="2018/06/09">
                                </li>
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ">自领取之日起：</p>
                                    <input class="goodsInput" id="cojieshu" name="hj_time" value="{{ $data['hj_time'] }}" type="text" placeholder=""> 天失效
                                </li>
                                <!--是否发放到领券中心-->
                                <li>
                                    <p class="goodsTextTitle">是否发放到领券中心:</p>
                                    <div id="cter1" style="display:inline-block;" class="@if($data['hj_status'] == 1) open1 @else close1 @endif">
                                        <div id="cter2" onclick="aaa()" class="@if($data['hj_status'] == 1) open2 @else close2 @endif">
                                            <input type="hidden" name="hj_status" value="{{ $data['hj_status'] }}">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!--保存提交按钮-->
                    <div class="buttonDiv">
                        <input class="submitButton" type="submit" value="保存提交">
                    </div>
                </form>
            </div>
        </div>
        </section>
    </div>
    <script>
        function abc() {
            if ($('#gmsp1').attr('class') == 'close1' || $('#gmsp1').attr('class') == ' close1 ') {
                $('#gmsp1').attr('class','open1');
                $('#gmsp2').attr('class','open2');
                $('#gmsp2').append('<input type="hidden" name="hj_power[]" value="1" />');

            } else if($('#gmsp1').attr('class') == 'open1' || $('#gmsp1').attr('class') == ' open1 ') {
                $('#gmsp1').attr('class','close1');
                $('#gmsp2').attr('class','close2');
                $('#gmsp2 input').remove();

            }
        }

        function bca() {
            if($('#gmxck1').attr('class') == 'close1' || $('#gmxck1').attr('class') == ' close1 ') {
                $('#gmxck1').attr('class','open1');
                $('#gmxck2').attr('class','open2');
                $('#gmxck2').append('<input type="hidden" name="hj_power[]" value="2" />');

            } else if($('#gmxck1').attr('class') == 'open1' || $('#gmxck1').attr('class') == ' open1 ') {
                $('#gmxck1').attr('class','close1');
                $('#gmxck2').attr('class','close2');
                $('#gmxck2 input').remove();

            }

        }

        function cba() {
            if($('#xfxc1').attr('class') == 'close1' || $('#xfxc1').attr('class') == ' close1 ') {
                $('#xfxc1').attr('class','open1');
                $('#xfxc2').attr('class','open2');

                $('#xfxc2').append('<input type="hidden" name="hj_power[]" value="3" />');
            } else if($('#xfxc1').attr('class') == 'open1' || $('#xfxc1').attr('class') == ' open1 ') {
                $('#xfxc1').attr('class','close1');
                $('#xfxc2').attr('class','close2');
                $('#xfxc2 input').remove();

            }

        }

        function aaa() {

            if($('#cter1').attr('class') == 'open1' || $('#cter1').attr('class') == ' open1 ') {
                $('#cter1').attr('class','close1');
                $('#cter2').attr('class','close2');
                $('#cter2 input').attr('value','0');

            }
            else if($('#cter1').attr('class') == 'close1' || $('#cter1').attr('class') == ' close1 ') {
                $('#cter1').attr('class','open1');
                $('#cter2').attr('class','open2');
                $('#cter2 input').attr('value','1');

            }
        }
    </script>
    <script>
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','');
    </script>
@stop