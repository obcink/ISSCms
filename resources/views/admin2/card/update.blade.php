
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
                                    <input class="goodsInput" id="lorr1" name="hj_name" value="{{ $data['hj_name'] }}" type="text" placeholder="">
                                </li>
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">卡序号：</p>
                                    <input class="goodsInput" id="lorr1" name="hj_list_number" value="{{ $data['hj_list_number'] }}" type="text" placeholder=""> <span class="tigText">卡序号越大前后台排序越靠前</span>
                                </li>
                                <!--可用次数-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">可用次数：</p>
                                    <input class="goodsInput" id="lorr2" value="{{ $data['hj_num'] }}" name="hj_num" type="text" placeholder="">
                                </li>
                                <!--状态-->
                                <li style="height:50px;">
                                    <p class="goodsTextTitle ddqq">状态：</p>
                                    <div id="sttt1" style="display:inline-block;" class="@if($data['hj_status'] == 1) open1 @else close1 @endif">
                                        <div onclick="abc()" id="sttt2" class="@if($data['hj_status'] == 1) open2 @else close2 @endif">
                                            <input type="hidden" name="hj_status" value="{{ $data['hj_status'] }}">
                                        </div>
                                    </div>
                                </li>
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">卡类型：</p>
                                    <input type="radio" onclick="add()" @if($data['hj_type'] == 0)  checked  @endif name="hj_type" value="0">普通卡
                                    <input type="radio" onclick="dele()" @if($data['hj_type'] == 1) checked  @endif name="hj_type" value="1">专属卡
                                </li>
                                <!--售价-->
                                <li id="price" style="height:50px;display: @if($data['hj_type'] == 1) none @endif;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">售价：</p>
                                    <input class="goodsInput" id="lorr3" value="{{ $data['hj_price'] }}" name="hj_price" type="text" placeholder=""> 元
                                </li>
                                <!--服务项目-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">发放编码：</p>
                                    <input style="width: 80px;" type="text" value="{{ $data['hj_card_num1'] }}" name="hj_card_num1"> - <input style="width: 80px;" value="{{ $data['hj_card_num2'] }}" type="text" name="hj_card_num2">
                                </li>
                                <!--服务项目-->

                                {{--<li style="height:50px;">--}}
                                    {{--<span class="tigDiv"></span>--}}
                                    {{--<p class="goodsTextTitle ddqq">卡类型：</p>--}}
                                    {{--<select name="hj_type" class="link" id="coatChose4">--}}
                                        {{--@foreach($cate as $v)--}}
                                            {{--<option @if($data['hj_type'] == $v['id']) selected @endif value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</li>--}}

                                <!--限量张数-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">发放数量：</p>
                                    <input class="goodsInput" id="lorr6" value="{{ $data['hj_number'] }}" name="hj_number" type="text" placeholder=""> 张
                                </li>
                                <!--有效期-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle ddqq">有效期：</p>
                                    <input class="goodsInput" id="lorr7" value="{{ date('Y-m-d', $data['hj_start_time']) }}" name="hj_start_time" type="date" placeholder="2018/05/06"> - <input class="goodsInput" id="lorr8" value="{{ date('Y-m-d', $data['hj_end_time']) }}" name="hj_end_time" type="date" placeholder="2018/06/09">
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">封面图：<span class="tigText">上传1张图片，建议大小：最大200KB。</span></p>
                                    <div class="goodsImgDiv" id="aaa0">
                                        <img class="picture2" src="{{ $data['hj_pic'] }}" alt="">
                                        <input class="fileButton2" onclick="bcd(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                        <input type="hidden" name="hj_pic" id="goods_thumb0" value="{{ $data['hj_pic'] }}">
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
                $('#sttt2 input').attr('value','0');

            } else if($('#sttt1').attr('class') == 'close1' || $('#sttt1').attr('class') == ' close1 ') {
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
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop