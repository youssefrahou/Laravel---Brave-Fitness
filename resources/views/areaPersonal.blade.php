@extends('plantillas.admin')

@section('head')
<!-- GRÁFICOS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

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
<!-- CHAT AQUI ABAJO -->
<style>
    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        width: 5px;
        background: #f5f5f5;
    }

    ::-webkit-scrollbar-thumb {
        width: 1em;
        background-color: #ddd;
        outline: 1px solid slategrey;
        border-radius: 1rem;
    }

    .text-small {
        font-size: 0.9rem;
    }

    .messages-box,
    .chat-box {
        height: 510px;
        overflow-y: scroll;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    input::placeholder {
        font-size: 0.9rem;
        color: #999;
    }
</style>
@stop

@section('lateral')

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


    <li class="nav-item has-treeview" id="lateralMiProgreso">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Mi progreso
            </p>
        </a>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Videos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item" id="verArticulos">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Entrenamiento</p>
                </span>
            </li>
            <li class="nav-item" id="escribirArticulo">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nutrición</p>
                </span>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview" id="lateralChat">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Chat
            </p>
        </a>
    </li>



    <!--
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
                Consejos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
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
                <span class="badge badge-info right"></span>
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
                <span class="badge badge-info right"></span>
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
-->

</ul>

@stop


@section('contenido')

<div class="row">

    <!-- Mensaje de bienvenida 
    <div class="table-responsive justify-content-center" id="bienvenida">
        <p class="h5 text-center">Bienvenido a Brave Fitness. Elige una opción en el menú lateral. </p>
    </div>
    Mensaje de bienvenida -->

    <!-- Pantalla principal -->
    <div class="row col-12" id="progreso">

        <div class="row col-md-8 m-1 p-3">
            {{ $chart->container() }}

            {{ $chart->script() }}
        </div>

        <div>

            <button type="button" class="btn btn-primary col-12 mt-5" id="anadirMedicion" style="height: 50px">Añadir
                medición</button>

            <button type="button" class="btn btn-primary col-12 mt-3" id="compararMedicion"
                style="height: 50px">Comparar</button>
        </div>



        <!-- Modal para AÑADIR MEDICION -->
        <div class="modal fade" id="modalAnadirMedicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir medición
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formAnadirMedicion" action="{{ url('medicion') }}" method="POST"
                            accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Peso:</label>
                                <small id="emailHelp" class="form-text text-muted">El peso en kilógramos, por
                                    favor</small>
                                <input type="text" class="form-control" id="tit" value="{{ old('peso') }}"
                                    placeholder="Peso" name="peso">
                            </div>

                            <div class="form-group">
                                <label for="">Altura:</label>
                                <small id="emailHelp" class="form-text text-muted">La altura en cms, por favor. Si
                                    no ha variado, no toques nada.</small>
                                <input type="text" class="form-control" id="tit" value="{{ Auth::user()->altura }}"
                                    placeholder="Altura" name="altura">
                            </div>

                            <div class="form-group">


                                <div id="previewDelante"></div>

                                <small id="emailHelp" class="form-text text-muted">Añade una foto por delante,
                                    por favor</small>
                                <label for="file-upload" class="custom-file-upload1">
                                    <i class="fas fa-camera"></i> Foto por delante
                                </label>
                                <input type="file" id="delante" accept="image/*" name="foto_delante" />


                            </div>


                            <div class="form-group">


                                <div id="previewLado"></div>

                                <small id="emailHelp" class="form-text text-muted">Añade una foto de lado, por
                                    favor</small>
                                <label for="file-upload" class="custom-file-upload1">
                                    <i class="fas fa-camera"></i> Foto de lado
                                </label><br />
                                <input type="file" id="lado" name="foto_lado" />


                            </div>

                            <div class="form-group">

                                <div id="previewAtras"></div>

                                <small id="emailHelp" class="form-text text-muted">Añade una foto por detrás,
                                    por favor</small>
                                <label for="file-upload" class="custom-file-upload1">
                                    <i class="fas fa-camera"></i> Foto por detrás
                                </label>
                                <input type="file" id="atras" name="foto_atras" />


                            </div>




                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Añadir</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal para AÑADIR MEDICION -->



    </div>
    <!-- Pantalla principal -->

    <!-- COMPARAR PESOS por fecha -->

    <div class="row col-12" id="compararFecha" style="display: none">

        <div class="row col-12 justify-content-center">
            <h4 class="text-center col-12">Comparación progreso por fechas</h4>

            <div class="row col-12">
                <label>Día: </label>
                <select>
                    @php
                    foreach ($mediciones as $medicion) {
                    echo "<option>" . $medicion['fecha'] . " " . $medicion['peso'] . "kg</option>";
                    }
                    @endphp

                </select>
            </div>


            <div class="row col-12 mt-3">
                <label>Día: </label>
                <select>
                    @php
                    foreach ($mediciones as $medicion) {
                    echo "<option>" . $medicion['fecha'] . " " . $medicion['peso'] . "kg</option>";
                    }
                    @endphp

                </select>
            </div>





        </div>


    </div>
    <!-- COMPARAR PESOS por fecha -->

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


    <!-- CHAT -->

    <div class="row col-12" id="chat" style="display: none">

        <div class="container-fluid px-4">
            <!-- For demo purpose-->

            <div class="row rounded-lg overflow-hidden shadow">


                <div class="col-12 px-0">
                    <div class="px-4 py-5 chat-box bg-white">
                        <!-- Sender Message-->
                        <div class="media w-100 mb-3"><img
                                src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg"
                                alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <!-- Reciever Message-->
                        <div class="media w-100 ml-auto mb-3">
                            <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">Test which is a new approach to have all
                                        solutions</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <!-- Sender Message-->
                        <div class="media w-100 mb-3"><img
                                src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg"
                                alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">Test, which is a new approach to have</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <!-- Reciever Message-->
                        <div class="media w-100 ml-auto mb-3">
                            <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <!-- Sender Message-->
                        <div class="media w-100 mb-3"><img
                                src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg"
                                alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <!-- Reciever Message-->
                        <div class="media w-100 ml-auto mb-3">
                            <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>
                        <!-- Sender Message-->
                        <div class="media w-100 mb-3"><img
                                src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg"
                                alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <!-- Reciever Message-->
                        <div class="media w-100 ml-auto mb-3">
                            <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div><!-- Sender Message-->
                        <div class="media w-100 mb-3"><img
                                src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg"
                                alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <!-- Reciever Message-->
                        <div class="media w-100 ml-auto mb-3">
                            <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div><!-- Sender Message-->
                        <div class="media w-100 mb-3"><img
                                src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg"
                                alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <!-- Reciever Message-->
                        <div class="media w-100 ml-auto mb-3">
                            <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div><!-- Sender Message-->
                        <div class="media w-100 mb-3"><img
                                src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg"
                                alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <!-- Reciever Message-->
                        <div class="media w-100 ml-auto mb-3">
                            <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                            </div>
                        </div>




                    </div>

                    <!-- Typing area -->
                    <form action="#" class="bg-light">
                        <div class="input-group">
                            <input type="text" placeholder="Escribe un mensaje" aria-describedby="button-addon2"
                                class="form-control rounded-0 border-0 py-4 bg-light">
                            <div class="input-group-append">
                                <button id="button-addon2" type="submit" class="btn btn-link"> <i
                                        class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>






    </div>
    <!-- CHAT -->

















    <!-- Tabla usuarios -->

    <!-- Tabla usuarios -->


    <!-- Escribir articulo -->

    <!-- Escribir articulo -->


    <!-- Modal para añadir categoria -->

    <!-- Modal para añadir categoria -->

    <!-- Escribir articulo -->



    <!-- Ver articulos -->

    <!-- Ver articulos -->

    <!-- Ver consejos -->

    <!-- Ver consejos -->

    <!-- Modal para añadir CONSEJO -->

    <!-- Modal para añadir CONSEJO -->

    <!-- Ver todos comentarios -->

    <!-- Ver todos comentarios -->

    <!-- Ver comentarios SIN LEER -->

    <!-- Ver comentarios SIN LEER-->



</div>
@stop