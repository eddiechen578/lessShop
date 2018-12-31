<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="zh-TW" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="zh-TW" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="zh-TW">
<!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>線上商店/ONLINE SHOP</title>

    <script src="{{asset('/js/jquery-2.1.1.min.js')}}" type="text/javascript"></script>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" media="screen" />
    <script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="{{asset('/css/stylesheet.css')}}" rel="stylesheet">
    <script src="{{asset('/js/mystyle.js')}}" type="text/javascript"></script>
    <link href="{{asset('/css/lesscrew.css')}}" rel="stylesheet">
    <script src="{{asset('/js/lesscrew.js')}}" type="text/javascript"></script>

    <link href="{{asset('/css/owl.carousel.css')}}" type="text/css" rel="stylesheet" media="screen" />
    <link href="{{asset('/css/owl.transitions.css')}}" type="text/css" rel="stylesheet" media="screen" />
    <script src="{{asset('/js/common.js')}}" type="text/javascript"></script>
    <link href="http://lesscrew.com/shop/index.php?route=product/category&amp;path=59" rel="canonical" />
    <link href="http://lesscrew.com/shop/index.php?route=product/category&amp;path=59&amp;page=2" rel="next" />
    <link href="http://lesscrew.com/shop/image/catalog/logo_s.jpg" rel="icon" />
    <script src="{{asset('/js/owl.carousel.min.js')}}" type="text/javascript"></script>
</head>
<body class="product-category-59">
<nav id="top">
    <div class="container">
        <div id="logo">
            <a href="/admin/home"><img src="{{URL::asset('/img/logo.png')}}" title="LESS ONLINE SHOP" alt="LESS ONLINE SHOP" class="img-responsive" /></a>
        </div>
        <div id="top-links" class="nav pull-right">
            <ul class="list-inline">
                <li><a href="#"><i class="fa fa-phone"></i></a> <span class="hidden-xs hidden-sm hidden-md">0422233147</span></li>
                <li class="dropdown"><a href="" title="管理員" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md">管理員</span> <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        @if(Auth::check())
                            <li> {{ Auth::user()->name}}
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    登出
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                        @else
                        <li><a href="/login">登入</a></li>
                        @endif

                    </ul>
                </li>

                <li><a href="" id="wishlist-total" title="商品備忘簿 (0)"><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md">商品備忘簿 (0)</span></a></li>
                <li><button class="addBtn" style="background-color: white; border: 0px"><i class="fa fa-plus"></i> <span class="hidden-xs hidden-sm hidden-md">新增商品</span></button></li>


            </ul>

        </div>
    </div>
</nav>