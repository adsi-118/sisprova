@extends('index')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ url('/css/botonstyle.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('star-rating/css/fa-stars.css') }}">
<link rel="stylesheet" type="text/css" href="{{url('plugins/dropzone/dropzone.css')}}">
@stop

@section('content')

<input type="hidden" name="url" value="{{ url('') }}">

<div class="row">
    <div class="col-md-12">
        <div class="block-header">
            <ol class="breadcrumb breadcrumb-bg-teal">
                <li><a href="{{ url('mesas') }}"><i class="material-icons">home</i> INICIO</a></li>
                <li><a href="{{ url('categorias/'.$categoria->mesa_id) }}"><i class="material-icons">library_books</i> {{strtoupper($mesa->nombre) }}</a></li>                        
                <li><a href="{{ url('publicaciones/'.$categoria->id) }}"><i class="material-icons">library_books</i> {{strtoupper($categoria->nombre) }}</a></li>            
            </ol>
        </div>

        <!-- PUBLICACION CREADA -->
        @if(Session::has('message'))
        <div class="alert bg-green animated fadeIn">
           <span style="font-size: 17px">{{ Session::get('message') }}</span>
        </div>
        @endif
    </div>



<div class="row" id="contenedorPublicaciones">  

<div class="col-md-12">
 @foreach( $publicaciones as $publicacion)

 <div class="col-md-6"> 

  <div class="card">
    <div class="header bg-red">
        <div class="avatar">
            @if( isset($publicacion->foto_perfil) )
            <img class="img-circle" src="{{ url('images/'.$publicacion->foto_perfil)}}" >
            @else
            <img class="img-circle" src="{{ url('images/default.png')}}" >
            @endif
        </div>    
        <div class="avatar-info">
            {{ $publicacion->nombre }}
            {{ $publicacion->apellido }}
            <br>
            <small title="<?php $date = new DateTime($publicacion->created_at) ?>{{ $date->format('d F Y')}}">Publicado
                <?php 
                if ( round((strtotime(date('Y-m-d')) - strtotime($publicacion->created_at))  / 86400) <= 30 && round((strtotime(date('Y-m-d')) - strtotime($publicacion->created_at))  / 86400) >0 ) {
                    echo 'hace '.round((strtotime(date('Y-m-d')) - strtotime($publicacion->created_at)) / 86400). ' días';
                }else if( round((strtotime(date('Y-m-d')) - strtotime($publicacion->created_at))  / 86400) <=0){
                    echo ' hoy';
                }else {
                    echo 'hace '.round( ((strtotime(date('Y-m-d')) - strtotime($publicacion->created_at)) / 86400) / 30) . ' meses';
                }
                ?>
            </small>
        </div>

        <!-- MENU EDITAR Y DENUNCIAR -->
        <ul class="header-dropdown m-r--5">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a id="txtPub" name="{{$publicacion->texto}}" href="#" data-toggle="modal" data-target="#modalEditar"
                        onclick="editar({{$publicacion->id}},this)"  class="waves-effect waves-block editar">Editar</a>
                    </li>                                                                
                    <li>
                        <a id="txtDen" href="#" data-toggle="modal" data-target="#modalDenunciar" onclick="denunciar({{$publicacion->id}})" class="waves-effect waves-block editar">Denunciar</a>
                    </li>
                    <li>
                        <a id="txtDen" href="#" onclick="eliminar({{$publicacion->id}},{{$publicacion->categoria_id}})" class="waves-effect waves-block editar">Eliminar</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
        <div class="body publicacion">
            @if($publicacion->imagen)                
            <div>
                <div>
                    <a data-lightbox="imagen-publicacion" href="{{ url('images/imgPublicaciones/'.$publicacion->imagen)}}" class="waves-effect waves-block">
                    <img align="right" style="width: 80px;height: 80px;" src="{{ url('images/imgPublicaciones/'.$publicacion->imagen)}}" class="ima">
                    </a>                
                    {{ $publicacion->texto }}
                </div>               
            </div>            
            @else
            <div>
                <div>{{ $publicacion->texto }}</div>                                     
            </div>    
            @endif

        </div>
        <!-- BOTON COMENTARIOS  -->
        <div class="boton">                                                
            <div style="margin-left: 15px">
                <span class="click-event">0/5</span>
            </div>
            <button type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float right">
                <a href="#" data-toggle="modal" data-target="#modalComentario" class=" waves-effect waves-block editar" onclick="com({{$publicacion->id}})" style="color:white"><i class="material-icons" >forum</i></a>
            </button>
        </div>

    </div>
   </div>                
   @endforeach
   </div>
</div>
<!-- FIN CONTENEDOR PUBLICACIONES -->


<!-- MODAL CREAR -->

<div id="modalCrear" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crear Publicación</h4>           
            </div>
  
        <form id="formGuardar" action="{{url('publicaciones')}}" method="POST" enctype="multipart/form-data">   
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="categoria_id" value="{{$categoria->id}}">         
            <div class="modal-body">    
                <textarea name="texto" rows="4" class="form-control no-resize" placeholder="Hola, escribe aquí el contenido de tu publicacion" autofocus="" required></textarea>
                <hr>            
                <input name="imagen" type="file" multiple />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input id="btnGuardar" type="submit" class="btn btn-default" value="Guardar">
            </div>
        </form>
        </div>
    </div>
</div>


<!-- MODAL EDITAR -->
<div id="modalEditar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Publicación</h4>            
            </div>
        <form id="formGuardar" action="{{url('publicaciones/'.$categoria->id)}}" method="POST" enctype="multipart/form-data">  
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="categoria_id" value="{{$categoria->id}}" >     
            <input type="hidden" name="id" id="input_id">   

            <div class="modal-body">
                <textarea id="txtTexto" name="texto" rows="4" class="form-control no-resize" placeholder="Hola, escribe aquí el contenido de tu publicacion" autofocus="" required></textarea>
                <hr>
                <input name="imagen" type="file" multiple />                     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input id="btnGuardar" type="submit" class="btn btn-default" value="Guardar">            
            </div>
        </form>
        </div>
    </div>
</div>


<!-- MODAL COMENTARIOS -->

<div id="modalComentario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comentarios</h4>            
            </div>
        <form method="POST" action="">
            <div class="modal-body">
                <div class="com-general">           
                    <input type="hidden" id="pub_id">

                    @if($comentarios)
                         @foreach ($comentarios as $comentario)
                            <div class="comentario">                               
                                {{$comentario->nombre}} {{$comentario->apellido}} :
                                {{$comentario->contenido}}
                            </div>
                        @endforeach
                    @else
                        <h2>No hay ningun comentario, sé el primero en comentar...</h2>    
                    @endif 
                   

                </div>
                <input type="text" name="" class="form-control" placeholder="Escribe aquí tu comentario" required> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input id="btnGuardar" type="submit" class="btn btn-default" value="Guardar">
            </div>
        </form>
        </div>
    </div>
</div>

<!-- MODAL DENUNCIAR -->

<div id="modalDenunciar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Denunciar Publicación</h4>            
            </div>
       <form>
            <div class="modal-body">
                <input type="hidden" name="id" id="pub_id_den">
                <h2>Seleccione una Opción:</h2>
                <ul style="list-style: none">
                @foreach ($denuncias as $denuncia)
                    <li>
                        <input name="group5" type="radio" id="{{$denuncia->id}}" class="with-gap radio-col-red">
                        <label for="{{$denuncia->id}}">{{$denuncia->contenido}}</label>                        
                    </li>
                @endforeach             
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input id="btnGuardar" type="submit" class="btn btn-default" value="Guardar">
            </div>
        </form>
        </div>
    </div>
</div>

<!-- BOTON PARA CREAR PUBLICACION  -->
<div class="contenedor">
    <button class="botonF1">
      <a href="#" data-toggle="modal" data-target="#modalCrear" class="waves-effect waves-block editar" style="color:white;text-decoration:none">+</a>
  </button>
</div>

</div>
@stop



@section('script')

<script type="text/javascript" src="{{ url('star-rating/jquery.star-rating.js') }}"></script>    
<script src="{{url('plugins/dropzone/dropzone.js')}}"></script>
<script type="text/javascript">


    $('.click-event').star_rating({
        click: function(clicked_rating, event) {
            event.preventDefault();

            this.rating(clicked_rating);
        }
    });

        //METODO EDITAR DE JAVASCRIPT
        function editar(id,text){
            var texto = $(text).attr("name");
            console.log(texto);
            $('#input_id').val(id);        
            $('#txtTexto').val(texto);
        }


        setTimeout(function(){
            $('.alert').addClass('fadeOut');
        }, 3000);

        setTimeout(function(){
            $('.alert').remove();
        }, 4000);

        function denunciar(id){
            $('#pub_id_den').val(id);
        }

        function com(id){
            $('#pub_id').val(id);
        }

        function eliminar(id,idCate){            
            var url = '{{url('/publicaciones/')}}'+"/"+idCate+"/e1/"+id;
            var opcion = confirm("Realmente desea eliminar esta publicaciòn?");
            if (opcion == true) {
                location.href =url;
            } else {
                location.reload();
            }
        }

        //AJAX FALTA AGREGAR LA PUBLICACION...

        // $('#btnGuardar').click(function(e){
        //     e.preventDefault();

        //     var formData = $('#formGuardar').serialize();

        //     $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('input[name=_token]').val()
        //             }
        //     });

        //     $.ajax({
        //         url  : $('input[name=url]').val() + '/publicaciones',
        //         method : 'POST',
        //         data : formData,
        //         success: function(data){
        //             if (data){
        //                 $('#modalCrear').modal('hide');

        //             }
        //         } 
        //     });
        // });


    </script>

    @stop