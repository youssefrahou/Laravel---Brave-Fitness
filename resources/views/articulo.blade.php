@extends('plantillas.inicio')

@section('titulo')

@isset ( $articulo )
{{ $articulo->titulo }} - Blave Fitness
@else
404 - Brave Fitness
@endisset

@stop

@section('body')

@if (session('mensaje'))
<div class="alert alert-success text-center col-12">
    {{ session('mensaje') }}
</div>
@endif


@isset ( $articulo->titulo )
<div class="container-fluid bg-light p-3">

    <div class="row col-md-6">
        <p>
            <a href="{{ url('/') }}"> Inicio </a> <span>> </span>
            <a href="{{ url('/articulos') }}">Articulos </a> <span>> </span> <span>{{ $articulo->titulo }} </span>
        </p>


    </div>

    <div class="row justify-content-center">
        <!--<div class="row col-md-2">
            Lateral derecho
        </div>-->


        <div class="row col-md-8">
            <div class="row col-12 h2 m-3 text-info">
                <p class="text-center">{!! $articulo->titulo !!}</p>
            </div>

            <div class="row m-3">
                <h5>{!! $articulo->subtitulo !!}</h5>

            </div>
            <div class="row col-12 m-3">
                <!--{{ asset('js/articulo.js') }}-->
                <img src="{{ url('/') }}/images/articulos/{{ $articulo->foto1 }}" width="100%" height="100%">

            </div>

            <div class="row m-3">
                <p>{!! $articulo->introduccion !!}</p>
            </div>
        </div>
        <!--<div class="row col-md-2">
            Lateral derecho
        </div>-->



        <!--COMENTARIOS-->

        <div class="row col-12 mt-5 justify-content-center">

            <div class="row col-12">

                <div class="row col-12 p-4 bg-info justify-content-center" id="mostrarComments">

                    <div class="row col-1 justify-content-start text-white">

                        <i class="far fa-comments fa-2x"></i>

                    </div>

                    <div class="row col-10 justify-content-center text-white">
                        <h3 class="text-center">Comentarios</h3>
                    </div>

                    <div class="row col-1 justify-content-end text-white">

                        <i class="fas fa-arrow-down fa-2x" id="bajarSubir"></i>

                    </div>


                </div>
            </div>

            <div class="row col-lg-10 justify-content-center" id="comments" style="display:none">

                @foreach ($comentarios as $comentario)
                <div class="row media p-3 col-12">

                    <img src="https://sistemas.com/termino/wp-content/uploads/Usuario-Icono.jpg" alt="John Doe"
                        class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">

                        @php
                        $nombreUsuario = \App\User::where('id', $comentario -> users_id)->get();
                        @endphp

                        <h4> {{ $nombreUsuario[0] -> name }} <small><i
                                    style="font-size: 12px">{{ $comentario -> fecha_hora }}</i></small></h4>
                        <h5> {{ $comentario -> asunto }} </h5>
                        <p>{{ $comentario -> texto}} </p>
                        @guest
                        @else
                        <span>Responder</span><br />
                        @endguest

                        @php
                        $respuestas = \App\Respuesta_comentario::where('comentario_id', $comentario -> id)->get();
                        @endphp

                        @foreach ($respuestas as $respuesta)
                        <div class="media p-3">
                            <img src="https://sistemas.com/termino/wp-content/uploads/Usuario-Icono.jpg" alt="John Doe"
                                class="mr-3 mt-3 rounded-circle" style="width:60px;">
                            <div class="media-body">

                                @php
                                $nombreUsuario = \App\User::where('id', $respuesta -> users_id)->get();
                                @endphp

                                <h4> {{ $nombreUsuario[0] -> name }} <small><i
                                            style="font-size: 12px">{{ $respuesta -> fecha_hora }}</i></small></h4>
                                <p>{{ $respuesta -> texto}} </p>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
                @endforeach

                @if(count($comentarios) < 1) <h5 id="noComentario">No hay comentarios</h5>
                    @endif

                    <div class="row col-12">
                        @guest

                        <p>Inicia sesión para poder comentar</p>
                        <button type="button" id="iniciarSesion"><a href="{{ url('login') }}">Iniciar
                                sesión</a></button>

                        @else
                        <span id="comentar">Comentar</span>


                        <div class="row">

                            <!-- Modal para publicar comentario -->
                            <div class="row">
                                <div class="modal fade" id="modalComentar" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Iniciar sesión</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form method="POST" action="{{ url('/comentario') }}"
                                                    id="formComentario" style="display: none">
                                                    @csrf
                                                    <!-- {{ csrf_field() }} -->
                                                    <label>Asunto</label><br />
                                                    <input type="text" name="asunto"
                                                        placeholder="Asunto del comentario">
                                                    <br>
                                                    <label>Comentario</label><br />
                                                    <input type="text" name="texto" placeholder="Tu comentario">

                                                    <input type="hidden" name="users_id"
                                                        value="{{ auth()->user()->id }}">

                                                    <input type="hidden" name="articulo_id" value="{{ $articulo->id }}">




                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-info"
                                                            value="Publicar comentario">
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endguest

                        </div>


                    </div>

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