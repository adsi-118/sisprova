@extends('index')
@section('styles')
	<link rel="stylesheet" href="{{url('/')}}/css/mesaStyle.css">
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
        {{ Session::get('message') }}
    </div>
    @endif
            
            <div class="row">
                @foreach($mesas as $mesa)
                <div class="col-md-4">
					
                    <div class="info-box-3 bg-brown"  >
                       
                        <div class="content">
							
							<div class="icon">
								<i> <img src="{{url('/')}}/images/table.png" width="75px" height="75px"></i>
							</div>

							<div class="number">
                                <a id="{{$mesa->id}}" class="btn bg-brown waves-effect" href="{{ url('categorias', $mesa->id) }}" style="text-decoration:none">{{strtoupper($mesa->nombre)}}</a>
							</div>
							<button type="button" class="btn bg-brown waves-effect" href="#editMesa" onclick="edit('{{url('/mesas/'.$mesa->id.'/edit')}}');" data-toggle="modal" style="padding-left: 5px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;">
                            	<i class="material-icons">mode_edit</i>
                            </button>
							<button type="button" class="btn btn-danger waves-effect" style="padding-left: 5px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;">
                            	<i class="material-icons">delete</i>
                            </button>
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
                            <input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre de la mesa.." required>
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