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
            <li><a href="{{ url('admin/card/index') }}">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">回收卡券</a></li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
			<div class="tab-pane fade in active" id="cadsd2">
                <div class="allShow2">
                    <form action="{{ url('admin/card/recover/'.$usercard[0]['id']) }}" method="post">

                        {{ csrf_field() }}
                        <ul class="information">
                            <!--添加优惠券-->
                            <li>
                                <ul class="informationList">
                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">回收卡券：</p>
                                        <select name="hj_card_id" class="link" id="coatChose4">
                                            @foreach($usercard as $v)
                                                <option value="{{ $v['hj_card_id'] }}">{{ $v['hj_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                  	<li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">回收账号：</p>
                                        <select name="hj_user_id" class="link" id="coatChose4">
                                            @foreach($usercard as $v)
                                                <option value="{{ $v['hj_user_id'] }}">{{ $v['hs_user_name'] }} - {{ $v['hs_username'] }}</option>
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
                                      	@foreach($usercard as $v)
                                        <input class="goodsInput" id="lorr6" name="hj_grant_number" type="text" placeholder=""  value="{{ $v['hj_card_rem'] }}"> 张
                                      	@endforeach
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
                            <input class="submitButton" type="submit" value="发放洗车卡">
                        </div>
                    </form>
                </div>
            </div>
			
        </div>
    </section>
</div>

<script>
    function dele() {
        $("#price").hide();
    }
    function add() {
        $("#price").show();
    }
</script>
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