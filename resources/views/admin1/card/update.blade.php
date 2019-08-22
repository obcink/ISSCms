
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
            <li><a href="{{ url('admin/card/index') }}">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改卡</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/card/update/'.$data['id']) }}" method="post">
                    {{ csrf_field() }}
                    <ul class="information">
                        <!--添加优惠券-->
                        <li>
                            <ul class="informationList">
                                <!--名称-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">名称：</p>
                                    <input class="goodsInput" id="lorr1" name="name" value="{{ $data['name'] }}" type="text" placeholder="">
                                </li>
								
								<li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">卡类型：</p>
                                    <input type="radio" onclick="add()" @if($data['mold'] == 0)  checked  @endif name="mold" value="0">普通卡
                                    <input type="radio" onclick="dele()" @if($data['mold'] == 1) checked  @endif name="mold" value="1">专属卡
                                </li>
								
                                <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">卡券用途：</p>
                                        <select name="type" class="link" id="coatChose4">
                                            <option @if($data['type'] == 0) selected @endif value="0">全套</option>
											<option @if($data['type'] == 1) selected @endif value="1">商品</option>
											<option @if($data['type'] == 2) selected @endif value="2">洗车</option>
											<option @if($data['type'] == 3) selected @endif value="3">加油</option>
										</select>
                                    </li>

                                    <li style="height:50px;">
                                        <span class="tigDiv"></span>
                                        <p class="goodsTextTitle ddqq">合作商家：</p>
                                        <select name="cid" class="link" id="coatChose4">
                                            @foreach($company as $v)
                                                <option @if($data['cid'] == $v['id']) selected @endif value="{{ $v['id'] }}">{{ $v['simple'] }}</option>
                                            @endforeach
										</select>
                                    </li>

                                    <!--状态-->
                                <li style="height:50px;">
                                    <p class="goodsTextTitle ddqq">状态：</p>
                                    <div id="sttt1" style="display:inline-block;" class="@if($data['line_up_status'] == 'on') open1 @else close1 @endif">
                                        <div onclick="abc()" id="sttt2" class="@if($data['line_up_status'] == 'on') open2 @else close2 @endif">
                                            <input type="hidden" name="line_up_status" value="{{ $data['line_up_status'] }}">
                                        </div>
                                    </div>
                                </li>
                                    
                                    <!--售价-->
                                <li id="price" style="height:50px;display: @if($data['mold'] == 1) none @endif;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">售价：</p>
                                    <input class="goodsInput" id="lorr3" value="{{ $data['price'] }}" name="price" type="text" placeholder=""> 元
                                </li>
                                
                                
                                <li style="height:50px;display: @if($data['mold'] == 1) none @endif;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">封面图：<span class="tigText">上传1张图片，建议大小：最大200KB。</span></p>
                                    <div class="goodsImgDiv" id="aaa0">
                                        <img class="picture2" src="{{ $data['backdrop'] }}" alt="">
                                        <input class="fileButton2" onclick="bcd(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                        <input type="hidden" name="backdrop" id="goods_thumb0" value="{{ $data['backdrop'] }}">
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!--保存提交按钮-->
                    <div class="buttonDiv">
                        <input class="submitButton" type="submit" value="修改洗车卡">
                    </div>
                </form>
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
            if ($('#sttt1').attr('class') == 'open1' || $('#sttt1').attr('class') == ' open1 ') {
                $('#sttt1').attr('class','close1');
                $('#sttt2').attr('class','close2');
                $('#sttt2 input').attr('value','off');

            } else if($('#sttt1').attr('class') == 'close1' || $('#sttt1').attr('class') == ' close1 ') {
                $('#sttt1').attr('class','open1');
                $('#sttt2').attr('class','open2');
                $('#sttt2 input').attr('value','on');
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