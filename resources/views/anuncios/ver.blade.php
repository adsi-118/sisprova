@extends('index')

                   
@section('content')

<form id="formEditar" action="{{url('anuncios')}}" method="POST" enctype="multipart/form-data">	
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<table class="table table-striped">
		<thead>
			<th>Titulo</th>
			<th>Foto</th>
			<th>Editar</th>
			<th>Eliminar</th>
			<th>Deshabilitar 
			<button type="button" class="btn btn-default waves-effect" style="left: 39px;" onclick="crear()">
				<i class="material-icons">add</i></button></th>
		</thead>
		<tbody id="tabla">
			
			@foreach($anuncios as $anuncio)
				<tr class="tabla-anuncios" id="trAnuncio{{$anuncio->id}}">
					<td id="tdTitulo{{$anuncio->id}}" style="vertical-align: inherit;"><span style="margin-right: 69px;" id="titulo{{$anuncio->id}}">{{ $anuncio->titulo }}</span></td>
					<td style="padding-top: 0px;">
					<a data-lightbox="anuncios" data-title="{{$anuncio->titulo}}" href="{{url('/images/anuncios/'.$anuncio->foto)}}">
						<img src="{{url('/images/anuncios/'.$anuncio->foto)}}" class="ima" style="height: 100px;width:100px"></a>	
					</td>
						<td id="tdEditar{{$anuncio->id}}" style="vertical-align: inherit;"><a id="botonEditar{{$anuncio->id}}" href="#" onclick="editar({{$anuncio->id}})" class="btn">Editar</a></td>
						<td style="vertical-align: inherit;"><a href="#" onclick="eliminar({{$anuncio->id}})"class="btn">Eliminar</a></td>									
						<td style="vertical-align: inherit;"><a href="#" onclick="deshabilitar({{$anuncio->id}})" class="btn">Deshabilitar</a></td>									
				</tr>
			@endforeach			

		</tbody>
	</table>
</form>

@stop

@section('script')
<script type="text/javascript">

	function editar(id){

		var url = '{{url('/')}}/'+'/anuncios/'+id+'/edit';		

		$.get(url,'',function(respuesta){
		 	var datos = JSON.parse(respuesta);
			console.log(datos);
			$('#titulo'+id).remove();
			$('#tdTitulo'+id).append('<input id="actualiza'+datos[0].id+'" class="form-control" value="'+datos[0].titulo+'" name="titulo" style="width: 131px;"></input>');
			$('#botonEditar'+id).remove();
			$('#tdEditar'+id).append('<a id="botonGuardar'+datos[0].id+'" href="#" onclick="actualizar('+datos[0].id+')" class="btn">Guardar</a>');			
		});
	}

	function actualizar(id){
		var datos = $('#formEditar').serialize();

		datos += '&_method=PUT&id='+id;

		var id = id;

     	var url = '{{url('/')}}'+'/anuncios/'+id;	     

		$.ajax({
			url:url,
			type: 'POST',
			data: datos,
			success:function(data){				
				var datos = JSON.parse(data);
				$('#actualiza'+datos[0].id).remove();
				$('#tdTitulo'+id).append('<span id="titulo'+datos[0].id+'">'+datos[0].titulo+'</span>');
			}
		});
	}

	function deshabilitar(id){
		var url = '{{url('/')}}'+'/anuncios/e1/'+id;

		$.ajax({
			url:url,
			type: 'GET',			
			success:function(data){				
				alert(data);						
				$('#trAnuncio'+id).remove();

			}
		});
	}


	function eliminar(id){
		var url = '{{url('/')}}'+'/anuncios/'+id;	     


		$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name=_token]').val()
                    }
                });

		$.ajax({
			url:url,
			type: 'DELETE',			
			success:function(data){									
				$('#trAnuncio'+id).remove();
			}
		});
	}

	function crear(){
		var url = '{{url('/')}}'+'/anuncios/'+id;	     		
	}

</script>

@endsection