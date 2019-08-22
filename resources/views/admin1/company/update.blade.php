
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
            <li><a href="{{ url('admin/company/index') }}">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改企业</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/company/update/'.$data['id']) }}" method="post">
						<ul class="information">
                            <!--产品信息-->
                            <li>
                                <ul class="informationList">
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">企业字号：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="simple" type="text" placeholder="请输入简称"  value="{{ $data['simple'] }}">
									</li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">企业全称：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="corporate" type="text" placeholder="请输入全称"  value="{{ $data['corporate'] }}">
                                    </li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">企业关系：</p>
                                        <select name="type" class="link" id="coatChose4">
                                            <option @if($data['type'] == 1) selected @endif value="1">平台自营</option>
											<option @if($data['type'] == 2) selected @endif value="2">合作入驻</option>
                                        </select>
                                    </li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">信用代码：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="credit" type="text" placeholder="请输入统一社会信用代码"  value="{{ $data['credit'] }}">
									</li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">联系人名：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="contact_name" type="text" placeholder="请输入法人全名"  value="{{ $data['contact_name'] }}">
                                    </li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">联系电话：</p>
                                        <input class="goodsInput" id="doorInput1" maxlength="10" name="contact_phone" type="text" placeholder="请输入法人电话"  value="{{ $data['contact_phone'] }}">
                                    </li>
									                                    
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">卡券规则：</p>
                                        <select name="rid" class="goodsTextTitle" id="coatChose4">
                                            @foreach($integral as $v)
                                            <option @if($data['rid'] == 1) selected @endif value="{{ $v['id'] }}">{{ $v['worth'] }}/1</option>
                                            @endforeach
                                        </select>
                                    </li>
                                </ul>
                            </li>
                            
                            <!--门店简介-->
                            <li>
                                <p class="vipTitle">企业简介</p>
                                <textarea class="textShow" name="remarks" id="jianjie" placeholder="请输入简介 ">{{ $data['remarks'] }}</textarea>
                            </li>
                        </ul>
						<div class="buttonDiv">
                            <input class="submitButton" type="submit" value="保存提交">
                        </div>
                </form>
            </div>
        </div>
        </section>
    </div>
    <script>
        $('.navListLi:first-child').css('height','50px');
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	//$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
    </script>
@stop