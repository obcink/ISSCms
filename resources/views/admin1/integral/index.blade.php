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

        <section id="hiddenDiv11" style="display: block;">
            <!--横向导航栏-->
            <ul class="nav nav-tabs">
                <li class="active "><a href="#template" data-toggle="tab">积分规则</a></li>
            </ul>
            <!--内容部分-->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="template">
                    <!--积分规则-->
                    <div class="allShow2">
                        开启积分规则:
						<form action="" method="" onsubmit="return ratio()">{{ csrf_field() }}
							<div id="rao1" style="display:inline-block;" class="@if($integral['status'] == 1) open1 @else close1 @endif">
								<div id="rao2" onclick="abc()" class="@if($integral['status'] == 1) open2 @else close2 @endif">
									<input type="hidden" name="status" value="{{ $integral['status'] }}">
								</div>
							</div>
							<ul class="information" style="margin-top:20px;">
								<!--li style="height:50px;">
										<span class="tigDiv"></span>
										<p class="goodsTextTitle">选择企业：</p>
										<select name="cid" class="goodsTextTitle" id="coatChose4">
											@foreach($company as $v)
											<option @if($integral['cid'] == $v['id']) selected @endif value="{{ $v['id'] }}">{{ $v['corporate'] }}</option>
											@endforeach
										</select>
									</li-->
								<li style="height:70px;">
									<p class="goodsTextTitle">抵扣规则-转换比例 ： </p>
									<input class="goodsInput" id="radDing" value="{{ $integral['worth'] }}" name="worth" type="text" placeholder=""> 积分抵扣1元
								</li>
								<li  style="height:120px;">
									<p class="goodsTextTitle">获取规则-文字说明1：</p>
									<textarea name="explain1" id="" rows="5" cols="100">{{ $integral['explain1'] }}</textarea>
									{{--<input class="goodsInput" type="text" value="{" name="">--}}
								</li>
								<!--文字说明1-->
								<li  style="height:120px;">
									<p class="goodsTextTitle">获取规则-文字说明2：</p>
									<textarea name="explain2" id="" rows="5" cols="100">{{ $integral['explain2'] }}</textarea>
									{{--<input class="goodsInput" type="text" value="" name="">--}}
								</li>
								<!--文字说明2-->
								<li style="height:120px;">
									<p class="goodsTextTitle">抵扣规则-文字说明3：</p>
									<textarea name="explain3" id="" rows="5" cols="100">{{ $integral['explain3'] }}</textarea>
									{{--<input class="goodsInput" type="text" value="{" name="">--}}
								</li>
							</ul>
							<div class="buttonDiv">
								<input class="submitButton" type="submit" value="保存提交">
							</div>
						</form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ url('admin/js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript">
        $("input").blur(function() {
            var formData = new FormData();
            formData.append('value', $(this).val());
            formData.append('name', $(this).attr('name'));
            formData.append('_token',"{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "/admin/integral/index",
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
        $("textarea").blur(function() {
            var formData = new FormData();
            formData.append('value', $(this).val());
            formData.append('name', $(this).attr('name'));
            formData.append('_token',"{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "/admin/integral/index",
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
        function abc() {
            if ($('#rao1').attr('class') == 'open1' || $('#rao1').attr('class') == ' open1 ') {
                $('#rao1').attr('class','close1');
                $('#rao2').attr('class','close2');
                $('#rao2 input').attr('value','0');

                    var formData = new FormData();
                    formData.append('value', $("#rao2 input").val());
                    formData.append('name', $("#rao2 input").attr('name'));
                    formData.append('_token',"{{ csrf_token() }}");
                    $.ajax({
                        type: "POST",
                        url: "/admin/integral/index",
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

            } else if($('#rao1').attr('class') == 'close1' || $('#rao1').attr('class') == ' close1 ') {
                $('#rao1').attr('class','open1');
                $('#rao2').attr('class','open2');
                $('#rao2 input').attr('value','1');

                var formData = new FormData();
                formData.append('value', $("#rao2 input").val());
                formData.append('name', $("#rao2 input").attr('name'));
                formData.append('_token',"{{ csrf_token() }}");
                $.ajax({
                    type: "POST",
                    url: "/admin/integral/index",
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
            }
        }
    </script>
    <script>
         $('.navListLi:first-child').css('height','50px');
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	//$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
    </script>
@stop