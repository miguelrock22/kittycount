<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="theme-color" content="#ffffff">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!!Html::style("plugins/alertifyjs/css/alertify.min.css")!!}
    {!!Html::style("bootstrap/css/bootstrap.min.css")!!}
    {!!Html::style("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css")!!}
    {!!Html::style("plugins/select2/select2.min.css")!!}

    {!!Html::style("https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/AdminLTE.min.css")!!}
    {!!Html::style("https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/skins/_all-skins.min.css")!!}

    <!-- Ionicons -->
    {!!Html::style("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")!!}

    {!!Html::style("https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/r-2.2.1/datatables.min.css")!!}
    {!!Html::style("plugins/datepicker/datepicker3.css")!!}
    {!!Html::style("plugins/iCheck/skins/all.css")!!}
    {!!Html::style("plugins/pace/pace.min.css")!!}
    {!!Html::style("css/default.css")!!}

    @yield('css')
</head>

<body class="sidebar-mini skin-black">
    <div class="pace  pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <span class="logo-mini">Gt - turbo</span>
                <span class="logo-lg">Gt-TURBO</b></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Miembro desde {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        {{--<footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>--}}

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    InfyOm Generator
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Ingreso</a></li>
                    {{--<li><a href="{!! url('/register') !!}">Register</a></li>--}}
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- jQuery 2.1.4 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    {!!Html::script("https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/r-2.2.1/datatables.min.js")!!}
    {!!Html::script("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js")!!}
    {!!Html::script("plugins/alertifyjs/alertify.min.js")!!}
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>-->

    {!!Html::script("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js")!!}
    {!!Html::script("https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js")!!}
    {!!Html::script("plugins/slimScroll/jquery.slimscroll.min.js")!!}

    {!!Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.js")!!}
    {!!Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/additional-methods.js")!!}
    {!!Html::script("https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/localization/messages_es.js")!!}
    {!!Html::script("plugins/typehead/bootstrap-typeahead.min.js")!!}
    {!!Html::script("plugins/datepicker/bootstrap-datepicker.js")!!}
    {!!Html::script("plugins/datepicker/locales/bootstrap-datepicker.es.js")!!}
    {!!Html::script("plugins/pace/pace.min.js")!!}
    {!!Html::script("plugins/jquery-priceformat/jquery.priceformat.min.js")!!}
    {!!Html::script("js/config.js")!!}
    <script>
        AppName = '{{ config('app.name', 'Laravel') }}';
    </script>
    <!-- AdminLTE App -->

    {!!Html::script("js/app.min.js")!!}

    @yield('scripts')
</body>
</html>