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
				<li><a href="{{ url('admincp/managerole/index') }}">角色管理</a><span>«</span></li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<div class="inner_content_w3_agile_info two_in tab-content">
		<!--h2 class="w3_inner_tittle">电子卡券</h2-->
      	<!--横向导航栏-->
			<ul class="nav nav-tabs" style="border-bottom:none;">
				<li class="active "><a href="#icoterie_list" data-toggle="tab">角色列表</a></li>
				<li><a href="#icoterie_create" data-toggle="tab">角色添加</a></li>
			</ul>
		<!-- tables -->
		<div class="agile-tables tab-pane fade active in" id="icoterie_list">
			<div class="w3l-table-info agile_info_shadow">
				<h3 class="w3_inner_tittle two">ROLE LIST</h3>
				<table id="table-breakpoint">
					<thead>
						<tr>
							<th>ROLE ID</th>
							<th>ROLE PID</th>
							<th>ROLE NAME</th>
							<th>ROLE DESCRIBE</th>
							<th>ROLE STATUS</th>
							<th>OPERATE</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $v)
						<tr>
							<td>{{ $v->role_id }}</td>
							<td>{{ $v->pid }}</td>
							<td>{{ $v->role_name }}</td>
							<td>{{ $v->role_describe }}</td>
							<td>{{ $v->status }}</td>
							<td>
							<a href="{{ url('admincp/managerole/update/'.$v->role_id) }}">
								<div class="button">
									<p class="btnText">UPDATE</p>
									<div class="btnTwo">
										<p class="btnText2">GO!</p>
									</div>
								</div>
							</a>
							<a href="{{ url('admincp/managerole/destroy/'.$v->role_id) }}">
								<div class="button">
									<p class="btnText">DELETE</p>
									<div class="btnTwo">
										<p class="btnText2">X</p>
									</div>
								</div>
							</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div>{{ $data->links() }}</div>
			</div>
		</div>
		<!-- //tables -->
		
		<div class="wthree_general graph-form agile_info_shadow tab-pane" id="icoterie_create">
			<h3 class="w3_inner_tittle two">ROLE GREATE</h3>
			<div class="grid-1 ">
				<div class="form-body">
					<form class="form-horizontal" action="{{ url('admincp/managerole/create') }}" method="post"> {{ csrf_field() }}
						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">ROLE PID Select</label>
							<div class="col-sm-8">
								<select name="pid" class="form-control">
									<option value="0">顶级角色</option>
									@foreach($menu as $i)
									@if($i->pid==0)
									<option value="{{ $i->role_id }}">{{ $i->role_name }}</option>
									@foreach($menu as $c)
									@if($c->pid==$i->role_id)
									<option value="{{ $c->role_id }}">∟ {{ $c->role_name }}</option>
									@endif
									@endforeach
									@endif
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">ROLE NAME</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" name="role_name" placeholder="Default Input">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>
						
						<div class="form-group">
							<label for="txtarea1" class="col-sm-2 control-label">ROLE DESCRIBE</label>
							<div class="col-sm-8">
								<textarea name="role_describe" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Your help text!</p>
							</div>
						</div>

						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">Radio Inline</label>
							<div class="col-sm-8">
								<div class="radio-inline">
									<label>
										<input type="radio" name="status" value="0"> Effective
									</label>
								</div>
								
								<div class="radio-inline">
									<label>
										<input type="radio" name="status" value="1" checked> Invalid
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