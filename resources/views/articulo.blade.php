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
    <div class="row justify-content-center">
        <!--<div class="row col-md-2">
            Lateral derecho
        </div>-->

        <div class="row col-md-11">
            <div class="row h2 m-3 text-info">
                <p class="text-center">{{ $articulo->titulo }}</p>

            </div>

            <div class="row m-3">
                <h5>{{ $articulo->subtitulo }}</h5>

            </div>
            <div class="row col-12 m-3">
                <img src="{{ $articulo->foto1 }}" width="100%" height="100%">

            </div>

            <div class="row m-3">
                <p>{{ $articulo->introduccion }}</p>
            </div>
        </div>
        <!--<div class="row col-md-2">
            Lateral derecho
        </div>-->

    </div>

    <!--COMENTARIOS-->

    <div class="container col-11 mt-5">
        <h2>Comentarios</h2>
        @foreach ($comentarios as $comentario)
        <div class="row media  p-3">

            <img src="https://sistemas.com/termino/wp-content/uploads/Usuario-Icono.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
            <div class="media-body">

                @php
                $nombreUsuario = \App\User::where('id', $comentario -> users_id)->get();
                @endphp

                <h4> {{ $nombreUsuario[0] -> name }} <small><i style="font-size: 12px">{{ $comentario -> fecha_hora }}</i></small></h4>
                <h5> {{ $comentario -> asunto }} </h5>
                <p>{{ $comentario -> texto}} </p>
                <span>Responder</span><br />

                @php
                $respuestas = \App\Respuesta_comentario::where('comentario_id', $comentario -> id)->get();
                @endphp

                @foreach ($respuestas as $respuesta)
                <div class="media p-3">
                    <img src="https://sistemas.com/termino/wp-content/uploads/Usuario-Icono.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">

                        @php
                        $nombreUsuario = \App\User::where('id', $respuesta -> users_id)->get();
                        @endphp

                        <h4> {{ $nombreUsuario[0] -> name }} <small><i style="font-size: 12px">{{ $respuesta -> fecha_hora }}</i></small></h4>
                        <p>{{ $respuesta -> texto}} </p>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
        @endforeach

        @if(count($comentarios) < 1) <h5 id="noComentario">No hay comentarios</h5>
            @endif
            <span id="comentar">Comentar</span>
            <div class="row">
                <form method="POST" action="/comentario" id="formComentario" style="display: none">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <label>Asunto</label><br />
                    <input type="text" name="asunto" placeholder="Asunto del comentario">
                    <label>Comentario</label><br />
                    <input type="text" name="texto" placeholder="Tu comentario">
                    <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="articulo_id" value="{{ $articulo->id }}">
                    <input type="submit" value="Publicar comentario">
                </form>

            </div>


    </div>

</div>

@endisset


@empty ( $articulo->titulo )
<div class="container-fluid bg-light">
    <div class="row h1 p-5">
        <p class="text-center">El artículo que estás buscando no se encuentra disponible en este momento</p>
        <br /><br /><br /><br />
    </div>


</div>
@endempty


@stop