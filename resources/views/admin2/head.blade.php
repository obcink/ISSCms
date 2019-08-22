<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <!--首页-->
    <link rel="stylesheet" href="{{ url('admin/css/index.css') }}">
    <!--bootstrap插件-->
    <link rel="stylesheet" href="{{ url('admin/css/bootstrap.css') }}">
    <!--修改密码-->
    <link rel="stylesheet" href="{{ url('admin/css/account.css') }}">
    <!--小程序页面：首页轮播图-->
    <link rel="stylesheet" href="{{ url('admin/css/indexBanner.css') }}">
    <!--用户管理-->
    <link rel="stylesheet" href="{{ url('admin/css/users.css') }}">
    <!--产品分类-->
    <link rel="stylesheet" href="{{ url('admin/css/addClassification.css') }}">
    <!--添加商品-->
    <link rel="stylesheet" href="{{ url('admin/css/addGoods.css') }}">
    <!--订单管理-->
    <link rel="stylesheet" href="{{ url('admin/css/order.css') }}">
    <!--物流设置-->
    <link rel="stylesheet" href="{{ url('admin/css/express.css') }}">
    <!--添加运费模板-->
    <link rel="stylesheet" href="{{ url('admin/css/addExpress2.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/service.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/order.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/member.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/rule.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/shouye.css') }}">
</head>
<body>
<!--navLeft-->
<!--左侧导航栏-->
<nav>
    <!--logo-->
    <div class="navLogo" style="font-size: 40px; line-height: 80px; text-align: center;">洁力小熊</div>
    <!--导航栏-->
    <ul class="navList" id="navList">
        <!--首页 -->
        <li class="navListLi">
            <!--首页-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/user.png') }}" alt="">
                <a href="{{ url('admin/index') }}"><p class="navTitle">首页</p></a>
            </div>
        </li>
        <!--我的账号-->
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/user.png') }}" alt="">
                <p class="navTitle">我的账号</p>
            </div>
            <!--分类子菜单-->
            <ul class="navListBottom">
                <li >
                    <!--默认-->
                    <a href="{{ url('admin/user/index') }}"><p class="navBottomTitle">账号管理</p></a>
                </li>
                <li >
                    <!--默认-->
                    <a href="{{ url('admin/permission/index') }}"><p class="navBottomTitle">权限管理</p></a>
                </li>
                <li >
                    <!--默认-->
                    <a href="{{ url('admin/operation/index') }}"><p class="navBottomTitle">操作记录</p></a>
                </li>
            </ul>
        </li>
        <!--用户管理-->
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/user.png') }}" alt="">
                <p class="navTitle">用户管理</p>
            </div>
            <!--分类子菜单-->
            <ul class="navListBottom">
                <li >
                    <a href="{{ url('admin/staff/index') }}"><p class="navBottomTitle">员工账号管理</p></a>
                </li>
                <li >
                    <a href="{{ url('admin/site/index') }}"><p class="navBottomTitle">本站用户管理</p></a>
                </li>
                <li >
                    <a href="{{ url('admin/only/index') }}"><p class="navBottomTitle">专属客户管理</p></a>
                </li>
                <li >
                    <a href="{{ url('admin/big/index') }}"><p class="navBottomTitle">大客户管理</p></a>
                </li>
                <li >
                    <a href="{{ url('admin/catebig/index') }}"><p class="navBottomTitle">大客户分类</p></a>
                </li>
                <li >
                    <a href="{{ url('admin/vip/index') }}"><p class="navBottomTitle">VIP用户管理</p></a>
                </li>
            </ul>
        </li>
        <!--商品-->
        {{--<li class="navListLi">--}}
            {{--<!--服务项目管理-->--}}
            {{--<div class="navTitleDiv">--}}
                {{--<img class="navImg" src="{{ url('admin/images/goods.png') }}" alt="">--}}
                {{--<a href="{{ url('admin/catebig/index') }}"><p class="navTitle"></p></a>--}}
            {{--</div>--}}
        {{--</li>--}}
        <li class="navListLi">
            <!--服务项目管理-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/goods.png') }}" alt="">
                <a href="{{ url('admin/goods/index') }}"><p class="navTitle">商品管理</p></a>
            </div>
        </li>
        <li class="navListLi">
            <!--服务项目管理-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/goods.png') }}" alt="">
                <a href="{{ url('admin/cate/index') }}"><p class="navTitle">商品分类管理</p></a>
            </div>
        </li>
        <!--服务项目-->
        <li class="navListLi">
            <!--服务项目管理-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/goods.png') }}" alt="">
                <a href="{{ url('admin/project/index') }}"><p class="navTitle">服务项目</p></a>
            </div>
        </li>
        <!--门店管理-->
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/order.png') }}" alt="">
                <a href="{{ url('admin/store/index') }}"><p class="navTitle">门店管理</p></a>
            </div>
        </li>
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/order.png') }}" alt="">
                <a href="{{ url('admin/catestore/index') }}"><p class="navTitle">门店分类管理</p></a>
            </div>
        </li>
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/user.png') }}" alt="">
                <p class="navTitle">卡券管理</p>
            </div>
            <!--分类子菜单-->
            <ul class="navListBottom">
                <li >
                    <!--默认-->
                    <a href="{{ url('admin/card/index') }}"><p class="navBottomTitle">卡券列表</p></a>
                </li>
                <li >
                    <!--默认-->
                    <a href="{{ url('admin/card/recode') }}"><p class="navBottomTitle">卡券核销记录</p></a>
                </li>
            </ul>
        </li>
        <!--交易记录-->
        {{--<li class="navListLi">--}}
            {{--<!--分类名称-->--}}
            {{--<div class="navTitleDiv">--}}
                {{--<img class="navImg" src="{{ url('admin/images/user.png') }}" alt="">--}}
                {{--<p class="navTitle">交易记录</p>--}}
            {{--</div>--}}
            {{--<!--分类子菜单-->--}}
            {{--<ul class="navListBottom">--}}
                {{--<li >--}}
                    {{--<a href="{{ url('admin/record/recharge') }}"><p class="navBottomTitle">充值流水记录</p></a>--}}
                {{--</li>--}}
                {{--<li >--}}
                    {{--<a href="{{ url('admin/record/order') }}"><p class="navBottomTitle">订单流水记录</p></a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        <!--订单管理-->
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/user.png') }}" alt="">
                <p class="navTitle">订单管理</p>
            </div>
            <!--分类子菜单-->
            <ul class="navListBottom">
                <li >
                    <a href="{{ url('admin/order/car') }}"><p class="navBottomTitle">洗车订单</p></a>
                </li>
                <li >
                    <a href="{{ url('admin/order/good') }}"><p class="navBottomTitle">商品订单</p></a>
                </li>
                <li >
                    <a href="{{ url('admin/order/card') }}"><p class="navBottomTitle">卡券订单</p></a>
                </li>
                <li >
                    <a href="{{ url('admin/order/day?hj_start_time=0') }}"><p class="navBottomTitle">员工洗车下单</p></a>
                </li>
                <li >
                    <a href="{{ url('admin/order/goodsorder?hj_start_time=0') }}"><p class="navBottomTitle">员工商品下单</p></a>
                </li>
            </ul>
        </li>
        <!--促销管理-->
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/distribution.png') }}" alt="">
                <p class="navTitle">促销管理</p>
            </div>
            <!--促销管理-->
            <ul class="navListBottom">
                <li>
                    <a href="{{ url('admin/integral/index') }}"><p class="navBottomTitle">积分管理</p></a>
                </li>
                <li>
                    <a href="{{ url('admin/coupon/index') }}"><p class="navBottomTitle">优惠券管理</p></a>
                </li>
            </ul>
        </li>
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/distribution.png') }}" alt="">
                <a href="{{ url('admin/car/index') }}"><p class="navTitle">车辆管理</p></a>
            </div>
        </li>
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/distribution.png') }}" alt="">
                <a href="{{ url('admin/config/index') }}"><p class="navTitle">网站配置</p></a>
            </div>
        </li>
        </li>
        <li class="navListLi">
            <!--分类名称-->
            <div class="navTitleDiv">
                <img class="navImg" src="{{ url('admin/images/distribution.png') }}" alt="">
                <a href="{{ url('admin/banner/index') }}"><p class="navTitle">轮播图管理</p></a>
            </div>
        </li>
    </ul>
</nav>
<div class="nav2"></div>
<!--header-->
<div class="header2"></div>
<header>
    <ul class="headerList">
        <li class="headerTitle">后台管理系统</li>
        <li class="heightDivLi">
            <div class="headerDiv">
                <p class="userName">{{ session('user')['hj_username'] }}</p>
                <p class="sign">已登录</p>
                <p class="esc"><a style="color: #fff; padding: 5px 10px; background-color: #3587ca; border: 1px solid #f2f4f7" href="{{ url('admin/loginout') }}">退出</a></p>
            </div>
        </li>
    </ul>
</header>



<script src="{{ url('admin/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ url('admin/js/index.js') }}"></script>
<script src="{{ url('admin/js/bootstrap.js') }}"></script>
<!--layer插件-->
<script src="{{ url('admin/layer/layer.js') }}"></script>
<!--修改密码-->
<script src="{{ url('admin/js/account.js') }}"></script>
<!--小程序页面：首页轮播图-->
<script src="{{ url('admin/js/indexBanner.js') }}"></script>
<!--用户管理-->
<script src="{{ url('admin/js/users.js') }}"></script>
<!--推广员管理-->
<script src="{{ url('admin/js/promoters.js') }}"></script>
<!--添加商品-->
<script src="{{ url('admin/js/addGoods.js') }}"></script>
<!--添加分类-->
<script src="{{ url('admin/js/addClassification.js') }}"></script>
<!--订单管理-->
<script src="{{ url('admin/js/order.js') }}"></script>
<!--收货地址-->
<script src="{{ url('admin/js/expressAddress.js') }}"></script>
<!--售后-->
<!--会员规则-->
<script src="{{ url('admin/js/rule.js') }}"></script>
<!--商品列表展示-->
<script src="{{ url('admin/js/list_shop.js') }}"></script>
<!--滑动按钮-->
<script src="{{ url('admin/js/switch.js') }}"></script>
@yield('content')
</body>
</html>