<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SOCLUB</title>
     
     @yield('styles')
    <!-- Favicon-->
    <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="{{url('fonts/roboto.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('fonts/material.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{url('plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ url('lightbox2/css/lightbox.min.css') }}">

    <!-- Custom Css -->
     <link href="{{url('css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{url('css/estilos_soclub.css')}}">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('css/themes/all-themes.css')}}" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Espere un momento...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Buscar...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid cabecera">
            <div class="navbar-header">
                <a href="index.html"><img src="{{url('images/logo.png')}}" align="left" style="width: 70px; height: 50px; margin-right: 15px"></a>
                <a class="navbar-brand titulo_p" href="index.html">SOCLUB</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">3</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOVEDADES</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">create_new_folder</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Nueva publicacion</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> hace 2 minutos
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Estiven te envio un mensaje</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> hace dos dias 
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Se creó una nueva mesa</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> hace 1 dia
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">Ver todas</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->                    
                    <li class="pull-right"><a href="pages/examples/sign-in.html" data-close="true"><i class="material-icons">power_settings_new</i></a></li>
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">person</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        
         <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu" style="height: 1000px">
                <ul class="list ima">
                    <!--<li class="header" >ANUNCIOS</li>-->
                    <li class="active">
                        
                           <!-- <i class="material-icons">home</i>
                            <span>Home</span>-->
                        
                     <li class="header" ><b>ANUNCIOS</b></li>

                     <li>
                        <a data-lightbox="anuncios" href="{{url('images/anuncio1.png')}}" >
                            <img src="{{url('images/anuncio1.png')}}" class="ima">
                        </a>
                        <a data-lightbox="anuncios" href="{{url('images/anuncio2.png')}}" >
                            <img src="{{url('images/anuncio2.png')}}" class="ima">
                        </a>
                        <a data-lightbox="anuncios" href="{{url('images/anuncio3.png')}}" >
                            <img src="{{url('images/anuncio3.png')}}" class="ima">
                        </a>
                    </li>
                             
            <!-- #Footer -->

        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{url('images/user.png')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Estiven Sanchez</b></div>
                    <div class="email"><b>estiven@misena.edu.co</b></div>
                </div>
            </div>
            <!-- #User Info -->
            
            <div class="info-box bg-green hover-expand-effect item_conf">
                <div class="icon">
                    <i class="material-icons">account_circle</i>
                </div>
                <div class="content">
                    <div class="conf">PERFIL</div>
                </div>
            </div> 

             <div class="info-box  bg-orange  hover-expand-effect item_conf">
                <div class="icon">
                    <i class="material-icons">stars</i>
                </div>
                <div class="content">
                    <div class="conf">MESAS FAVORITAS</div>
                </div>
            </div> 

            <div class="info-box bg-green hover-expand-effect item_conf">
                <div class="icon">
                    <i class="material-icons">people</i>
                </div>
                <div class="content">
                    <div class="conf">CONTACTOS</div>
                </div>
            </div> 

            <div class="info-box bg-orange hover-expand-effect item_conf">
                <div class="icon">
                    <i class="material-icons">settings</i>
                </div>
                <div class="content">
                    <div class="conf">CONFIGURACIONES</div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">        
            @yield('content')
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{url('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url('plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{url('plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{url('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{url('plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{url('plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{url('plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{url('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{url('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{url('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{url('plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{url('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <script type="text/javascript" src="{{ url('lightbox2/js/lightbox.min.js') }}"></script>    

    <!-- Custom Js -->
    <script src="{{url('js/admin.js')}}"></script>
    <script src="{{url('js/pages/index.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{url('js/demo.js')}}"></script>
    @yield('script')
</body>

</html>