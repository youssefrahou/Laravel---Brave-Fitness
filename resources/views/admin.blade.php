@extends('plantillas.admin')


@section('lateral')

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $totalUsuarios }}</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item" id="verUsuarios">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver usuarios</p>
                </span>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Articulos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $totalArticulos }}</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item" id="verArticulos">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver artículos</p>
                </span>
            </li>
            <li class="nav-item" id="escribirArticulo">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Escribir artículo</p>
                </span>
            </li>

        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
                Consejos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $totalConsejos }}</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item" id="verConsejos">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver consejos</p>
                </span>
            </li>
            <li class="nav-item" id="anadirConsejo">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Escribir consejo</p>
                </span>
            </li>

        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                Comentarios
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $totalComentarios }}</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item" id="verComentarios">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver todos los comentarios</p>
                </span>
            </li>
            <li class="nav-item" id="verComentariosSinLeer">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver comentarios sin leer</p>
                </span>
            </li>

        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Mensajes
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $totalMensajes }}</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver todos los mensajes</p>
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver mensajes sin leer</p>
                </span>
            </li>

        </ul>
    </li>

</ul>

@stop


@section('contenido')

<div class="row">

    <!-- Mensaje de bienvenida -->
    <div class="table-responsive justify-content-center" id="bienvenida">
        <p class="h3 text-center">Bienvenido a Brave Fitness. Elige una opción en el menú lateral. </p>
    </div>
    <!-- Mensaje de bienvenida -->


    <!-- Tabla usuarios -->
    <div class="table-responsive" style="display: none" id="ensenarUsuarios">
        <h3>Usuarios</h3>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Peso</th>
                <th>Sexo</th>
                <th>Objetivo</th>
                <th>Foto perfil</th>
                <th>Foto dieta</th>

            </tr>

            @isset ( $usuarios )
            @foreach ($usuarios as $usuario)

            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->apellido1 }} {{ $usuario->apellido2 }}</td>
                <td>{{ $usuario->peso }}</td>
                <td>{{ $usuario->sexo }}</td>
                <td>{{ $usuario->objetivo }}</td>
                <td>{{ $usuario->fotoPerfil }}</td>
                <td>{{ $usuario->fotoDieta }}</td>
            </tr>

            @endforeach
            @endisset

        </table>
    </div>
    <!-- Tabla usuarios -->


    <!-- Escribir articulo -->
    <div class="row col-12" style="display: none" id="crearticulo">
        <h3>Escribir artículo</h3>
        <div class="row col-12">

            <form id="formArticulo" action="{{ url('articulo') }}" method="POST" class="col-md-12 was-validated"
                accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Selecciona la categoría del artículo: </label>
                    <select class="form-control" name="categoria_id" id="selectCate" required>

                        <option value="">Selecciona categoría</option>
                        @foreach ($categorias as $categoria)

                        <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>

                        @endforeach
                        <option value="anadir">Añadir categoría</option>

                    </select>
                    <div class="invalid-feedback">Selecciona una categoría. Si no aparece, añádela con la última opción.
                    </div>
                </div>

                <div class="form-group">
                    <label for="uname">Título:</label>
                    <input type="text" class="form-control" id="tit" value="{{ old('titulo') }}"
                        placeholder="Escribe el título" name="titulo" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe el título.</div>
                </div>

                <div class="form-group">
                    <label for="uname">Subtítulo:</label>
                    <input type="text" class="form-control" id="subti" value="{{ old('subtitulo') }}"
                        placeholder="Escribe el subtítulo" name="subtitulo" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe el subtítulo.</div>
                </div>

                <div class="form-group">
                    <label for="uname">Introducción:</label>
                    <textarea class="form-control" id="intro" rows="4" name="introduccion"
                        required>{{ old('introduccion') }}</textarea>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe la introducción.</div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Primera imagen</label>
                    <input type="file" class="form-control-file" id="foto1" name="foto1" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, selecciona una imagen.</div>
                </div>

                <div class="form-group">
                    <label for="uname">Pie de la primera imagen:</label>
                    <input type="text" class="form-control" value="{{ old('pie_imagen1') }}" id="subti"
                        placeholder="Escribe el pie de la primera imagen" name="pie_imagen1" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe el pie de la primera imagen.</div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                </div>


                <button type="submit" id="subirArticulo" class="btn btn-primary">Publicar artículo</button>
            </form>
        </div>
        <!-- Escribir articulo -->


        <!-- Modal para añadir categoria -->
        <div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir nueva categoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formCateegoria" action="{{ url('categoria') }}" method="POST"
                            class="col-md-12 was-validated" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="uname">Nombre de la categoría:</label>
                                <input type="text" class="form-control" id="tit" value="{{ old('nombre_categoria') }}"
                                    placeholder="Escribe el nombre de la categoría" name="nombre_categoria" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Por favor, escribe el nombre de la categoría.</div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar categoría</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal para añadir categoria -->

    </div>
    <!-- Escribir articulo -->



    <!-- Ver articulos -->
    <div class="row col-12" style="display: none" id="ensenarArticulos">
        <div class="container-fluid">

            <section class="details-card">
                <div class="container">

                    <div class="row">

                        @isset($articulos)

                        @foreach($articulos as $articulo)

                        @php

                        $titulo = substr($articulo->titulo, 0, 60);

                        if (strlen($titulo) == 60){
                        $titulo = $titulo . "...";
                        };

                        $texto = substr($articulo->introduccion, 0, 180);

                        if (strlen($texto) == 180){
                        $texto = $texto . "...";
                        };
                        @endphp


                        <div class="col-lg-4 p-2">
                            <div class="card-content">
                                <div class="card-img" style="height: 240px">
                                    @if($articulo->foto1)

                                    <img src="{{ url('/') }}/images/articulos/{{ $articulo->foto1 }}" alt="Imagen"
                                        width="100%">

                                    @else

                                    <img src="https://www.solac.com/images/blank_product.png"
                                        alt="Imagen no disponible">

                                    @endif

                                    <span>
                                        <h4>PREMIUM</h4>
                                    </span>
                                </div>
                                <div class="card-desc">
                                    <h4 style="height: 90px">{!! $titulo !!} </h4>
                                    <p style="height: 120px">{!! $texto !!}</p>
                                    <a href="articulo/{{$articulo->id}}" class="btn btn-info">LEER</a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        @endisset

                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- Ver articulos -->

    <!-- Ver consejos -->
    <div class="row col-12" style="display: none" id="ensenarConsejos">
        <div class="container-fluid">

            <section class="details-card">
                <div class="container">

                    <div class="row">

                        @isset($consejos)

                        @foreach($consejos as $consejo)

                        @php

                        $titulo = substr($consejo->titulo, 0, 60);

                        if (strlen($titulo) == 60){
                        $titulo = $titulo . "...";
                        };

                        $texto = substr($consejo->texto, 0, 180);

                        if (strlen($texto) == 180){
                        $texto = $texto . "...";
                        };
                        @endphp


                        <div class="col-lg-4 p-2">
                            <div class="card-content">
                                <div class="card-img" style="height: 240px; border-bottom: 0.5px solid gray">
                                    @if($consejo->foto)

                                    <img src="{{ url('/') }}/images/consejos/{{ $consejo->foto }}" alt="Imagen"
                                        width="100%">

                                    @else

                                    <img src="https://www.solac.com/images/blank_product.png"
                                        alt="Imagen no disponible">

                                    @endif

                                </div>
                                <div class="card-desc">
                                    <h4 style="height: 90px">{!! $titulo !!} </h4>
                                    <p style="height: 120px">{!! $texto !!}</p>
                                    <span>{{$consejo->fecha}}</span><br />
                                    <a href="" class="btn btn-danger">Borrar</a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        @endisset

                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- Ver consejos -->

    <!-- Modal para añadir CONSEJO -->
    <div class="modal fade" id="modalConsejo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo consejo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="formConsejo" action="{{ url('consejo') }}" method="POST" class="col-md-12 was-validated"
                        accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="uname">Título del consejo:</label>
                            <input type="text" class="form-control" value="{{ old('titulo') }}"
                                placeholder="Escribe el titulo del consejo" name="titulo" required>
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Por favor, escribe el título del consejo.</div>
                        </div>

                        <div class="form-group">
                            <label for="uname">Consejo:</label>
                            <textarea class="form-control" rows="3" name="texto" required>{{ old('texto') }}</textarea>
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Por favor, escribe el consejo.</div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Imagen <i>(opcional)</i></label>
                            <input type="file" class="form-control-file" name="foto">
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Por favor, selecciona una imagen.</div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar categoría</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal para añadir CONSEJO -->

    <!-- Ver todos comentarios -->
    <div class="row col-12" style="display: none" id="ensenarComentarios">
        <div class="container-fluid">

            <section class="details-card">
                <div class="container">

                    <div class="row">

                        @isset($comentarios)

                        @foreach($comentarios as $comentario)

                        @php

                        $titulo = substr($comentario->titulo, 0, 60);

                        if (strlen($titulo) == 60){
                        $titulo = $titulo . "...";
                        };

                        $texto = substr($comentario->texto, 0, 180);

                        if (strlen($texto) == 180){
                        $texto = $texto . "...";
                        };
                        @endphp


                        <div class="col-lg-4 p-2">

                            @if($comentario->leido == 0)
                            <div class="card-content p-5" style="background-color: #D7D7D7">

                                @php
                                $articulo = \App\Articulo::where('id', $comentario -> articulo_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Artículo:</h5>
                                    <p>{{$articulo[0]->titulo}}</p>

                                </div>


                                <div class="row col-12">
                                    <h5 class="col-12">Asunto:</h5>
                                    <p>{{$comentario->asunto}}</p>
                                    <h5 class="col-12">Comentario:</h5>
                                    <p>{{$comentario->texto}}</p><br />

                                </div>

                                @php
                                $nombreUsuario = \App\User::where('id', $comentario -> users_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Usuario: </h5>
                                    <p>{{$nombreUsuario[0]->name}}</p><br />
                                </div>


                                <div class="row col-12">
                                    <span class="col-12">{{$comentario->fecha_hora}}</span>

                                    <!-- CONTESTAR comentario -->

                                    <button class="btn btn-info col-md-6" id="contestarComentario">Contestar</button>
                                    <!-- CONTESTAR comentario -->

                                    <!-- Modal para CONTESTAR comentario -->
                                    <div class="modal fade" id="modalContestarComentario" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Responder comentario
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="formRespuestaLeid" action="{{ url('respuesta') }}"
                                                        method="POST" class="col-md-12 was-validated"
                                                        accept-charset="UTF-8" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="uname" class="w-100">Comentario:
                                                                "<i>{{ $comentario->texto }}</i>"</label>
                                                            <label for="uname">Respuesta:</label>
                                                            <input type="text" class="form-control" id="tit"
                                                                value="{{ old('texto') }}"
                                                                placeholder="Escribe la respuesta al comentario"
                                                                name="texto" required>
                                                            <div class="valid-feedback">Válido.</div>
                                                            <div class="invalid-feedback">Por favor, escribe la
                                                                respuesta.</div>
                                                        </div>
                                                        <input type="hidden" name="leido" value="1">
                                                        <input type="hidden" name="users_id"
                                                            value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="comentario_id"
                                                            value="{{ $comentario->id }}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <input type="submit" class="btn btn-success col-md-6"
                                                        style="display:none" value="M">

                                                    <button type="button" id="enviarYmarcar"
                                                        class="btn btn-success">Responder</button>
                                                </div>
                                                </form>

                                                <!-- Marcar como leído -->
                                                <form id="formLeidoMarc"
                                                    action="{{ url('comentario')}}/{{$comentario->id}}" method="POST"
                                                    class="col-md-12" accept-charset="UTF-8"
                                                    enctype="multipart/form-data">

                                                    <input type="hidden" name="_token" id="token"
                                                        value="{{ csrf_token() }}">

                                                    {{ method_field('PUT') }}

                                                    <input type="hidden" value="1" name="leido">
                                                    <input type="submit" class="btn btn-success col-md-6"
                                                        style="display:none" value="Marcar leído">

                                                </form>
                                                <!-- Marcar como leído -->


                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal para CONTESTAR comentario -->



                                    <!-- Marcar como leído -->
                                    <form id="formLeido" action="{{ url('comentario')}}/{{$comentario->id}}"
                                        method="POST" class="col-md-12" accept-charset="UTF-8"
                                        enctype="multipart/form-data">

                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                        {{ method_field('PUT') }}

                                        <input type="hidden" value="1" name="leido">
                                        <input type="submit" class="btn btn-success col-md-6" value="Marcar leído">

                                    </form>
                                    <!-- Marcar como leído -->

                                    <a href="{{ url('articulo')}}/{{$comentario->articulo_id}}"
                                        class="btn btn-warning col-md-6">Ver artículo</a>

                                    <!-- Borrar comentario -->
                                    <form id="formLeido" action="{{ url('comentario')}}/{{$comentario->id}}"
                                        method="POST" class="col-md-12" accept-charset="UTF-8"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger col-md-6">Borrar</button>

                                    </form>
                                    <!-- Borrar comentario -->

                                </div>

                            </div>

                            @else

                            <div class="card-content p-5">

                                @php
                                $articulo = \App\Articulo::where('id', $comentario -> articulo_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Artículo:</h5>
                                    <p>{{$articulo[0]->titulo}}</p>

                                </div>


                                <div class="row col-12">
                                    <h5 class="col-12">Asunto:</h5>
                                    <p>{{$comentario->asunto}}</p>
                                    <h5 class="col-12">Comentario:</h5>
                                    <p>{{$comentario->texto}}</p><br />

                                </div>

                                @php
                                $nombreUsuario = \App\User::where('id', $comentario -> users_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Usuario: </h5>
                                    <p>{{$nombreUsuario[0]->name}}</p><br />
                                </div>


                                <div class="row col-12">
                                    <span class="col-12">{{$comentario->fecha_hora}}</span>
                                    <a href="" class="btn btn-info">Contestar</a>
                                </div>

                            </div>

                            @endif


                        </div>

                        @endforeach

                        @endisset

                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- Ver todos comentarios -->

    <!-- Ver comentarios SIN LEER -->
    <div class="row col-12" style="display: none" id="ensenarComentariosSinLeer">
        <div class="container-fluid">

            <section class="details-card">
                <div class="container">

                    <div class="row">

                        @isset($comentarios)

                        @foreach($comentarios as $comentario)

                        @php

                        $titulo = substr($comentario->titulo, 0, 60);

                        if (strlen($titulo) == 60){
                        $titulo = $titulo . "...";
                        };

                        $texto = substr($comentario->texto, 0, 180);

                        if (strlen($texto) == 180){
                        $texto = $texto . "...";
                        };
                        @endphp


                        <div class="col-lg-4 p-2">

                            @if($comentario->leido == 0)
                            <div class="card-content p-5" style="background-color: #D7D7D7">

                                @php
                                $articulo = \App\Articulo::where('id', $comentario -> articulo_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Artículo:</h5>
                                    <p>{{$articulo[0]->titulo}}</p>

                                </div>


                                <div class="row col-12">
                                    <h5 class="col-12">Asunto:</h5>
                                    <p>{{$comentario->asunto}}</p>
                                    <h5 class="col-12">Comentario:</h5>
                                    <p>{{$comentario->texto}}</p><br />

                                </div>

                                @php
                                $nombreUsuario = \App\User::where('id', $comentario -> users_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Usuario: </h5>
                                    <p>{{$nombreUsuario[0]->name}}</p><br />
                                </div>


                                <div class="row col-12">
                                    <span class="col-12">{{$comentario->fecha_hora}}</span>

                                    <!-- CONTESTAR comentario -->

                                    <button class="btn btn-info col-md-6" id="contestarComentario2">Contestar</button>
                                    <!-- CONTESTAR comentario -->

                                    <!-- Modal para CONTESTAR comentario -->
                                    <div class="modal fade" id="modalContestarComentario2" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Responder comentario
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="formMarcarYcontestar2" action="{{ url('respuesta') }}"
                                                        method="POST" class="col-md-12 was-validated"
                                                        accept-charset="UTF-8" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="uname" class="w-100">Comentario:
                                                                "<i>{{ $comentario->texto }}</i>"</label>
                                                            <label for="uname">Respuesta:</label>
                                                            <input type="text" class="form-control" id="tit"
                                                                value="{{ old('texto') }}"
                                                                placeholder="Escribe la respuesta al comentario"
                                                                name="texto" required>
                                                            <div class="valid-feedback">Válido.</div>
                                                            <div class="invalid-feedback">Por favor, escribe la
                                                                respuesta.</div>
                                                        </div>
                                                        <input type="hidden" name="leido" value="1">
                                                        <input type="hidden" name="users_id"
                                                            value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="comentario_id"
                                                            value="{{ $comentario->id }}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="button" id="marcarYResponder2"
                                                        class="btn btn-success">Responder</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal para CONTESTAR comentario -->



                                    <!-- Marcar como leído -->
                                    <form id="formuMmarcarYResponder2"
                                        action="{{ url('comentario')}}/{{$comentario->id}}" method="POST"
                                        class="col-md-12" accept-charset="UTF-8" enctype="multipart/form-data">

                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                        {{ method_field('PUT') }}

                                        <input type="hidden" value="1" name="leido">
                                        <input type="submit" class="btn btn-success col-md-6" value="Marcar leído">

                                    </form>
                                    <!-- Marcar como leído -->

                                    <a href="{{ url('articulo')}}/{{$comentario->articulo_id}}"
                                        class="btn btn-warning col-md-6">Ver artículo</a>

                                    <!-- Borrar comentario -->
                                    <form id="formLeido" action="{{ url('comentario')}}/{{$comentario->id}}"
                                        method="POST" class="col-md-12" accept-charset="UTF-8"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger col-md-6">Borrar</button>

                                    </form>
                                    <!-- Borrar comentario -->


                                </div>

                            </div>

                            @endif
                        </div>


                        @endforeach

                        @endisset

                        @php
                        $totalSinLeer = DB::table('comentario')->where('leido', 0)->count();
                        @endphp

                        @if($totalSinLeer == 0)

                        <div class="container-fluid bg-light">
                            <div class="row h1 p-5 justify-content-center">
                                <p class="text-center">No hay comentarios sin leer</p>
                                <br /><br /><br /><br />
                            </div>


                        </div>
                        @endif




                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- Ver comentarios SIN LEER-->



    <!-- CHAT -->

    <div class="row col-12" id="chat">

        <div class="row container-fluid px-4">

            <div class="row rounded-lg overflow-hidden shadow col-md-4">
                contactos
            </div>
            
            <div class="row rounded-lg overflow-hidden shadow col-md-8" id="cajaMensajes">

<h2>Cristina Alcaide</h2>
                <div class="col-12 px-0">
                    <div class="px-4 py-5 chat-box bg-white" id="zonaChat">





                    </div>

                    <!-- Typing area -->
                    <form id="formMensaje" action="#">

                        <input type="hidden" name="para" value="2">
                        <input type="hidden" name="de" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="leido" value="0">

                        <div class="input-group">

                            <input type="text" id="textoEnviar" placeholder="Escribe un mensaje"
                                aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light"
                                name="texto">
                            <div class="input-group-append">
                                <button id="button-addon2" type="button" class="btn btn-link botonEnviarMensaje"> <i
                                        class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>




                    </form>

                </div>
            </div>

        </div>

    </div>
    <!-- CHAT -->










</div>

@stop