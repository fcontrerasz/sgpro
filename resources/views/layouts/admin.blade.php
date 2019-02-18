
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.titulo') }} - {{ config('app.subtitulo') }}</title>

     <link href="{{ asset('css/all.css') }}" rel="stylesheet">

     <link href="{{ url('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">


</head>

<body class="">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ url('/img/profile_small.jpg') }}" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Francisco Contreras</strong>
                             </span> <span class="text-muted text-xs block">Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{ url('/perfil') }}">Perfil</a></li>
                            <li><a href="{{ url('/contactos') }}">Contactos</a></li>
                            <li><a href="{{ url('/correo') }}">Correo</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <a href="{{ url('/admin') }}"><i class="fa fa-line-chart"></i> <span class="nav-label">Cuadro de Mando</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/usuarios') }}"><i class="fa fa-user"></i> <span class="nav-label">Usuarios</span></a>
                </li>
                <li >
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Expertos</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('/admin/expertos/estadisticas') }}">Estadísticas</a></li>
                        <li><a href="{{ url('/admin/expertos/planes') }}">Plan de Trabajo</a></li>
                        <li><a href="{{ url('/admin/expertos/rolero') }}">Rolero</a></li>
                        <li><a href="{{ url('/admin/expertos/actividades') }}">Historial de Actividades</a></li>
                        <li><a href="{{ url('/admin/expertos/organigrama') }}">Organización</a></li>
                    </ul>
                </li>
                <li >
                    <a href="#"><i class="fa fa-fire-extinguisher"></i> <span class="nav-label">Gestión de Activos</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('/admin/expertos/estadisticas') }}">Estadísticas</a></li>
                        <li><a href="{{ url('/admin/expertos/planes') }}">Listar Activos</a></li>
                    </ul>
                </li>
                <li >
                    <a href="#"><i class="fa fa-user-md"></i> <span class="nav-label">Salud Ocupacional</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('/admin/expertos/estadisticas') }}">Estadísticas</a></li>
                        <li><a href="{{ url('/admin/expertos/planes') }}">Vacunas</a></li>
                        <li><a href="{{ url('/admin/expertos/planes') }}">Exámenes Ocupacional</a></li>
                        <li><a href="{{ url('/admin/expertos/planes') }}">Exámenes Pre-Ocupacional</a></li>
                        <li><a href="{{ url('/admin/expertos/planes') }}">Exámenes Especiales</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Protocolos </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in" style="">
                        <li class="active">
                            <a href="#">Psicosocial <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse in" style="">
                                <li>
                                    <a href="#">Comites</a>
                                </li>
                                <li>
                                    <a href="#">Actividades</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Prexor</a></li>
                        <li>
                            <a href="#">Temer</a></li>
                        <li>
                            <a href="#">MMC</a></li>
                    </ul>
                </li>
               <!-- <li>
                    <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>
                </li>
                <li class="landing_link">
                    <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
                </li>
                <li class="special_link">
                    <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
                </li>-->
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ url('/img/a7.jpg') }}">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ url('/img/a4.jpg') }}">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ url('/img/profile.jpg') }}">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Salir
                                        </a>

                                        
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>This is main title</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">This is</a>
                        </li>
                        <li class="active">
                            <strong>Breadcrumb</strong>
                        </li>
                    </ol>
                </div>

            </div>

            <div class="wrapper wrapper-content" id="app">
                @yield('content')
            </div>
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2017
                </div>
            </div>

        </div>
        </div>

    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    <script src="{{ asset('/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    
    <script src="{{ asset('/js/patache.js') }}"></script>


    @yield('scripts')

</body>

</html>
