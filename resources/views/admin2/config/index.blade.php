@extends('admin/head')
@section('content')

    <style>
        .fileButton3{
            top: 6px;
            left: 6px;
            width: 77px;
            height: 77px;
        }
        .picture3{
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script src="{{ url('admin/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ url('ueditor/ueditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ url('ueditor/ueditor.all.min.js') }}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{ url('admin/lang/zh-cn/zh-cn.js') }}"></script>

    {{--<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>--}}
    {{--<script type="text/javascript" charset="utf-8" src="{{ url('admin/ueditor.config.js') }}"></script>--}}
    {{--<script type="text/javascript" charset="utf-8" src="{{ url('admin/ueditor.all.min.js') }}"> </script>--}}
    {{--<script type="text/javascript" charset="utf-8" src="{{ url('admin/lang/zh-cn/zh-cn.js') }}"></script>--}}
    {{--<script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-1.9.1.min.js"></script>--}}

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

    <div class="addPages">

        <section id="hiddenDiv11" style="display: block;">
            <!--横向导航栏-->
            <ul class="nav nav-tabs">
                <li class="active "><a href="#template" data-toggle="tab">招商中心</a></li>
                <li><a href="#template1" data-toggle="tab">联系我们</a></li>
                <li><a href="#template2" data-toggle="tab">附近站点搜索范围</a></li>
                <li><a href="#template3" data-toggle="tab">首页排队</a></li>
            </ul>
            <!--内容部分-->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="template">
                    <!--积分规则-->
                    <div class="allShow2">
                        <form style="margin-top:20px;" action="" method="" onsubmit="return ratio()">
                            <li style="height:40px;">
                                <p class="goodsTextTitle">招加盟部</p>
                                <input class="goodsInput" id="radGet" value="{{ $integral['hj_wphone'] }}" name="hj_wphone" type="text" placeholder="">
                            </li>
                            <li style="height:40px;">
                                <p class="goodsTextTitle">运营部电话</p>
                                <input class="goodsInput" id="radDing" value="{{ $integral['hj_sphone'] }}" name="hj_sphone" type="text" placeholder="">
                            </li>
                            <li  style="height:40px;">
                                <p class="goodsTextTitle">客服部电话</p>
                                <input class="goodsInput" type="text" value="{{ $integral['hj_kphone'] }}" name="hj_kphone">
                            </li>
                            <!--文字说明1-->
                            <li  style="height:40px;">
                                <p class="goodsTextTitle">事故处理部</p>
                                <input class="goodsInput" type="text" value="{{ $integral['hj_yphone'] }}" name="hj_yphone">
                            </li>
                            <li>
                                <span class="tigDiv"></span>
                                <p class="goodsTextTitle">logo：<span class="tigText">上传1张图片，建议大小：不小于200KB。</span></p>
                                <div style="border: none;" class="goodsImgDiv" id="aaa0">
                                    <img class="picture2" src="{{ $integral['hj_logo'] }}" alt="">
                                    <input class="fileButton2" style="position: absolute; z-index: 999;" onclick="abc(0)" name="file_upload" data="data0" id="file_upload0" type="file">
                                    <input type="hidden" name="hj_facepic" id="goods_thumb0" value="{{ $integral['hj_logo'] }}">
                                </div>
                            </li>
                            <li>
                                <p class="vipTitle">公司简介</p>
                                <script id="editor" type="text/plain" name="hj_content" style="width:800px;height:300px;">{{ $integral['hj_content'] }}</script>
                                {{--<textarea style="height:100px;" class="textShow" name="hj_content" id="tecon" placeholder=" ">{{ $integral['hj_content'] }}</textarea>--}}
                                </li>
                        </form>
                    </div>
                </div>
                                <div class="tab-pane fade" id="template1">
                                    <!--积分规则-->
                                    <div class="allShow2">
                                    <form style="margin-top:20px;" action="" method="" onsubmit="return ratio()">
                                    <li style="height:40px;">
                                    <p class="goodsTextTitle">联系我们·资讯电话</p>
                                <input class="goodsInput" type="text" value="{{ $integral['hj_zxphone'] }}" name="hj_zxphone">
                                    </li>
                                    <li>
                                    <p class="vipTitle">联系我们内容</p>
                                <textarea style="height:100px;" class="textShow" name="hj_zphone" id="tecon" placeholder=" ">{{ $integral['hj_zphone'] }}</textarea>
                            </li>
                        </form>
                    </div>
                </div>
                                    <div class="tab-pane fade" id="template2">
                                    <!--积分规则-->
                                    <div class="allShow2">
                                    <li>
                                    <p class="vipTitle">附近站点搜索范围</p>
                                    <input  name="hj_range" id="tecon" value="{{ $integral['hj_range'] }}">  米
                                    </li>
                                    </div>
                                    </div>
                                    <div class="tab-pane fade" id="template3">
                                    <!--积分规则-->
                                    <div class="allShow2">
                                    <li>
                                    <p class="vipTitle">首页排队显示/隐藏</p>
                                    <div>
                                            <input  name="hj_status" @if($integral['hj_status'] == 1) checked @endif type="radio" id="tecon" value="1"> 显示
                                            <input  name="hj_status" @if($integral['hj_status'] == 0) checked @endif type="radio" id="tecon" value="0"> 隐藏
                                    </div>
                                    </li>
                                    </div>
                                    </div>
            </div>
        </section>
    </div>
    <script src="{{ url('admin/js/jquery-2.1.4.min.js') }}"></script>
                                <script type="text/javascript">

                                    //实例化编辑器
                                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                                    var ue = UE.getEditor('editor');


                                    function isFocus(e){
                                        alert(UE.getEditor('editor').isFocus());
                                        UE.dom.domUtils.preventDefault(e)
                                    }
                                    function setblur(e){
                                        UE.getEditor('editor').blur();
                                        UE.dom.domUtils.preventDefault(e)
                                    }
                                    function insertHtml() {
                                        var value = prompt('插入html代码', '');
                                        UE.getEditor('editor').execCommand('insertHtml', value)
                                    }
                                    function createEditor() {
                                        enableBtn();
                                        UE.getEditor('editor');
                                    }
                                    function getAllHtml() {
                                        alert(UE.getEditor('editor').getAllHtml())
                                    }
                                    function getContent() {
                                        var arr = [];
                                        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
                                        arr.push("内容为：");
                                        arr.push(UE.getEditor('editor').getContent());
                                        alert(arr.join("\n"));
                                    }
                                    function getPlainTxt() {
                                        var arr = [];
                                        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
                                        arr.push("内容为：");
                                        arr.push(UE.getEditor('editor').getPlainTxt());
                                        alert(arr.join('\n'))
                                    }
                                    function setContent(isAppendTo) {
                                        var arr = [];
                                        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
                                        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
                                        alert(arr.join("\n"));
                                    }
                                    function setDisabled() {
                                        UE.getEditor('editor').setDisabled('fullscreen');
                                        disableBtn("enable");
                                    }

                                    function setEnabled() {
                                        UE.getEditor('editor').setEnabled();
                                        enableBtn();
                                    }

                                    function getText() {
                                        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
                                        var range = UE.getEditor('editor').selection.getRange();
                                        range.select();
                                        var txt = UE.getEditor('editor').selection.getText();
                                        alert(txt)
                                    }

                                    function getContentTxt() {
                                        var arr = [];
                                        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
                                        arr.push("编辑器的纯文本内容为：");
                                        arr.push(UE.getEditor('editor').getContentTxt());
                                        alert(arr.join("\n"));
                                    }
                                    function hasContent() {
                                        var arr = [];
                                        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
                                        arr.push("判断结果为：");
                                        arr.push(UE.getEditor('editor').hasContents());
                                        alert(arr.join("\n"));
                                    }
                                    function setFocus() {
                                        UE.getEditor('editor').focus();
                                    }
                                    function deleteEditor() {
                                        disableBtn();
                                        UE.getEditor('editor').destroy();
                                    }
                                    function disableBtn(str) {
                                        var div = document.getElementById('btns');
                                        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
                                        for (var i = 0, btn; btn = btns[i++];) {
                                            if (btn.id == str) {
                                                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
                                            } else {
                                                btn.setAttribute("disabled", "true");
                                            }
                                        }
                                    }
                                    function enableBtn() {
                                        var div = document.getElementById('btns');
                                        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
                                        for (var i = 0, btn; btn = btns[i++];) {
                                            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
                                        }
                                    }

                                    function getLocalData () {
                                        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
                                    }

                                    function clearLocalData () {
                                        UE.getEditor('editor').execCommand( "clearlocaldata" );
                                        alert("已清空草稿箱")
                                    }
                                </script>
    <script type="text/javascript">
        function abc(index) {
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


            $.ajax({
                type: "POST",
                url: "{{ url('/admin/config/upload') }}",
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
    <script type="text/javascript">
        $("input").blur(function() {

            if ($(this).attr('name') === 'file_upload') {

                return false;

            }

            var formData = new FormData();
            formData.append('value', $(this).val());
            formData.append('name', $(this).attr('name'));
            formData.append('_token',"{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "/admin/config/index",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $(this).attr('value', data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });

        });
    </script>
    <script type="text/javascript">

        UE.getEditor('editor').addListener('blur',function(editor){
            var formData = new FormData();
            formData.append('value', UE.getEditor('editor').getPlainTxt());   //存入纯文本
//            formData.append('value', UE.getEditor('editor').getContent());  //存入html
            formData.append('name', 'hj_content');
            formData.append('_token',"{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "/admin/config/index",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $(this).attr('value', data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        });
    </script>
                                <script>
                                    $("textarea").blur(function() {

                                        var formData = new FormData();
                                        formData.append('value', $(this).val());
                                        formData.append('name', $(this).attr('name'));
                                        formData.append('_token',"{{ csrf_token() }}");
                                        $.ajax({
                                            type: "POST",
                                            url: "/admin/config/index",
                                            data: formData,
                                            async: true,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            success: function(data) {
                                                $(this).attr('value', data);
                                            },
                                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                                alert("上传失败，请检查网络后重试");
                                            }
                                        });

                                    });
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