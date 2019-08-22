@extends('admincp/index/head')
@section('content')

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
				<li><a href="{{ url('admincp/permission/index') }}">权限菜单</a><span>«</span></li>
				<li>菜单修改<span>«</span></li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<div class="wthree_general graph-form agile_info_shadow tab-pane fade active in" id="icoterie_update">
			<h3 class="w3_inner_tittle two">PERMISSION INFORMATION UPDATE</h3>
			<div class="grid-1 ">
				<div class="form-body">
					<form class="form-horizontal" action="{{ url('admincp/permission/update/'.$data->id) }}" method="post"> {{ csrf_field() }}
						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">MENU PID Select</label>
							<div class="col-sm-8">
								<select name="pid" class="form-control">
									<option @if($data->pid == 0) selected @endif value="0">顶级菜单</option>
									@foreach($menu as $i)
									@if($i->pid==0) 
									<option @if($data->pid == $i->id) selected @endif value="{{ $i->id }}">{{ $i->name }}</option>
									@foreach($menu as $c)
									@if($c->pid==$i->id)
									<option @if($data->pid == $c->id) selected @endif  value="{{ $c->id }}">∟ {{ $c->name }}</option>
									@endif
									@endforeach
									@endif
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">MENU NAME</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" name="name" placeholder="Default Input" value="{{ $data->name }}">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>
						
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">MENU URL</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" name="url" placeholder="Default Input" value="{{ $data->url }}">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>
						
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">MENU PERMISSION</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" name="permission" placeholder="Default Input" value="{{ $data->permission }}">
							</div>
						</div>
						
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">MENU ICO</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" name="ico" placeholder="Default Input"  value="{{ $data->ico }}">
							</div>
						</div>
						
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">MENU SORT</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" name="sort" placeholder="Default Input"  value="{{ $data->sort }}">
							</div>
						</div>

						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">MENU STATUS</label>
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
                            <input class="submitButton" type="submit" value="保存提交">
                        </div>
					</form>
				</div>
			</div>
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