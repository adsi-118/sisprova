@extends('index')

@section('styles')
        <link rel="stylesheet" type="text/css" href="{{ url('/css/botonstyle.css') }}">
        <style>
            a b{
                color: red;
            }
        </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-teal">
                    <li><a href="{{ url('mesas') }}"><i class="material-icons">home</i> INICIO</a></li>
                    <li><i class="material-icons">search</i> A</li>
                </ol>
            </div>        
            
            <div class="row">
                <div class="col-md-3">
                    @foreach ($mesas as $mesa)
                        <div class="col-md-12">        
                            <div class="info-box card">                
                                <div class="icon bg-purple">
                                    <i class="material-icons">bookmark</i>
                                </div>
                                <div class="col-md-10" style="padding-left: 0px;">                      
                                    <div class="content">            
                                        <div style="margin-top: 10px;">
                                            <a href="{{url('publicaciones', $mesa->id)}}" style="text-decoration:none">{{strtoupper($mesa->nombre)}}</a>
                                        </div>                    
                                    </div>                       
                                </div>
                            </div>                         
                        </div> 
                    @endforeach
                </div>
                <div class="col-md-3">
                    @foreach ($categorias as $categoria)
                        <div class="col-md-12">        
                            <div class="info-box card">                
                                <div class="icon bg-purple">
                                    <i class="material-icons">bookmark</i>
                                </div>
                                <div class="col-md-10" style="padding-left: 0px;">                      
                                    <div class="content">            
                                        <div style="margin-top: 10px;">
                                            <a href="{{url('publicaciones', $categoria->id)}}" style="text-decoration:none">{{strtoupper($categoria->nombre)}}</a>
                                        </div>                    
                                    </div>                       
                                </div>
                            </div>                         
                        </div> 
                    @endforeach
                </div>
                <div class="col-md-3">
                    @foreach ($usuarios as $usuario)
                        <div class="col-md-12">        
                            <div class="info-box card">                
                                <div class="icon bg-purple">
                                    <i class="material-icons">bookmark</i>
                                </div>
                                <div class="col-md-10" style="padding-left: 0px;">                      
                                    <div class="content">            
                                        <div style="margin-top: 10px;">
                                            <a href="{{url('publicaciones', $usuario->id)}}" style="text-decoration:none">{{strtoupper($usuario->nombre)}}</a>
                                        </div>                    
                                    </div>                       
                                </div>
                            </div>                         
                        </div> 
                    @endforeach
                </div>
                <div class="col-md-3">
                    @foreach ($publicaciones as $publicacion)
                        <div class="col-md-12">        
                            <div class="info-box card">                
                                <div class="icon bg-purple">
                                    <i class="material-icons">bookmark</i>
                                </div>
                                <div class="col-md-10" style="padding-left: 0px;">                      
                                    <div class="content">            
                                        <div style="margin-top: 10px;">
                                            <a href="{{url('publicaciones', $publicacion->id)}}" style="text-decoration:none">{!!strtoupper($publicacion->texto)!!}</a>
                                        </div>                    
                                    </div>                       
                                </div>
                            </div>                         
                        </div> 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')

<script type="text/javascript">


</script>

@stop