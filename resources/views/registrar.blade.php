<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Registrarme | SOCLUB</title>
    <!-- Favicon-->
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

<body class="signup-page fondo">
    <div class="signup-box">
        <div class="logo">
            <h1 class="tit">SOCLUB</h1>
        </div>
        <div class="card" style=" overflow-y: auto; height: 542px;">
            <div class="body">
                <form id="sign_up" action="create" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="msg">Registrarme</div>

                    <div class="input-group">
                        <span class="input-group-addon">
                        <span class="req">*</span>
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombres" value="{{old('nombre')}}" onkeypress="return soloLetras(event)" required autofocus>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                        <span class="req">*</span>
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="apellido" placeholder="Apellidos" value="{{old('apellido')}}" onkeypress="return soloLetras(event)" required autofocus>
                        </div>
                    </div>

                    <div class="input-group" style="margin-top: 10px">
                        <span class="input-group-addon">
                        <span class="req">*</span>
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">                            
                           <input type="text" class="form-control" style="width: 180px" name="email"  value="{{old('email')}}" maxlength="15" placeholder="Ingrese el correo" required>
                            
                            <label>@misena.edu.co</label>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                        <span class="req">*</span>
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" id="pass1" class="form-control" name="password" minlength="6" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                        <span class="req">*</span>
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" id="pass2" class="form-control" name="password_confirmation" minlength="6" placeholder="Confirmar Contraseña" onmouseout="comprobar()" required>
                        </div>
                    </div>

                    <label id="mensaje1" style="visibility: hidden; color: red;" class="error" >Las contraseñas no coinciden</label>
                    
                    <button class="btn btn-block btn-lg bg-orange waves-effect ejem" type="button">CONTINUAR</button>

                    <div class="mi" style="display: none;">

                    <label style="margin-top: 8px">Fecha de Nacimiento:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                        <span class="req">*</span>
                            <i class="material-icons">perm_contact_calendar</i>
                        </span>
                        <div class="form-line">
                            <input type="date" class="form-control"  name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}"  required autofocus step="1" min="1940-01-01" max="{{ date('Y-m-d', strtotime('-13 year', strtotime(date('Y-m-d')) ) ) }}" value="0000-00-00" placeholder="Fecha de nacimiento" required>
                        </div>
                    </div>

                    <label style="margin-top: 8px">Genero:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                        <span class="req">*</span>
                            <i class="material-icons">wc</i>
                        </span>
                        <div>
                            @if( old('genero') =='M')
                                        <input class="radio-col-orange" type="radio" name="genero" id="generoM"  value="M" checked>
                                        <label for="generoM">Masculino</label>
                                        <input class="radio-col-orange" type="radio" name="genero" id="generoF" value="F">
                                        <label for="generoF">Femenino</label>
                                    @elseif(old('genero') =='F')
                                        <input class="radio-col-orange" type="radio" name="genero" id="generoM"  value="M">
                                        <label for="generoM">Masculino</label>
                                        <input class="radio-col-orange" type="radio" name="genero" id="generoF" value="F" checked>
                                        <label for="generoF">Femenino</label>
                                    @else
                                     <input class="radio-col-orange" type="radio" name="genero" id="generoM"  value="M">
                                        <label for="generoM">Masculino</label>
                                        <input class="radio-col-orange" type="radio" name="genero" id="generoF" value="F">
                                        <label for="generoF">Femenino</label>

                                    @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-orange">
                        <label for="terms">Leí y acepto los <a href="javascript:void(0);">terminos de uso</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-orange waves-effect" type="submit">REGISTRARME</button>
                    </div>

                    <label style="margin: 13px 0px -16px 0px;"><span class="req" style="float: left; margin-right: 10px;">*</span>Los campos con asterisco son requeridos</label>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="login">Ya tienes cuenta?</a>
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
    <script src="js/examples/sign-up.js"></script>
    <script type="text/javascript">
        $(function(){

            $(".ejem").click(function() {
                $(".mi").slideToggle(500);
                
                $('#registrar').animate({
                    scrollTop: 500
                }, 1000);

                $(this).hide('slow');
            });

        });
    </script>

    <script>
 // En esta funcion comprobamos que la contraseña sea igual a la confirmacion de esta
        function comprobar(){
            var pass1 = $('#pass1').val();
            var pass2 = $('#pass2').val();

            var mensaje1 = $('#mensaje1');

             if (pass1 == pass2) {
              mensaje1.css('visibility', 'hidden');
              return true;
            } 

            if (pass1 != pass2) {
              mensaje1.css('visibility', 'visible');
              return false;
            } 


        }
        //con esta funcion validamos que  en los campos solo ingresen letras
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    /*function prueba(){
        var texto = document.getElementsByName("nombre")[0].value;
        if(texto.trim() === ''){
            alert("Esta vacio!!!!");
        }
    }
    onblur="prueba()"*/
</script>
</body>

</html>