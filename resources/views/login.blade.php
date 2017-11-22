<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Expires" content="0"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <script type="text/javascript">
        if (history.forward(1)) {
            location.replace(history.forward(1));
        }
    </script>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Iniciar sesion | SOCLUB</title>
    <!-- Icono-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Fuentes de iconos y tipografia -->
    <link href="css/fonts.css" rel="stylesheet" type="text/css">

    <!-- Estilos SOCLUB -->
    <link rel="stylesheet" type="text/css" href="css/estilos_soclub.css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page fondo">
    <div class="login-box">
        <div class="logo">
            <h1 class="tit">SOCLUB</h1>
        </div>

        @if(Session::has('message1'))
                <div class="card">
                    <div class="body animated rubberBand" style="background-color: #228be6; color: black; text-align: center; font-size: 42px; font-weight: bold; height: 59px; padding: 3px;">
                        {{ Session::get('message1') }}
                    </div>
                </div>
        @endif

        @if(Session::has('message2'))
                <div class="card">
                    <div class="body animated rubberBand" style="background-color: #d01515; color: black; text-align: center; font-size: 42px; font-weight: bold; height: 59px; padding: 3px;">
                        {{ Session::get('message2') }}
                    </div>
                </div>
        @endif

        <div class="card">
            <div class="body">
                <form id="sign_in" action="check" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="msg">Iniciar sesion</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" style="width: 180px" class="form-control" name="email" maxlength="15" placeholder="Digite Correo" value="{{old('email')}}" required>

                            <label>@misena.edu.co</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Digite Contraseña" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-orange waves-effect" type="submit">INGRESAR</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="register">Registrame ahora!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Recordar contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/examples/sign-in.js"></script>
</body>

</html>