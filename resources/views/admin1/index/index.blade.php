@extends('admin/head')
@section('content')
    <style>
        .content_left_tow span{
           padding: 10px;
           text-align: center;
        }
        .content_left_tow {
            display: block;
            float: left;
        }
    </style>

    <div class="addPages">

        <section id="hiddenDiv013" style="display:block;">

            {{--<div class="header">--}}
                {{--<div style="display:inline-block; height:100px;">--}}
                    {{--<img src="{{ url('admin/images/fangwen.png') }}" alt=""></div>--}}
                {{--<div class="header_one">--}}
                    {{--<span>访问量</span>--}}
                {{--</div>--}}

                {{--<span class="header_tow">1</span>--}}


            {{--</div>--}}
            <div class="header">
                <div  style="display:inline-block; height:100px;">
                    <img style="width:60px;height:60px;margin-left: 15px;margin-top:20px;" src="{{ url('admin/images/zrdd.png') }}" alt=""></div>
                <div class="header_one">
                    <span>昨日订单</span>
                </div>

                <span class="header_tow">{{ $tom['tom_success']['count'] }}</span>


            </div>
            <div class="header">
                <div style="display:inline-block; height:100px;">
                    <img style="width:60px;height:60px;margin-left: 15px;margin-top: 20px;" src="{{ url('admin/images/zrxse.png') }}" alt=""></div>
                <div class="header_one">
                    <span>昨日销售额</span>
                </div>

                <span class="header_tow">1{{ $tom['tom_success']['price'] }}</span>


            </div>
            <div class="header">
                <div style="display:inline-block; height:100px;">
                    <img style="width:60px;height:60px;margin-left: 15px;margin-top: 20px;" src="{{ url('admin/images/zdd.png') }}" alt=""></div>
                <div class="header_one">
                    <span>总订单量</span>
                </div>

                <span class="header_tow">{{ $history['count'] }}</span>


            </div>
            <div class="header">
                <div style="display:inline-block; height:100px;">
                    <img style="width:60px;height:60px;margin-left: 15px;margin-top: 20px;" src="{{ url('admin/images/zxse.png') }}" alt=""></div>
                <div class="header_one">
                    <span>总销售额</span>
                </div>

                <span class="header_tow">{{ $history['price'] }}</span>
            </div>



            <div class="content">

                <div class="content_left">
                    <div class="content_left_one">
                        <img style="width:40px;height:40px; margin-left:30px;" src="{{ url('admin/icon/13.png') }}" alt="">
                        <span>智慧化小程序</span>
                    </div>

                    <div class="content_left_tow">
                        <img src="{{ url('admin/icon/22.jpg') }}" alt="">
                        <span>共享微信9亿用户让应用触手可及打造微信全生态</span>
                    </div>
                    <div class="content_left_tow">
                        <img src="{{ url('admin/icon/23.jpg') }}" alt="">
                        <span>链接更多的线下服务于线上用户拓展020行业</span>
                    </div>
                    <div class="content_left_tow">
                        <img src="{{ url('admin/icon/24.jpg') }}" alt="">
                        <span>用户无需安装用完即走，无需卸载降低用户使用门槛</span>
                    </div>
                    <div class="content_left_tow">
                        <img src="{{ url('admin/icon/25.jpg') }}" alt="">
                        <span>良好的用户体验与性能与原生APP无差异</span>
                    </div>

                </div>

                <div class="content_right">
                    <div class="content_right_one">

                    </div>
                    <img style="width:80%; margin-top: 40px; margin-left:15px; display:inline-block;" src="{{ url('admin/icon/21.jpg') }}" alt="">

                    <div class="content_right_tow">

                    </div>
                </div>

            </div>


            <div style="text-align: center" class="last">
                <span style="display: block; padding-bottom: 40px; font-size: 18px;">店铺交易金额统计</span>
                <table class="showTable" style="width:100%">
                    <tr>
                        <th>时间</th>
                        <th>新增订单金额/数量</th>
                        {{--<th>新增订单数量</th>--}}
                        <th>平均客单价</th>
                        <th>待付款订单金额/数量</th>
                        <th>已付款订单金额/数量</th>

                        <!-- <th>操作</th> -->
                    </tr>
                    <div class="container_hh">

                        <tr name="box_hh">
                            <!-- 序号 -->
                            <td>
                                昨天
                            </td>
                            <!--姓名-->
                            <td>

                                ￥{{ $tom['tom_sum']['price'] }}/{{ $tom['tom_sum']['count'] }}笔
                            </td>
                            {{--<!--头像-->--}}
                            {{--<td>--}}

                                {{--￥200--}}
                            {{--</td>--}}
                            <!--手机号-->
                            <td>

                                ￥{{ $tom['tom_avg'] }}
                            </td>
                            <!--银行卡号-->
                            <td>

                                ￥{{ $tom['tom_fail']['price']?$tom['tom_fail']['price']:0 }}/{{ $tom['tom_fail']['count'] }}笔
                            </td>
                            <!--所属站点-->
                            <td>
                                ￥{{ $tom['tom_success']['price'] }}/{{ $tom['tom_success']['count'] }}笔
                            </td>


                        </tr>
                        <tr name="box_hh">
                            <!-- 序号 -->
                            <td>
                                前天
                            </td>
                            <!--姓名-->
                            <td>

                                ￥{{ $yes['yes_sum']['price'] }}/{{ $yes['yes_sum']['count'] }}笔
                            </td>
                            {{--<!--头像-->--}}
                            {{--<td>--}}

                                {{--￥200--}}
                            {{--</td>--}}
                            <!--手机号-->
                            <td>
                                ￥{{ $yes['yes_avg'] }}
                            </td>
                            <!--银行卡号-->
                            <td>

                                ￥{{ $yes['yes_fail']['price']?$yes['yes_fail']['price']:0 }}/{{ $yes['yes_fail']['count'] }}笔
                            </td>
                            <!--所属站点-->
                            <td>
                                ￥{{ $yes['yes_success']['price'] }}/{{ $yes['yes_success']['count'] }}笔
                            </td>
                        </tr>
                        <tr name="box_hh">
                            <!-- 序号 -->
                            <td>
                                近7天
                            </td>
                            <!--姓名-->
                            <td>
                                ￥{{ $week['week_sum']['price'] }}/{{ $week['week_sum']['count'] }}笔
                            </td>
                        {{--<!--头像-->--}}
                        {{--<td>--}}

                        {{--￥200--}}
                        {{--</td>--}}
                        <!--手机号-->
                            <td>
                                ￥{{ $week['week_avg'] }}
                            </td>
                            <!--银行卡号-->
                            <td>

                                ￥{{ $week['week_fail']['price']?$week['week_fail']['price']:0 }}/{{ $week['week_fail']['count'] }}笔
                            </td>
                            <!--所属站点-->
                            <td>
                                ￥{{ $week['week_success']['price'] }}/{{ $week['week_success']['count'] }}笔
                            </td>
                        </tr>
                        <tr name="box_hh">
                            <!-- 序号 -->
                            <td>
                                近30天
                            </td>
                            <!--姓名-->
                            <td>
                                ￥{{ $mouth['mouth_sum']['price'] }}/{{ $mouth['mouth_sum']['count'] }}笔
                            </td>
                        {{--<!--头像-->--}}
                        {{--<td>--}}

                        {{--￥200--}}
                        {{--</td>--}}
                        <!--手机号-->
                            <td>
                                ￥{{ $mouth['mouth_avg'] }}
                            </td>
                            <!--银行卡号-->
                            <td>
                                ￥{{ $mouth['mouth_fail']['price']?$mouth['mouth_fail']['price']:0 }}/{{ $mouth['mouth_fail']['count'] }}笔
                            </td>
                            <!--所属站点-->
                            <td>
                                ￥{{ $mouth['mouth_success']['price'] }}/{{ $mouth['mouth_success']['count'] }}笔
                            </td>
                        </tr>

                    </div>
                </table>

                {{--<span>店铺交易数统计</span>--}}
                {{--<table class="showTable" style="width:100%">--}}
                    {{--<tr>--}}
                        {{--<th>时间</th>--}}
                        {{--<th>已完成订单数量</th>--}}
                        {{--<th>待付款订单数量</th>--}}
                        {{--<th>待发货订单数量</th>--}}
                        {{--<th>已发货订单数量</th>--}}
                        {{--<th>已取消订单数量</th>--}}

                        {{--<!-- <th>操作</th> -->--}}
                    {{--</tr>--}}
                    {{--<div class="container_hj">--}}

                        {{--<tr name="box_hj">--}}
                            {{--<!-- 序号 -->--}}
                            {{--<td>--}}
                                {{--昨天--}}
                            {{--</td>--}}
                            {{--<!--姓名-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--头像-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--手机号-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--银行卡号-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--所属站点-->--}}
                            {{--<td>--}}
                                {{--1笔--}}
                            {{--</td>--}}


                        {{--</tr>--}}
                        {{--<tr name="box_hj">--}}
                            {{--<!-- 序号 -->--}}
                            {{--<td>--}}
                                {{--前天--}}
                            {{--</td>--}}
                            {{--<!--姓名-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--头像-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--手机号-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--银行卡号-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--所属站点-->--}}
                            {{--<td>--}}
                                {{--1笔--}}
                            {{--</td>--}}


                        {{--</tr>--}}
                        {{--<tr name="box_hj">--}}
                            {{--<!-- 序号 -->--}}
                            {{--<td>--}}
                                {{--近7天--}}
                            {{--</td>--}}
                            {{--<!--姓名-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--头像-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--手机号-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--银行卡号-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--所属站点-->--}}
                            {{--<td>--}}
                                {{--1笔--}}
                            {{--</td>--}}


                        {{--</tr>--}}
                        {{--<tr name="box_hj">--}}
                            {{--<!-- 序号 -->--}}
                            {{--<td>--}}
                                {{--近30天--}}
                            {{--</td>--}}
                            {{--<!--姓名-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--头像-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--手机号-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--银行卡号-->--}}
                            {{--<td>--}}

                                {{--1笔--}}
                            {{--</td>--}}
                            {{--<!--所属站点-->--}}
                            {{--<td>--}}
                                {{--1笔--}}
                            {{--</td>--}}


                        {{--</tr>--}}

                    {{--</div>--}}
                {{--</table>--}}

            </div>
        </section>
    </div>
    <script>
      	$('.navListLi:first-child').css('height','50px');
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        //$('.navListLi:last-child').css('height','50px');
    </script>
@stop