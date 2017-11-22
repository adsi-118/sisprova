<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv='Expires' content='0'/>
    <meta http-equiv='Pragma' content='no-cache'/>
    <title>SOCLUB</title>

     @yield('styles')
    <!-- Icono-->
    <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon">

    <!-- Fuentes de iconos y tipografia -->
    <link rel="stylesheet" href="{{url('css/fonts.css')}}"  type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{url('plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">

    <!-- Plugin imagenes -->
    <link rel="stylesheet" type="text/css" href="{{ url('lightbox2/css/lightbox.min.css') }}">

    <!-- Estilos SOCLUB -->
    <link rel="stylesheet" type="text/css" href="{{url('css/estilos_soclub.css')}}">

    <!-- Todos los temas-->
    <link href="{{url('css/themes/all-themes.css')}}" rel="stylesheet" />
</head>


<body class="theme-green">

    <input type="hidden" name="_url" value="{{ url('') }}">  

    <!--INICIO mientras carga la pagina-->
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
    <!--FIN mientras carga la pagina-->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- INICIO Barra de busqueda -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Buscar..." id="buscar">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- FIN Barra de busqueda -->

    <!-- INICIO Barra de arriba -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <div class="logo">
                    <a href="{{url('/mesas')}}"><img src="{{url('images/logo.png')}}" align="left" style="width: 70px; height: 50px; margin-left: 10px;"></a>
                    <a class="navbar-brand titulo" href="{{url('/mesas')}}">SOCLUB</a>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- INICIO Icono buscador -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- FIN Icono buscador -->
                    <!-- INICIO Novedades -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">5</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOVEDADES</li>
                            <li class="body">
                                <ul class="menu">
                                   <li>
                                        <a href="javascript:void(0);">
                                            <!-- Clase para los iconos de las notificaciones -->
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
                    <!-- FIN Novedades -->

                    <!-- INICIO Icono cerrar sesion -->
                    <li class="pull-right"><a href="{{ url('logout') }}" data-close="true"><i class="material-icons">power_settings_new</i></a></li>
                    <!-- FIN Icono cerrar sesion -->

                    <!-- INICIO Icono perfi -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">person</i></a></li>
                    <!-- FIN Icono perfi -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- FIN Barra de arriba -->

    <section>
        <!-- INICIO Barra izquierda -->
        <aside id="leftsidebar" class="sidebar">
            <!-- INICIO Anuncios -->
            <div class="menu">
                <ul class="list ima">
                    <li class="active">
                   <!--Espacio donde se visualizaran los anuncios-->
                    </li>
                </ul>
            </div>
            <!-- FIN Anuncios -->

            <!-- INICIO Boton del chat -->
            <div class="legal">
                <center>
                    <h3>BOTON DEL CHAT</h3>
                </center>
            </div>
            <!-- FIN Boton del chat-->

        </aside>
        <!-- FIN Barra izquierda -->

        <!-- INICIO Barra derecha -->
        <aside id="rightsidebar" class="right-sidebar">
                <!-- INICIO Informacion del perfil -->
                <div class="user-info">
                    <div class="image">
                        <img src="{{url('images/user.png')}}" width="48" height="48" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Estiven Sanchez</b></div>
                        <div class="email"><b>estiven@misena.edu.co</b></div>
                    </div>
                </div>

                <div style="height: 350px; overflow-y: scroll;">
                    <div class="info-box bg-green hover-expand-effect item_conf">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <h3 class="conf">PERFIL</h3>
                        </div>
                    </div> 

                     <div class="info-box  bg-orange  hover-expand-effect item_conf">
                        <div class="icon">
                            <i class="material-icons">stars</i>
                        </div>
                        <div class="content">
                            <h3 class="conf">MESAS FAVORITAS</h3>
                        </div>
                    </div> 

                    <div class="info-box bg-green hover-expand-effect item_conf">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <h3 class="conf">CONTACTOS</h3>
                        </div>
                    </div> 

                    <div class="info-box bg-orange hover-expand-effect item_conf">
                        <div class="icon">
                            <i class="material-icons">settings</i>
                        </div>
                        <div class="content">
                            <h3 class="conf">CONFIGURACIONES</h3>
                        </div>
                    </div>

                    <a href="{{url('anuncios')}}" style="text-decoration: none;">
                    <div class="info-box bg-green hover-expand-effect item_conf">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <h3 class="conf">GESTIONAR ANUNCIOS</h3>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- #FIN Informacion del perfil -->

        </aside>
        <!-- FIN Barra derecha -->
    </section>

    <!-- INICIO Contenido -->
    <section class="content">
        <div class="container-fluid">
            <!-- INICIO Mesas -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="mesas">                 
                    @yield('content')
                    </div>
                </div>
            </div>
            <!-- FIN Mesas -->
        </div>
    </section>
    <!-- FIN Contenido -->

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

    <!-- Light box Plugin Js-->
    <script type="text/javascript" src="{{ url('lightbox2/js/lightbox.min.js') }}"></script>    

    
     <!--Script que se encarga de mostrar los anuncios en todas las vistas-->
    <script type="text/javascript">

        var url = $('[name="_url"]').val();

        $.ajax({
            url : url + '/anuncios',
            method : 'GET',
            type : 'JSON',

            success : function(data){

                $('.ima .active').html('');

                $.each(data, function(i, anuncio){
                    $('.ima .active').append('<li><a data-lightbox="anuncios" data-title="'+anuncio.titulo+'" href="'+url+'/images/anuncios/'+anuncio.foto+'" ><img src="'+url+'/images/anuncios/'+anuncio.foto+'" class="ima"></a></li>');
                });
            } 
        });

    </script>
    <!-- Custom Js -->
    <script src="{{url('js/admin.js')}}"></script>

    <!-- Modificacion del scroll --> 
    <script type="text/javascript">
        
        $(document).ready(function(){
            $('.slimScrollDiv').css('height', '100%');
            $('.slimScrollDiv .list').css('height', '100%');
            $('.slimScrollBar').css('width', '10px');
        });

        $('#buscar').keypress(function(e){
            if(e.which == 13) {
                location.href = url + '/busqueda/' + $(this).val();
            }
        });

    </script>
    <script type='text/javascript'>
        if (history.forward(1)) {
            location.replace(history.forward(1));
        }
    </script>";

    <!-- Demo Js -->
    <script src="{{url('js/demo.js')}}"></script>

    @yield('script')
</body>

</html>