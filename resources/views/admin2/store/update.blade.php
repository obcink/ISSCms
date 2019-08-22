
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
            <li><a href="javascript:history.back(-1);">返回上一页</a></li>
            <li class="active"><a href=""  data-toggle="tab">修改门店</a></li>
        </ul>
        <!--内容部分-->
        <div class="" id="plbigct">
            <div class="allShow2">
                <form action="{{ url('admin/store/update/'.$data['id']) }}" method="post">
                    <ul class="information">
                        <!--产品信息-->
                        <li>
                            <ul class="informationList">
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店名称：</p>
                                    <input class="goodsInput" id="doorInput1" name="hj_name" maxlength="10" value="{{ $data['hj_name'] }}" type="text" placeholder="请输入产品名称"> <span class="tigText">门店名称最多十个字</span>
                                </li>
                                <!--选择分类-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店分类：</p>
                                    <select name="hj_store_cate_id" class="link" id="coatChose4">
                                        @foreach($cate as $v)
                                            <option @if($data['hj_store_cate_id'] == $v['id']) selected @endif value="{{ $v['id'] }}">{{ $v['hj_name'] }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">服务项目：</p>
                                        @if(in_array(0,$tproject))
                                            <input checked class="tjsp" type="checkbox" name="hj_project_id[]" value="0">门店通用
                                            @else
                                        <input class="tjsp" type="checkbox" name="hj_project_id[]" value="0">门店通用
                                        @endif
                                        @foreach($project as $v)
                                            @if(in_array($v['id'], $tproject))
                                                <input  checked  class="tjsp" type="checkbox" name="hj_project_id[]" value="{{ $v['id'] }}">{{ $v['hj_name'] }}
                                            @else
                                            <input  class="tjsp" type="checkbox" name="hj_project_id[]" value="{{ $v['id'] }}">{{ $v['hj_name'] }}
                                        @endif
                                    @endforeach
                                </li>
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店地区：</p>
                                    <select name="hj_sheng" class="link" id="coatChose4"></select>
                                    <select name="hj_shi" class="link" id="coatChose4"></select>
                                    <select name="hj_xian" class="link" id="coatChose4"></select>
                                </li>
                                <!--门店地址-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店地址：</p>
                                    <input class="goodsInput" value="{{ $data['hj_address'] }}" id="doorInput2" name="hj_address" type="text" placeholder="请输入门店地址"> <span class="tigText">如:(xxxx路xxx号)</span>
                                </li>
                                <!--门店电话-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">门店电话：</p>
                                    <input class="goodsInput" id="doorInput3" value="{{ $data['hj_phone'] }}" name="hj_phone" type="text" placeholder="请输入门店电话">
                                </li>
                                <!--营业时间-->
                                <li style="height:50px;">
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">营业时间：</p>
                                    <input class="goodsInput" id="doorInput4" value="{{ $data['hj_start_time'] }}" name="hj_start_time" type="text" placeholder="8:00"> - <input class="goodsInput" value="{{ $data['hj_end_time'] }}" id="doorInput5" name="hj_end_time" type="text" placeholder="24:00">
                                </li>
                                <!--logo图-->
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">logo：<span class="tigText">建议尺寸：150*150px。</span></p>
                                    <div class="goodsImgDiv" id="aaa1">
                                        <img class="picture2" src="{{ $data['hj_logo'] }}" alt="">
                                        <input class="fileButton2" onclick="abc(1)" name="file_upload" id="file_upload1" type="file">
                                        <input type="hidden" id="goods_thumb1" name="hj_logo" value="{{ $data['hj_logo'] }}">
                                    </div>
                                </li>
                                <!--背景图-->
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">背景图：<span class="tigText">建议尺寸：640*300px，大小不超过200KB</span></p>
                                    <div class="goodsImgDiv" id="aaa2">
                                        <img class="picture2" src="{{ $data['hj_bgpic'] }}" alt="">
                                        <input class="fileButton2" onclick="abc(2)" name="file_upload" id="file_upload2" type="file">
                                        <input type="hidden" name="hj_bgpic" id="goods_thumb2" value="{{ $data['hj_bgpic'] }}">
                                    </div>
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">微信二维码：<span class="tigText">上传1张图片，建议大小：像素。150*167像素</span></p>
                                    <div class="goodsImgDiv" id="aaa0">
                                        <img class="picture2" src="{{ $data['hj_wechat'] }}" alt="">
                                        <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                        <input type="hidden" name="hj_wechat" id="goods_thumb0" value="{{ $data['hj_wechat'] }}">
                                    </div>
                                </li>
                                <li>
                                    <span class="tigDiv"></span>
                                    <p class="goodsTextTitle">支付宝二维码：<span class="tigText">上传1张图片，建议大小：像素。150*167像素</span></p>
                                    <div class="goodsImgDiv" id="aaa3">
                                        <img class="picture2" src="{{ $data['hj_ali'] }}" alt="">
                                        <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(3)" name="file_upload" data="data3" id="file_upload3" type="file">
                                        <input type="hidden" name="hj_ali" id="goods_thumb3" value="{{ $data['hj_ali'] }}">
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!--推荐商品-->
                        <li>
                            <div class="attribute">
                                <ul class="attributeList" id="attributeList">
                                    推荐商品
                                    @foreach($goods as $v)
                                        @if(in_array($v['id'], $tgood))
                                            <input checked class="tjsp" type="checkbox" name="hj_goodid[]" value="{{ $v['id'] }}">{{ $v['hj_name'] }}
                                        @else
                                            <input class="tjsp" type="checkbox" name="hj_goodid[]" value="{{ $v['id'] }}">{{ $v['hj_name'] }}
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="attribute">
                                <ul class="attributeList" id="attributeList">
                                    推荐套餐商品
                                    @foreach($group as $v)

                                        @if(in_array($v['id'], $tgroup))
                                            <input checked class="tjsp" type="checkbox" name="hj_groupid[]" value="{{ $v['id'] }}">{{ $v['hj_name'] }}
                                        @else
                                            <input class="tjsp" type="checkbox" name="hj_groupid[]" value="{{ $v['id'] }}">{{ $v['hj_name'] }}
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <!--门店简介-->
                        <li>
                            <p class="vipTitle">门店简介</p>
                            <textarea class="textShow" name="hj_content" id="jianjie" placeholder="请输入简介 ">{{ $data['hj_content'] }}</textarea>
                        </li>
                    </ul>
                    <!--保存提交按钮-->
                    <div class="buttonDiv">
                        {{ csrf_field() }}
                        <input class="submitButton" type="submit" value="保存提交">
                    </div>
                </form>
            </div>
        </div>
        </section>
    </div>

    <script type="text/javascript">
        function abc(index) {
            $("#file_upload"+index).change(function () {
                uploadImage(index);
            });
        };
        function uploadImage(id) {
            // 判断是否有选择上传文件
            var imgPath = $("#file_upload"+id).val();
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
            formData.append('file_upload',$('#file_upload'+id)[0].files[0]);
            formData.append('_token',"{{ csrf_token() }}");
//        console.log(formData);
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/store/upload') }}",
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
    <script language="javascript" src="{{ url('admin/js/PCASClass.js') }}"></script>
    <script>
        new PCAS("hj_sheng","hj_shi","hj_xian","{{ $data['hj_sheng'] }}","{{ $data['hj_shi'] }}","{{ $data['hj_xian'] }}");
    </script>
    <script>
        $('.navListLi:nth-child(2)').css('height','50px');
        $('.navListLi:nth-child(3)').css('height','50px');
        $('.navListLi:nth-child(9)').css('height','50px');
        $('.navListLi:nth-child(10)').css('height','50px');
        $('.navListLi:nth-child(11)').css('height','50px');
        $('.navListLi:nth-child(12)').css('height','50px');
    </script>
@stop