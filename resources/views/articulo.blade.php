@extends('plantillas.inicio')

@section('titulo')

@isset ( $articulo )
{{ $articulo->titulo }} - Blave Fitness
@else
404 - Brave Fitness
@endisset

@stop

@section('body')

@isset ( $articulo->titulo )
<div class="container-fluid bg-light p-3">
    <div class="row h1 m-3 text-info">
        <p class="text-center">{{ $articulo->titulo }}</p>
    
    </div>

    <div class="row h3 m-3">
        <p>{{ $articulo->subtitulo }}</p>
    
    </div>
    <div class="row h3 m-3">
        <img src="{{ $articulo->foto1 }}" width="100%" height="50%">
    
    </div>

    <div class="row h3 m-3">
    <p>{{ $articulo->introduccion }}</p>
    </div>

</div>

@endisset


@empty ( $articulo->titulo )
<div class="container-fluid bg-light">
    <div class="row h1 p-5">
        <p class="text-center">El articulo que ud busca no se encuentra disponible en este momento</p>
        <br/><br/><br/><br/>
    </div>


</div>
@endempty


@stop