
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
            <li><a href="{{ url('admin/staff/index') }}">返回上一页</a></li>
            <li class="active "><a data-toggle="tab">修改员工</a></li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="" id="pljobnum">
                <div class="allShow2">
                    <form action="{{ url('admin/staff/update/'.$data['id']) }}" method="post">
                        <ul class="information">
                            <!--添加新员工-->
                            <li>
                                <ul class="informationList">
                                    <!--姓名-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">姓名：</p>
                                        <input class="goodsInput" id="epyg1" name="hj_name" value="{{ $data['hj_name'] }}" type="text" placeholder="">
                                    </li>
                                    <!--工号-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">工号：</p>
                                        <input class="goodsInput" id="epyg2" name="hj_number" value="{{ $data['hj_number'] }}" type="text" placeholder="">
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">手机号：</p>
                                        <input class="goodsInput" id="epyg2" name="hj_phone" value="{{ $data['hj_phone'] }}" type="text" placeholder="">
                                    </li>
                                    <!--所属站点-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">所属站点：</p>
                                        <select name="hj_siteid" class="link" id="coatChose4">
                                            @foreach($store as $v)
                                                    <option @if($v['fid'] == $data['hj_siteid']) selected @endif value="{{ $v['fid'] }}">{{ $v['alias_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                  	<!--所属站点-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">员工岗位：</p>
                                        <select name="str_id" class="link" id="coatChose5">
                                            @foreach($structure as $v)
                                                    <option @if($v['id'] == $data['str_id']) selected @endif value="{{ $v['id'] }}">{{ $v['job'] }}</option>
                                            @endforeach
                                        </select>
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
        $('.navListLi:first-child').css('height','50px');
      	//$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
    </script>
@stop