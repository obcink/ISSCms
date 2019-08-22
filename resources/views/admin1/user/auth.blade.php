@extends('admin/head')
@section('content')
    <div class="addPages">

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


        <section id="hiddenDiv2">
            <div class="title">用户授权                 </div>
            <form style="margin-left: 30px;" action="{{ url('admin/user/auth/'.$user['id']) }}" method="post">
                {{ csrf_field() }}
                <div>
                    <p style="margin: 30px 0;">权限名称：</p>
                    @foreach($permission as $v)
                        @if(in_array($v['id'], $user_permission))
                    <p class="text">
                        <input style="float:left;" id="pwd" name="hj_permissions[]" checked value="{{ $v['id'] }}" type="checkbox"> <span style="float:left;">{{ $v['hj_name'] }}</span>
                    </p>
                        @else(in_array($v['id'], $user_permission))
                            <p class="text">
                                <input style="float:left;" id="pwd" name="hj_permissions[]"  value="{{ $v['id'] }}" type="checkbox"> <span style="float:left;">{{ $v['hj_name'] }}</span>
                            </p>
                        @endif
                    @endforeach
                    <p class="error" id="error1"></p>
                </div>

                <li>
                    <input style="margin-left: 236px; margin-top: 30px;" class="button" id="submit" type="submit" value="确认">
                </li>
            </form>
        </section>














        {{--<section id="hiddenDiv2">--}}
            {{--<div class="title">用户授权--}}
                    {{--@if (count($errors) > 0)--}}
                        {{--@foreach($errors->all() as $error)--}}
                            {{--<script>--}}
                                {{--window.onload = function () {--}}
                                    {{--layer.msg('{{ $error }}');--}}
                                {{--}--}}
                            {{--</script>--}}
                        {{--@endforeach--}}
                    {{--@endif--}}
                    {{--@if (session('msg'))--}}
                        {{--<script>--}}
                            {{--window.onload = function () {--}}
                                {{--layer.msg('{{ session('msg') }}');--}}
                            {{--}--}}
                        {{--</script>--}}
                    {{--@endif--}}
            {{--<form style="margin-left: 30px;" action="{{ url('admin/user/auth/'.$user['id']) }}" method="post">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div>--}}
                    {{--<p style="margin: 30px 0;">权限名称：</p>--}}
                    {{--@foreach($permission as $v)--}}
                        {{--@if(in_array($v['id'], $user_permission))--}}
                            {{--<p class="text">--}}
                                {{--<input style="float:left;" id="pwd" name="hj_permissions[]" checked value="{{ $v['id'] }}" type="checkbox"> <span style="float:left;">{{ $v['hj_name'] }}</span>--}}
                            {{--</p>--}}
                        {{--@else(in_array($v['id'], $user_permission))--}}
                            {{--<p class="text">--}}
                                {{--<input style="float:left;" id="pwd" name="hj_permissions[]" value="{{ $v['id'] }}" type="checkbox"> <span style="float:left;">{{ $v['hj_name'] }}</span>--}}
                            {{--</p>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                    {{--<p class="error" id="error1"></p>--}}
                {{--</div>--}}

                {{--<li>--}}
                    {{--<input style="margin-left: 236px; margin-top: 30px;" class="button" id="submit" type="submit" value="确认">--}}
                {{--</li>--}}
            {{--</form>--}}
        {{--</section>--}}
    </div>
    <script>
        $('.navListLi:first-child').css('height','50px');
      	$('.navListLi:nth-child(2)').css('height','50px');
      	$('.navListLi:nth-child(3)').css('height','50px');
      	$('.navListLi:nth-child(4)').css('height','50px');
      	$('.navListLi:nth-child(5)').css('height','50px');
      	$('.navListLi:nth-child(6)').css('height','50px');
      	$('.navListLi:nth-child(7)').css('height','50px');
        //$('.navListLi:last-child').css('height','50px');
    </script>
@stop