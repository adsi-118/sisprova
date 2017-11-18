@extends('index')

                   
@section('anuncios')


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


@stop

