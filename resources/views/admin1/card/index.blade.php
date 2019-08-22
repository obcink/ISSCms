@extends('admin/head')
@section('content')

<div class="addPages">
<!-------------------引入页面------------------->
    <!-------我的账号------->

    <script src="{{ url('admin/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.js') }}"></script>
    <!--layer插件-->
    <script src="{{ url('admin/layer/layer.js') }}"></script>

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

    <section id="hiddenDiv24" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li class="active "><a href="#icoterie_list" data-toggle="tab">卡券列表</a></li>
            <li><a href="#icoterie_issue" data-toggle="tab">卡券设置</a></li>
            <li><a href="#icoterie_exclusive" data-toggle="tab">发放专属卡券</a></li>
          	<li><a href="#icoterie_staff" data-toggle="tab">发放员工卡券</a></li>
			<li><a href="#icoterie_member" data-toggle="tab">发放会员卡券</a></li>
            <li><a href="{{ url('admin/card/list') }}">卡券发放记录</a></li>
           	<li><a href="{{ url('admin/card/clist') }}">卡券使用情况</a></li>

        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="icoterie_list">
                <!--洗车卡发放记录-->
                <div class="allShow2">
                    <table class="showTable">
                        <tbody>
							<tr>
								<th>序号</th>
								<th>卡券名称</th>
								<th>卡券类型</th>
								<th>卡券用途</th>
								<th>合作商家</th>
								<th>联系人名</th>
								<th>联系电话</th>
								<th>卡券售价</th>
								<th>创建日期</th>
								<th>操作</th>
							</tr>
							@foreach($card as $v)
							<tr>
								 <td>{{ $v['id'] }}</td>
								<td>{{ $v['name'] }}</td>
								<td>@if($v['mold']  == 0) 普通卡 @else 专属卡 @endif</td>
								<td>@if($v['type']  == 0) 全部 @elseif($v['type']  == 1) 商品 @elseif($v['type']  == 2) 洗车 @else 加油 @endif</td>
								<td>{{ $v['corporate'] }}</td>
								<td>{{ $v['contact_name'] }}</td>
								<td>{{ $v['contact_phone'] }}</td>
								<td>{{ $v['price'] }}</td>
								<td> {{ date('Y-m-d', $v['create_time']) }}</td>
								<!--操作-->
								<td>
									<p class="delete"><a href="{{ url('admin/card/update/'.$v['id']) }}">编辑</a></p>
									<p class="delete"><a href="{{ url('admin/card/del/'.$v['id']) }}">停用</a></p>
								</td>
							</tr>
							@endforeach
                        </tbody>
					</table>
                    <div>{{ $card->links() }}</div>
                </div>
            </div>
            <!--发放洗车卡-->
            <div class="tab-pane fade" id="icoterie_issue">
                <div class="allShow2">
                    <form action="{{ url('admin/card/add') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--添加优惠券-->
                            <li>
                                <ul class="informationList">
                                    <!--名称-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">卡券名称：</p>
                                        <input class="goodsInput" id="lorr1" name="name" type="text" placeholder="">
                                    </li>
									<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">卡券用途：</p>
                                        <select name="type" class="link" id="coatChose4">
                                            <option value="0">全套</option>
											<option value="1">商品</option>
											<option value="2">洗车</option>
											<option value="3">加油</option>
										</select>
                                    </li>

                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">合作商家：</p>
                                        <select name="cid" class="link" id="coatChose4">
                                            @foreach($company as $v)
                                                <option value="{{ $v['id'] }}">{{ $v['simple'] }}</option>
                                            @endforeach
										</select>
                                    </li>

                                    <!--状态-->
                                    <li style="height:50px;">
                                        <p class="goodsTextTitle ddqq">状态：</p>
                                        <div id="sttt1" style="display:inline-block;" class="open1">
                                            <div onclick="abc()" id="sttt2" class="open2">
                                                <input type="hidden" name="status" value="1">
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <!--售价-->
                                    <li id="price" style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">售价：</p>
                                        <input class="goodsInput" id="lorr3" name="price" type="text" placeholder=""> 元
                                    </li>
                                   
                                    <li>
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle">封面图：<span class="tigText">上传1张图片，建议大小：最大200KB。</span></p>
                                        <div class="goodsImgDiv" id="aaa0">
                                            <img class="picture2" src="{{ url('admin/images/picture.jpg') }}" alt="">
                                            <input class="fileButton2" onclick="bcd(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                            <input type="hidden" name="backdrop" id="goods_thumb0" value="">
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!--保存提交按钮-->
                        <div class="buttonDiv">
                            <input class="submitButton" type="submit" value="发行卡券">
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="icoterie_exclusive">
                <div class="allShow2">
                    <form action="{{ url('admin/card/fafang') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--添加优惠券-->
                            <li>
                                <ul class="informationList">
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">发放卡券：</p>
                                        <select name="hj_card_id" class="link" id="coatChose4">
                                            @foreach($usercard as $v)
                                                <option value="{{ $v['fid'] }}">{{ $v['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <!--服务项目-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">专属用户：</p>
                                        <select name="hj_grant_user_id" class="link" id="coatChose4">
											<option value=""></option>
                                            @foreach($user as $v)
                                                <option value="{{ $v['id'] }}">{{ $v['hj_contact_phone'] }} - {{ $v['hj_username'] }} - {{ $v['hj_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                <!--限量张数-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">发放数量：</p>
                                        <input class="goodsInput" id="lorr6" name="hj_grant_number" type="text" placeholder=""> 张
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">到期时间：(默认一个月)</p>
                                        <input class="goodsInput" id="lorr6" name="hj_pay_time" type="date" placeholder="">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!--保存提交按钮-->
                        <div class="buttonDiv">
                            <input class="submitButton" type="submit" value="发放卡券">
                        </div>
                    </form>
                </div>
            </div>
			<div class="tab-pane fade" id="icoterie_staff">
                <div class="allShow2">
                    <form action="{{ url('admin/card/fafang') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--添加优惠券-->
                            <li>
                                <ul class="informationList">
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">发放卡券：</p>
                                        <select name="hj_card_id" class="link" id="coatChose4">
                                            @foreach($usercard as $v)
                                                <option value="{{ $v['fid'] }}">{{ $v['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <!--服务项目-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">员工用户：</p>
                                        <select name="hj_grant_user_id" class="link" id="coatChose4">
											<option value=""></option>
                                            @foreach($staff as $v)
                                                <option value="{{ $v['id'] }}">{{ $v['hj_phone'] }} - {{ $v['hj_username'] }} - {{ $v['hj_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                <!--限量张数-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">发放数量：</p>
                                        <input class="goodsInput" id="lorr6" name="hj_grant_number" type="text" placeholder=""> 张
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">到期时间：(默认一个月)</p>
                                        <input class="goodsInput" id="lorr6" name="hj_pay_time" type="date" placeholder="">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!--保存提交按钮-->
                        <div class="buttonDiv">
                            <input class="submitButton" type="submit" value="发放卡券">
                        </div>
                    </form>
                </div>
            </div>
			<div class="tab-pane fade" id="icoterie_member">
                <div class="allShow2">
                    <form action="{{ url('admin/card/fafang') }}" method="post">
                        {{ csrf_field() }}
                        <ul class="information">
                            <!--添加优惠券-->
                            <li>
                                <ul class="informationList">
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">发放卡券：</p>
                                        <select name="hj_card_id" class="link" id="coatChose4">
                                            @foreach($usercard as $v)
                                                <option value="{{ $v['fid'] }}">{{ $v['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <!--服务项目-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">会员用户：</p>
                                        <select name="hj_grant_user_id" class="link" id="coatChose4">
											
											<option value=""></option>
                                            @foreach($member as $v)
                                                <option value="{{ $v['id'] }}">{{ $v['hj_phone'] }} - {{ $v['hj_username'] }} - {{ $v['hj_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                <!--限量张数-->
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">发放数量：</p>
                                        <input class="goodsInput" id="lorr6" name="hj_grant_number" type="text" placeholder=""> 张
                                    </li>
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">到期时间：(默认一个月)</p>
                                        <input class="goodsInput" id="lorr6" name="hj_pay_time" type="date" placeholder="">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!--保存提交按钮-->
                        <div class="buttonDiv">
                            <input class="submitButton" type="submit" value="发放卡券">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function abc() {
        if ($('#sttt1').attr('class') == 'open1') {
            $('#sttt1').attr('class','close1');
            $('#sttt2').attr('class','close2');
            $('#sttt2 input').attr('value','0');

        } else if($('#sttt1').attr('class') == 'close1') {
            $('#sttt1').attr('class','open1');
            $('#sttt2').attr('class','open2');
            $('#sttt2 input').attr('value','1');
        }
    }
</script>

<script type="text/javascript">
    function bcd(index) {
        $("input[data = 'data"+index+"']").change(function () {
            uploadImage(index);
        });
    };
    function uploadImage(id) {
        // 判断是否有选择上传文件
        var imgPath = $("input[data = 'data"+id+"']").val();
        if (imgPath == "") {
            alert("请选择上传图片！");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'bmp') {
            alert("请选择图片文件");
            return;
        }
        var formData = new FormData();
        formData.append('file_upload',$("input[data = 'data"+id+"']")[0].files[0]);
        formData.append('_token',"{{ csrf_token() }}");
//        console.log(formData);
        $.ajax({
            type: "POST",
            url: "{{ url('/admin/card/upload') }}",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#goods_thumb'+id).val(data);
                $('#aaa'+id).append('<img style="position: absolute; left: 5px; top: 5px; width: 80px; height: 80px;" src="'+ data +'"/>');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }
</script>

<script>
   $('.navListLi:first-child').css('height','50px');
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	//$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
</script>
@stop