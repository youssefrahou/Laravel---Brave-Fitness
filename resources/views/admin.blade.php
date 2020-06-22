@extends('plantillas.admin')

@section('head')
<!-- JS -->
<script src="{{ asset('js/areapersonal.js') }}"></script>

<script>
    $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});
});
</script>
<style>
    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload .custom-file-upload1 {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
</style>

<style>
    #tablaUsuarios {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #tablaUsuarios td,
    #tablaUsuarios th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #tablaUsuarios tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #tablaUsuarios tr:hover {
        background-color: #ddd;
    }

    #tablaUsuarios th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: rgb(23, 162, 184);
        color: white;
    }
</style>

<script>
    function mostrarUsuario(usuario) {

//alert("pulsado " + usuario.id)
    
$.ajax({
        url: 'usuario' + "/" + usuario.id,
        type: 'get',
        success: function(response) {

            let usuario = JSON.parse(response);

$("#tituloModal").html(usuario.name);
            
            //alert(usuario.name);


$("#modalUsuarioInfo").modal('show');
        },
        statusCode: {
            404: function() {
                alert('web not found');
            }
        },
        error: function(x, xs, xt) {
            alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
        }
    
});




}

</script>

@stop

@section('lateral')

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

    <li class="nav-item has-treeview">
        <span href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $totalUsuarios }}</span>
            </p>
        </span>
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
        <span href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Articulos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $totalArticulos }}</span>
            </p>
        </span>
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
        <span href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
                Consejos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $totalConsejos }}</span>
            </p>
        </span>
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
        <span href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                Comentarios
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $totalComentarios }}</span>
            </p>
        </span>
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
    <li class="nav-item has-treeview" id="lateralChat">
        <span href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Chat
                <span class="badge badge-info right">12</span>
            </p>
        </span>
    </li>



</ul>

@stop


@section('contenido')

<div class="row">

    <!-- Mensaje de bienvenida -->
    <div class="table-responsive justify-content-center" id="bienvenida">
        <p class="h3 text-center">Bienvenido a Brave Fitness. Elige una opción en el menú lateral. </p>
    </div>
    <!--Mensaje de bienvenida -->

    <!-- Ajustes de perfil -->
    <div class="row col-12 p-2" id="editarPerfil" style="display: none">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>{{ auth()->user()->name }} {{ auth()->user()->apellido1 }} {{ auth()->user()->apellido2 }} </h1>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-5">
                    <!--left col-->


                    <div class="text-center">
                        @if (auth()->user()->fotoPerfil == null)

                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                            class="avatar img-circle elevation-2" alt="avatar" style="width: 300px; height: 300px">

                        @else

                        <img src="images/users/{{ auth()->user()->fotoPerfil }}" class="avatar img-circle elevation-2"
                            alt="avatar" style="width: 300px; height: 300px">

                        @endif

                        <!-- FORMULARIO -->
                        <form class="form" action="{{ url('user') }}/{{ auth()->user()->id }}"
                            enctype="multipart/form-data" method="post" id="registrationForm">

                            <div class="custom-file-upload mt-2">

                                <label for="file-upload" class="custom-file-upload1">
                                    <i class="fas fa-camera"></i> Subir imagen
                                </label>
                                <input type="file" id="file-upload" name="fotoPerfil"
                                    class="text-center center-block file-upload" />

                            </div>



                    </div><br>

                </div>
                <!--/col-3-->
                <div class="col-lg-7">


                    <div class="tab-content">
                        <div class="tab-pane active" id="home">



                            <div class="row col-12">

                                @csrf
                                {{ method_field('PUT') }}

                                <div class="form-group col-md-4">
                                    <label for="first_name">
                                        <h4>Nombre</h4>
                                    </label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                        name="name" placeholder="Nombre">

                                </div>


                                <div class="form-group col-md-4">

                                    <label for="last_name">
                                        <h4>Primer apellido</h4>
                                    </label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->apellido1 }}"
                                        name="apellido1" placeholder="Primer apellido">

                                </div>

                                <div class="form-group col-md-4">

                                    <label for="last_name">
                                        <h4>Segundo apellido</h4>
                                    </label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->apellido2 }}"
                                        name="apellido2" placeholder="Segundo apellido">

                                </div>


                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">
                                            <h4>Objetivo</h4>
                                        </label>
                                        <input type="text" class="form-control" name="objetivo" id="password"
                                            value="adelgazar" placeholder="Edad" min="7" max="110">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">
                                            <h4>Sexo</h4>
                                        </label>
                                        <br />
                                        <select class="form-control  @error('sexo') is-invalid @enderror" name="sexo">

                                            <option value="hombre" @if (auth()->user()->sexo =="hombre" )
                                                {{ 'selected' }} @endif>Hombre</option>
                                            <option value="mujer" @if (auth()->user()->sexo =="mujer" )
                                                {{ 'selected' }} @endif>Mujer</option>
                                            <option value="otro" @if (auth()->user()->sexo =="otro" )
                                                {{ 'selected' }} @endif>Otro</option>

                                        </select>

                                        @error('sexo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">
                                            <h4>Peso inicial</h4>
                                        </label>
                                        <input type="number" class="form-control  @error('peso') is-invalid @enderror"
                                            name="peso" id="password" placeholder="Peso"
                                            value="{{ auth()->user()->peso }}" disabled>
                                        @error('peso')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">
                                            <h4>Altura inicial</h4>

                                        </label>
                                        <input type="number" class="form-control  @error('altura') is-invalid @enderror"
                                            name="altura" id="password" placeholder="Altura (en cm)"
                                            value="{{ auth()->user()->peso }}" disabled>
                                        @error('altura')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row col-12">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password">Fecha de nacimiento:</label>
                                            <input type="date"
                                                class="form-control  @error('fechaNacimiento') is-invalid @enderror"
                                                name="fechaNacimiento" value="{{ auth()->user()->fechaNacimiento }}">

                                            @error('fechaNacimiento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="first_name">Correo electrónico:</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ auth()->user()->email }}" autocomplete="email"
                                            placeholder="Correo electrónico" disabled>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>


                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-primary" type="submit">Guardar</button>
                                    <button class="btn btn-lg" type="reset" id="cancelarAct">Cancelar</button>
                                </div>
                            </div>

                            </form>


                        </div>

                    </div>
                    <!--/tab-content-->

                </div>
                <!--/col-9-->
            </div>
            <!--/row-->
        </div>
    </div>
    <!-- fin AJUSTES DE PERFIL -->



    <!-- Tabla usuarios -->
    <div class="col-12" style="display: none" id="ensenarUsuarios">
        <div class="table-responsive">
            <h3 class="text-center display-4">Usuarios</h3>
            <table class="table" id="tablaUsuarios">
                <tr>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Opciones</th>
                </tr>

                @isset ( $usuarios )
                @foreach ($usuarios as $usuario)

                <tr>
                    <td>{{ $usuario->name }}</td>

                    @if($usuario->fotoPerfil)

                    <td><img src="images/users/{{ $usuario->fotoPerfil }}" width="100px" height="100px"></td>
                    @else

                    <td><img src="images/users/noimg.gif" width="100px" height="100px"></td>

                    @endif
                    <td><button class="btn btn-primary" id="{{ $usuario->id}}" onclick="mostrarUsuario(this)"><i
                                class="fas fa-plus-square"></i></button></td>
                </tr>

                @endforeach
                @endisset

            </table>
        </div>
    </div>

    <!-- MODAL USUARIO -->
    <div class="modal fade" id="modalUsuarioInfo">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="tituloModal"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- MODAL USUARIO -->


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

    <!-- CHAT -->

    <div class="row col-12" id="chat" style="display: none">

        <div id="frame">
            <div id="sidepanel">
                <div id="profile">
                    <div class="wrap">

                        @if(!auth()->user()->fotoPerfil)

                        <img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" />

                        @else

                        <img id="profile-img" src="images/users/{{ auth()->user()->fotoPerfil }}" class="online"
                            alt="" />

                        @endif

                        <p>{{ auth()->user()->name }}</p>

                    </div>
                </div>
                <div id="search">
                    <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                    <input type="text" placeholder="Buscar..." />
                </div>
                <div id="contacts">
                    <ul>

                        @if(!Auth::guest() && Auth::user()->hasRole('admin'))

                        @foreach($usuarios as $usuario)

                        @if ( $usuario->id == auth()->user()->id)
                        @continue
                        @endif

                        @php
                        $ultimoMensaje = DB::select("select * from users, mensaje where mensaje.de = ? and mensaje.para
                        = ? or mensaje.de = ? and mensaje.para = ? order by mensaje.fecha desc limit 1", [$usuario->id,
                        auth()->user()->id, auth()->user()->id, $usuario->id])
                        @endphp

                        <li class="contact" id="{{ $usuario->id }}" onclick="cargarMensajes(this)">
                            <div class="wrap">
                                <span class="contact-status online"></span>

                                @if($usuarios[0]->id == auth()->user()->id)
                                <input id="idPrimerUsuario" type="hidden" value="{{ $usuarios[1]->id }}">

                                @else
                                <input id="idPrimerUsuario" type="hidden" value="{{ $usuarios[0]->id }}">

                                @endif

                                @if(!$usuario->fotoPerfil)
                                <img src="https://cdn.pixabay.com/photo/2012/04/26/19/43/profile-42914_1280.png"
                                    alt="" />
                                @else
                                <img src="images/users/{{ $usuario->fotoPerfil }}" alt="" />
                                @endif

                                <div class="meta">
                                    <p class="name">{{ $usuario->name }}</p>

                                    @if($ultimoMensaje)

                                    @if($usuario->id == $ultimoMensaje[0]->de)
                                    <p class="preview">{{ $ultimoMensaje[0]->texto }}</p>
                                    @else
                                    <p class="preview"><span>Tú:</span> {{ $ultimoMensaje[0]->texto }}</p>
                                    @endif

                                    @else
                                    <p class="preview"></p>

                                    @endif


                                </div>
                            </div>
                        </li>

                        @endforeach

                        @endif


                        @if(!Auth::guest() && Auth::user()->hasRole('user'))

                        @foreach($usuarios as $usuario)

                        @if ($usuario->id == auth()->user()->id || $usuario->hasRole('user'))
                        @continue
                        @endif

                        @php
                        $ultimoMensaje = DB::select("select * from users, mensaje where mensaje.de = ? and mensaje.para
                        = ? or mensaje.de = ? and mensaje.para = ? order by mensaje.fecha desc limit 1", [$usuario->id,
                        auth()->user()->id, auth()->user()->id, $usuario->id])
                        @endphp

                        <li class="contact" id="{{ $usuario->id }}" onclick="cargarMensajes(this)">
                            <div class="wrap">
                                <span class="contact-status online"></span>

                                @if($usuarios[0]->id == auth()->user()->id)
                                <input id="idPrimerUsuario" type="hidden" value="{{ $usuarios[1]->id }}">

                                @else
                                <input id="idPrimerUsuario" type="hidden" value="{{ $usuarios[0]->id }}">

                                @endif

                                @if(!$usuario->fotoPerfil)
                                <img src="https://cdn.pixabay.com/photo/2012/04/26/19/43/profile-42914_1280.png"
                                    alt="" />
                                @else
                                <img src="images/users/{{ $usuario->fotoPerfil }}" alt="" />
                                @endif

                                <div class="meta">
                                    <p class="name">{{ $usuario->name }}</p>

                                    @if($ultimoMensaje)

                                    @if($usuario->id == $ultimoMensaje[0]->de)
                                    <p class="preview">{{ $ultimoMensaje[0]->texto }}</p>
                                    @else
                                    <p class="preview"><span>Tú:</span> {{ $ultimoMensaje[0]->texto }}</p>
                                    @endif

                                    @else
                                    <p class="preview"></p>

                                    @endif


                                </div>
                            </div>
                        </li>

                        @endforeach

                        @endif






                        <!--
                        <li class="contact">
                            <div class="wrap">
                                <span class="contact-status online"></span>
                                <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
                                <div class="meta">
                                    <p class="name">Louis Litt</p>
                                    <p class="preview">You just got LITT up, Mike.</p>
                                </div>
                            </div>
                        </li>

                        <li class="contact active">
                            <div class="wrap">
                                <span class="contact-status busy"></span>
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <div class="meta">
                                    <p class="name">Harvey Specter</p>
                                    <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you
                                        call their bluff. Or, you do any one of a hundred and forty six other things.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">
                                <span class="contact-status"></span>
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>
                                    <p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
                                </div>
                            </div>
                        </li>
                    -->


                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="contact-profile">
                    <img src="" id="imagenUsuarioArriba" alt="" />
                    <p id="nombreUsuarioArriba"></p>
                    <div class="social-media">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="messages">
                    <ul id="listaMensajes">
                        <!--
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>What are you talking about? You do what they say or they shoot you.</p>
                        </li>


                        <li class="replies">
                            @if(!auth()->user()->fotoPerfil)

                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />


                            @else

                            <img src="images/users/{{ auth()->user()->fotoPerfil }}" alt="" />

                            @endif

                            <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you
                                do any one of a hundred and forty six other things.</p>
                        </li>
                    -->

                    </ul>
                </div>
                <div class="message-input">
                    <div class="wrap">

                        <input type="text" id="textoMensaje" placeholder="Escribe tu mensaje..." />
                        <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>


                    </div>
                </div>
            </div>
        </div>
        <script
            src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'>
        </script>
        <script>
            /**
 * 
 * CHAT
 */

 $( document ).ready(function() {

    let idUsuario = $("#idPrimerUsuario").val();
    usuarioPorId(idUsuario);
    cargarMensajes(idUsuario);
   // window.setInterval('actualizarListaContactos()', 3000); 

});

/*function actualizarListaContactos(){

    $.ajax({
        url: 'usuarios',
        type: 'get',
        success: function(response) {

            let usuarios = JSON.parse(response);

            for (var usuario in usuarios) {
                alert(usuarios[usuario].name);

                // (mensajes[mensaje].para == {{ auth()->user()->id}}){
                    $("#listaMensajes").append('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + mensajes[mensaje].texto + '</p></li >');
                }

                if (mensajes[mensaje].de == {{ auth()->user()->id}}){
                    $("#listaMensajes").append('<li class="replies"><img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" /><p>' + mensajes[mensaje].texto + '</p></li>');
                }

            }

        },
        statusCode: {
            404: function() {
                alert('web not found');
            }
        },
        error: function(x, xs, xt) {

            //window.open(JSON.stringify(x));
            alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
        }
    });
}
*/


 var idUsuarioPulsado;
function cargarMensajes(usuario) {
    $('#textoMensaje').focus();

if (isNaN(usuario)){
    idUsuarioPulsado = usuario.id;
    $("#idPrimerUsuario").val(usuario.id); //para saber en q chat estoy para el pusher
}else{
    idUsuarioPulsado = usuario;
    $("#idPrimerUsuario").val(usuario);

}
    usuarioPorId(idUsuarioPulsado);

    $("#listaMensajes").html(""); //borro todos los anteriores mensajes
    $.ajax({
        url: 'mensajes' + "/" + idUsuarioPulsado,
        type: 'get',
        success: function(response) {

            let mensajes = JSON.parse(response);

            for (var mensaje in mensajes) {

                if (mensajes[mensaje].para == {{ auth()->user()->id}}){
                    $("#listaMensajes").append('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + mensajes[mensaje].texto + '</p></li >');
                }

                if (mensajes[mensaje].de == {{ auth()->user()->id}}){
                    $("#listaMensajes").append('<li class="replies"><img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" /><p>' + mensajes[mensaje].texto + '</p></li>');
                }

                   
                //alert(mensajes[mensaje].texto);


            }
            $(".messages").animate({ scrollTop: $(document).height() }, "fast");

        },
        statusCode: {
            404: function() {
                alert('web not found');
            }
        },
        error: function(x, xs, xt) {

            //window.open(JSON.stringify(x));
            alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
        }
    });
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");


}

function usuarioPorId(id) {

    if (isNaN(id)){
    idUsuario = id.id;
}else{
    idUsuario = id;
}

    $.ajax({
        url: 'usuarios' + "/" + idUsuario,
        type: 'get',
        success: function(response) {

            let usuario = JSON.parse(response);
            $("#nombreUsuarioArriba").text(usuario[0].name);
           
 
            if (usuario[0].fotoPerfil == null){
    $("#imagenUsuarioArriba").attr("src", "https://cdn.pixabay.com/photo/2012/04/26/19/43/profile-42914_1280.png");

}else{
    $("#imagenUsuarioArriba").attr("src", "images/users/" + usuario[0].fotoPerfil);

}
            //alert(usuario);

        },
        statusCode: {
            404: function() {
                alert('web not found');
            }
        },
        error: function(x, xs, xt) {
            alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
        }
    
});
}


/**
 * 
 * fin CHAT
 */


 
            $(".messages").animate({ scrollTop: $(document).height() }, "fast");
        
        $("#profile-img").click(function() {
            $("#status-options").toggleClass("active");
        });
        
        $(".expand-button").click(function() {
          $("#profile").toggleClass("expanded");
            $("#contacts").toggleClass("expanded");
        });
        
        $("#status-options ul li").click(function() {
            $("#profile-img").removeClass();
            $("#status-online").removeClass("active");
            $("#status-away").removeClass("active");
            $("#status-busy").removeClass("active");
            $("#status-offline").removeClass("active");
            $(this).addClass("active");
            
            if($("#status-online").hasClass("active")) {
                $("#profile-img").addClass("online");
            } else if ($("#status-away").hasClass("active")) {
                $("#profile-img").addClass("away");
            } else if ($("#status-busy").hasClass("active")) {
                $("#profile-img").addClass("busy");
            } else if ($("#status-offline").hasClass("active")) {
                $("#profile-img").addClass("offline");
            } else {
                $("#profile-img").removeClass();
            };
            
            $("#status-options").removeClass("active");
        });
        
        function newMessage() {
            message = $(".message-input input").val();

            if($.trim(message) == '') {
                return false;
            }
            $.ajax({
            url: 'mensaje',
            method: 'post',
            data: { de: {{ auth()->user()->id }}, para: idUsuarioPulsado, leido: 0, texto: $("#textoMensaje").val()},
            type: 'post',
            success: function(response) {

            },
            statusCode: {
                404: function() {
                    alert('web not found');
                }
            },
            error: function(x, xs, xt) {

                //window.open(JSON.stringify(x));
                alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
            }
        });
        
            $('.contact.active .preview').html('<span>You: </span>' + message);
        };
        
        $('.submit').click(function() {
          newMessage();
        });
        
        $(window).on('keydown', function(e) {
          if (e.which == 13) {
            newMessage();
            return false;
          }
        });
        //# sourceURL=pen.js
        </script>

    </div>
    <!-- CHAT -->


    <!-- CHAT -->










</div>

@stop