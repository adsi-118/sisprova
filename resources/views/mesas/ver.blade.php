@extends('index')
@section('styles')
    <link rel="stylesheet" href="{{url('/css/botonstyle.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
       
        <div class="block-header">
            <ol class="breadcrumb breadcrumb-bg-teal">
                <li><a href="{{ url('mesas') }}"><i class="material-icons">home</i> INICIO</a></li>                
            </ol>
        </div> 
        
         <!-- MESA CREADA -->
    @if(Session::has('message'))
    <div class="alert bg-green animated fadeIn">
      <span style="font-size: 17px">{{ Session::get('message') }}</span>
    </div>
    @endif
            
            <div class="row">
                @foreach($mesas as $mesa)

                <div class="col-sm-6 col-md-4">
                    
                    <div class="menu-mesa">
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a  href="#editMesa" onclick="edit('{{url('/mesas')}}/{{$mesa->id}}/edit')" data-toggle="modal" class="waves-effect waves-block editar">Editar</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect waves-block editar"
                                         onclick="eliminar({{$mesa->id}})">Eliminar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="info-box-3 mesa" onclick="window.location.href = '{{ url('categorias', $mesa->id) }}'">
                       
                        <div class="content">

                            <div class="number">
                                <span>{{strtoupper($mesa->nombre)}}</span>
                            </div>
                            
                            <div class="info-mesa">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span>Categorías:</span>
                                        <span class="badge bg-pink">{{ $mesa->categorias}}</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span>Publicaciones:</span>
                                        <span class="badge bg-cyan">{{ $mesa->publicaciones}}</span>
                                    </div>                                    
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="modal fade"  id="editMesa">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Editar</h4>
                        </div>
                    <form id="formedit">
                        <div class="modal-body">
                       
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="tablename">Nombre Mesa</label>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" id="idtable" name="id">
                                    <input id="tablename" name="nombre" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-default" onclick="trigger();" data-dismiss="modal">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>

           
        </div>
    </div>

    <!-- BOTON FLOTANTE -->
    <div class="contenedor">
         <button class="botonF1 bg-brown" data-toggle="modal" href='#modal1'>
            <i class="material-icons">mode_edit</i>
        </button>
    </div>

    <!-- CREAR MESA -->
        <div class="modal fade" id="modal1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Crear Mesa</h4>
                    </div>

                    <form id="formGuardar" action="{{url('mesas')}}" method="POST" enctype="multipart/form-data">   
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />                

                        <div class="modal-body">
                            <input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre de la mesa.." required autofocus="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <input id="btnGuardar" type="submit" class="btn btn-default" value="Guardar">
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>


@endsection
@section('script')
    <script> 
        /*
        *@param id = 'url'/mesa/$id/edit
        *traer el nombre de la mesa que se va editar usando el metodo edit de restful 
        */
    
        function edit(id){ 
                       
            $.get(id,'', function(respuesta) {
                var datos = JSON.parse(respuesta);
                $.each(datos, function(index, val) {
                        $('#tablename').val(val.nombre);
                        $('#idtable').val(val.id);
                });
            });
        }
        
        function trigger(){            
            var id = $('#idtable').val();
            var dato = $('#formedit').serialize();
            update(dato,id);
        }


        function eliminar(id){            
            var url = '{{url('/mesas/')}}'+"/e1/"+id;
            var opcion = confirm("Realmente desea eliminar esta Mesa?");
            if (opcion == true) {
                location.href =url;
            } else {
                location.reload();
            }
        }



/*no funciona*/
        function update(dato,id){
/* 
            $.post("putmesa",dato, function(respuesta) {
                var datos = JSON.parse(respuesta);
                $.each(datos, function(index, val) {
                        alert(val);
                });
            }); */
            
                var url = '{{url('/mesas/')}}'+"/"+id;
                
                $.ajax({
                url: url,
                type: 'PUT',
                data: dato,
                success: function(data) {
                     location.reload();
                     
                }
            });        
            }


            setTimeout(function(){
                        $('.alert').addClass('fadeOut');
            }, 4000);

            setTimeout(function(){
                        $('.alert').remove();
            }, 5000);

    </script>
@endsection