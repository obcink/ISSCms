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


    <section id="hiddenDiv24" style="display: block;">
        <!--横向导航栏-->
        <ul class="nav nav-tabs">
            <li><a href="{{ url('admin/card/index') }}">返回上一页</a></li>
            <li class="active "><a href="#cadrc" data-toggle="tab">卡券总数及剩余</a></li>
          	<li style="margin-left: 200px;">
                <form action="{{ url('admin/card/clist') }}" method="get">
                    <input type="text" name="hj_car_number" placeholder="卡券编码">
                  	<input type="text" name="hj_name" placeholder="持卡人名">
                    <input type="text" name="hj_phone" placeholder="持卡电话">
                  	<input type="text" name="hj_b_name" placeholder="发卡人名">
                    <input type="text" name="hj_b_phone" placeholder="发卡电话">
                    <input style="padding: 0 10px;" type="submit" value="查询">
                </form>
            </li>
        </ul>
        <!--内容部分-->
        <div class="tab-content">
                <div class="tab-pane fade in active" id="cadrc1">
                    <div class="allShow2">
                        <div class="allShow2">
                            <table class="showTable">
                                <tbody><tr>
                                    <th>序号</th>
                                  	<th>发卡人名</th>
                                  	<th>联系电话</th>
                                    <th>卡券名称</th>
                                    <th>专属用户</th>
                                  	<th>用户类型</th>
                                    <th>手机号码</th>
                                  	<th>卡券编号</th>
                                    <th>总发次数</th>
                                  	<th>剩余次数</th>
                                    <th>到期时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($data as $v)
                                    <tr>
                                        <!--序号-->
                                        <td>
                                            {{ $v['id'] }}
                                        </td>
                                      	<td>
                                            {{ $v['uname3'] }} {{ $v['uname4'] }}
                                        </td>
                                      	<td>
                                            {{ $v['phone2'] }}
                                        </td>
                                      	<!--卡券名称-->
                                        <td>
                                            {{ $v['cname'] }}
                                        </td>
                                      	<!--专属用户-->
                                        <td>
                                            {{ $v['uname2'] }}  {{ $v['uname'] }}
                                        </td>
                                     	<!--用户类型-->
                                      	<td>
                                            {{ $v['utype'] }}
                                        </td>
                                        <!--手机号码-->
                                        <td>
                                            {{  $v['phone'] }}
                                        </td>
                                      	<!--卡券编号-->
                                        <td>
                                            {{ $v['cnumber'] }}
                                        </td>	
                                      
                                      	<!--发放次数-->
                                        <td>
                                            {{ $v['num'] }}
                                        </td>
                                      	<!--剩余次数-->
                                        <td>
                                            {{ $v['rem'] }}
                                        </td>
                                      	
                                        <!--有效期-->
                                        <td>
                                            {{ date('Y-m-d', $v['paytime']) }}
                                        </td>
                                        <!--操作-->
                                        <td>
                                            <p class="delete"><a href="{{ url('admin/card/recover/'.$v['id']) }}">收回</a></p>
                                            {{--<p class="delete"><a href="{{ url('store/card/del/'.$v['id']) }}">删除</a></p>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody></table>
                            <div>{{-- $data->links() --}} {{ $data->appends([ 'hj_name' => $hj_name,'hj_phone' => $hj_phone,  'hj_b_name' => $hj_b_name,'hj_b_phone' => $hj_b_phone, 'hj_car_number' => $hj_car_number]) }}</div>
                            <a style="color: #000;" href="{{ url('admin/card/export') }}"><input style="margin-top:20px;" type="button" name="" id="" value="导出Excel表格"></a>
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
    {{--<script>--}}
        {{--function insert(){--}}
            {{--var value = $('#goodsClass').val();--}}
            {{--var name = $('#goodsClass').attr('name');--}}


            {{--$.post("{{url('/admin/catecard/add')}}",{'hj_name':value,"_token":"{{ csrf_token() }}"},function(data){--}}

                {{--// data是json格式的字符串，在js中如何将一个json字符串变成json对象--}}
                {{--if(data.error == 0){--}}
                    {{--layer.msg(data.msg, {icon: 1});--}}
                {{--}else{--}}
                    {{--layer.msg(data.msg, {icon: 2});--}}
                {{--}--}}
            {{--});--}}


            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: "{{ url('/admin/catecard/add') }}",--}}
                {{--data: {name:value,"_token":"{{ csrf_token() }}"},--}}
                {{--async: true,--}}
                {{--cache: false,--}}
                {{--contentType: false,--}}
                {{--processData: false,--}}
                {{--success: function(data) {--}}

                {{--},--}}
                {{--error: function(XMLHttpRequest, textStatus, errorThrown) {--}}
                    {{--alert("上传失败，请检查网络后重试");--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}
    {{--</script>--}}
<script>
    $('.navListLi:nth-child(2)').css('height','50px');
    $('.navListLi:nth-child(3)').css('height','50px');
    $('.navListLi:nth-child(9)').css('height','50px');
    $('.navListLi:nth-child(10)').css('height','50px');
    $('.navListLi:nth-child(11)').css('height','50px');
    $('.navListLi:nth-child(12)').css('height','50px');
</script>
@stop