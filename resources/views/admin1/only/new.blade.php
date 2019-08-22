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
                layer.msg('{{ $error }}');
            </script>
        @endforeach
    @endif
    @if (session('msg'))
        <script>
            layer.msg('{{ session('msg') }}');
        </script>
    @endif

    <section id="hiddenDiv28" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li><a href="{{ url('admin/only/index') }}">返回上一页</a></li>
            <li class="active "><a href="#excus" data-toggle="tab">专属审核管理</a></li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="excus">
                <!--专属客户列表-->
                <div class="allShow2">
                    <table class="showTable">
                        <tbody><tr>
                            <th>序号</th>
                            <th>联系人姓名</th>
                            <th>用户类型</th>
                            <th>公司名称</th>
                            <th>工商注册号</th>
                            <th>身份证号</th>
                            {{--<th>站点名称</th>--}}
                            <th>联系手机号</th>
                            <th>地址</th>
                            {{--<th>营业时间</th>--}}
                            <th>注册时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $v)
                            <td>
                                {{ $v['id'] }}
                            </td>
                            <!--姓名-->
                            <td>
                                {{ $v['hj_contact_name'] }}
                            </td>
                            <td>
                                @if(!empty($v['hj_company'])) 公司 @else 个人  @endif
                            </td>
                            <td>
                                {{ $v['hj_company'] }}
                            </td>
                            <td>
                                {{ $v['hj_registration_number'] }}
                            </td>
                            <td>
                                {{ $v['hj_idnumber'] }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $v['hj_name'] }}--}}
                            {{--</td>--}}
                            <!--余额-->
                            <td>
                                {{ $v['hj_contact_phone'] }}
                            </td>
                            <!--赠送余额剩余-->
                            <td>
                                {{ $v['hj_sheng'] }}{{ $v['hj_shi'] }}{{ $v['hj_xian'] }}{{ $v['hj_address'] }}
                            </td>
                            <!--下单次数-->
                            {{--<td>--}}
                                {{--{{ $v['hj_start_time'] }} - {{ $v['hj_end_time'] }}--}}
                            {{--</td>--}}
                            <td>
                                {{ date('Y/m/d', $v['hj_time']) }}
                            </td>
                            <!--操作-->
                            <td style="width: 300px">
                                {{--<p class="delete"><a href="{{ url('admin/store/useradd/'.$v['id']) }}">编辑站点</a></p>--}}
                                {{--<p class="delete"><a href="{{ url('admin/only/check/'.$v['id']) }}">选择站点</a></p>--}}
                                <p class="delete"><a href="{{ url('admin/only/type/'.$v['id']) }}">通过审核</a></p>
                                <p class="delete"><a href="{{ url('admin/only/del/'.$v['id']) }}">删除</a></p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    <div>{{ $data->links() }}</div>
                </div>
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
<script type="text/javascript">
    $("textarea").blur(function() {
        var formData = new FormData();
        formData.append('value', $(this).val());
        formData.append('name', $(this).attr('name'));
        formData.append('_token',"{{ csrf_token() }}");
        $.ajax({
            type: "POST",
            url: "/admin/only/text",
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

<script language="javascript" src="{{ url('admin/js/PCASClass.js') }}"></script>
<script>
    new PCAS("hj_sheng","hj_shi","hj_xian","吉林省","吉林市","龙潭区");
</script>

<script>
    $('.navListLi:first-child').css('height','50px');
      	//$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        $('.navListLi:last-child').css('height','50px');
</script>

@stop
