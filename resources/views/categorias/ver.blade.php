@extends('index')

@section('styles')
        <link rel="stylesheet" type="text/css" href="{{ url('/css/botonstyle.css') }}">
@stop

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="block-header">
            <ol class="breadcrumb breadcrumb-bg-teal">
                <li><a href="{{ url('mesas') }}"><i class="material-icons">home</i> INICIO</a></li>
                <li><a href="{{ url('categorias/'.$mesa->id) }}"><i class="material-icons">library_books</i> {{strtoupper( $mesa->nombre)}}</a></li>                              
            </ol>
        </div>        

    <!-- CATEGORIA CREADA -->
    @if(Session::has('message'))
    <div class="alert bg-green animated fadeIn">
        {{ Session::get('message') }}
    </div>
    @endif
    
        <div class="row">
        
         @foreach ($categorias as $categoria)
            <div class="col-md-4">        
                <div class="info-box card">                
                    <div class="icon bg-purple">
                        <i class="material-icons">bookmark</i>
                    </div>
                    <div class="col-md-10" style="padding-left: 0px;">                      
                            <div class="content">
                                <div class="categoria" style="margin-top: 10px; margin-left: 10px">
                                    <a href="{{ url('publicaciones', $categoria->id) }}" style="text-decoration:none">{{ $categoria->nombre }}</a>
                                </div>                       
                            </div>                        
                    </div> 
                    <div class="col-md-2">
                        <div class="header">
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a  href="#modalEditar" data-toggle="modal" onclick="editar({{$categoria->id}},'{{$categoria->nombre}}')" class="waves-effect waves-block editar">Editar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>                                    
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>



<div class="contenedor">
    <button class="botonF1">
      <a href="#" data-toggle="modal" data-target="#modalCrear" class=" waves-effect waves-block editar" style="color:white;text-decoration:none">+</a>
  </button>
</div>


<!-- MODAL CREAR -->
</div>

<div id="modalCrear" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Categoria</h4>
        <h1></h1>
    </div>
    <form id="formGuardar" action="{{url('categorias')}}" method="POST" enctype="multipart/form-data">   
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="mesa_id" value="{{$mesa->id}}">     
        <input type="hidden" name="id" value="">     

        <div class="modal-body">    
            <h3>Escriba el Nombre de la Nueva Categoría</h3>    
            <input type="text" name="nombre" class="form-control" placeholder="Nombre.." autofocus required>
            <hr>           
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
       <div class="modal fade"  id="modalEditar">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title">Editar Categoria</h4>
                   </div>
               <form id="formGuardar" action="{{url('categorias/'.$mesa->id)}}" method="POST" enctype="multipart/form-data">  
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="mesa_id" value="{{$mesa->id}}">     
                <input type="hidden" name="id" id="input_id">     
                   
                   <div class="modal-body">                       
                       <div class="form-group">
                           <div class="form-line">
                               <label for="tablename">Nombre Categoria</label>                                                                                     
                               <input id="input_nombre" name="nombre" class="form-control" type="text"  autofocus required>
                           </div>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                       <input id="btnGuardar" type="submit" class="btn btn-default" value="Guardar">
                   </div>
               </form>
            </div>
       </div>
@stop
@section('script')

 <script type="text/javascript">

  setTimeout(function(){
            $('.alert').addClass('fadeOut');
        }, 4000);

        setTimeout(function(){
            $('.alert').remove();
        }, 5000);


    function editar(id,nombre){
        $('#input_id').val(id);        
        $('#input_nombre').val(nombre);
    }

  </script>

@stop