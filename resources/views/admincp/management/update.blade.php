@extends('admincp/index/head')
@section('content')
	<script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <!--layer插件-->
    <script src="/icoterie/layer/layer.js"></script>

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
<style>
.agile_info_shadow .button{float:left;}
.agile_info_shadow .button:first-child{margin-right:10px;}
</style>
<!-- /inner_content-->
<div class="inner_content">
	<!-- /inner_content_w3_agile_info-->
	<!-- breadcrumbs -->
	<div class="w3l_agileits_breadcrumbs">
		<div class="w3l_agileits_breadcrumbs_inner">
			<ul>
				<li><a href="{{ url('admincp/index') }}">仪表盘</a><span>«</span></li>
				<li><a href="main-page.html">系统</a><span>«</span></span></li>
				<li><a href="{{ url('admincp/management/index') }}">管理员</a><span>«</span></li>
				<li>管理员资料修改<span>«</span></li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<div class="inner_content_w3_agile_info two_in tab-content">
		<div class="wthree_general graph-form agile_info_shadow tab-pane fade active in" id="icoterie_modify">
			<h3 class="w3_inner_tittle two">MANAGEMENT INFORMATION UPDATE</h3>
			<div class="grid-1 ">
				<div class="form-body">
					<form class="form-horizontal" action="{{ url('admincp/management/update/' . $data->user_id) }}" method="post">{{ csrf_field() }}
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">USER NAME</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" name="user_name" placeholder="Default Input" value="{{ $data->user_name }}">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>
						
						<div class="form-group mb-n">
							<label for="largeinput" class="col-sm-2 control-label label-input-lg">USER MAIL</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1 input-lg" id="largeinput" placeholder="Large Input" name="email" value="{{ $data->email }}">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">USER PASSWORD</label>
							<div class="col-sm-8">
								<input type="password" class="form-control1" id="inputPassword" name="password" placeholder="Password">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Enter a new password!</p>
							</div>
						</div>
						
						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">ROLE Select</label>
							<div class="col-sm-8">
								<select name="role_id" class="form-control">
									@foreach($menu as $i)
									@if($i->pid==0) 
									<option @if($data->role_id == $i->role_id) selected @endif value="{{ $i->role_id }}">{{ $i->role_name }}</option>
									@foreach($menu as $c)
									@if($c->pid==$i->role_id)
									<option @if($data->role_id == $c->role_id) selected @endif  value="{{ $c->role_id }}">∟ {{ $c->role_name }}</option>
									@endif
									@endforeach
									@endif
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">USER STATUS</label>
							<div class="col-sm-8">
								<div class="radio-inline">
									<label>
										<input type="radio" name="status" value="0" @if($data->status==0) checked @endif> Effective
									</label>
								</div>
								
								<div class="radio-inline">
									<label>
										<input type="radio" name="status" value="1" @if($data->status==1) checked @endif> Invalid
									</label>
								</div>
							</div>
						</div>
						
						<div class="buttonDiv">
                            <input class="submitButton" type="submit" value="Submit">
                        </div>
					</form>
				</div>
			</div>
		</div>																	
		<!--//set-2-->
	</div>
	<!-- //inner_content_w3_agile_info-->
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

@stop