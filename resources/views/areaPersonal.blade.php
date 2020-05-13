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
@stop

@section('lateral')

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Inicio
            </p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Progreso
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item" id="verArticulos">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mi progreso</p>
                </span>
            </li>
            <li class="nav-item" id="escribirArticulo">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comparación</p>
                </span>
            </li>
            <li class="nav-item" id="escribirArticulo">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Añadir medición</p>
                </span>
            </li>
        </ul>
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



    <!-- Mensaje de bienvenida -->
    <div class="table-responsive justify-content-center" id="bienvenida">
        <p class="h5 text-center">Bienvenido a Brave Fitness. Elige una opción en el menú lateral. </p>
    </div>
    <!-- Mensaje de bienvenida -->
    <!-- Pantalla principal -->

    <div class="row col-12">

        <div class="row col-md-8 m-1 p-3" style="background-color: red">
            grafiko
        </div>

        <div class="row col-md-3 m-1 p-3" style="background-color: gray">
            botones<br/>
            <button class="btn btn-primary col-12" id="anadirMedicion">Añadir medición</button>

            <!-- Modal para AÑADIR MEDICION -->
            <div class="modal fade" id="modalAnadirMedicion" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                            <form id="formAnadirMedicion" action="{{ url('medicion') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="">Peso:</label>
                                    <small id="emailHelp" class="form-text text-muted">El peso en kilógramos, por favor</small>
                                    <input type="text" class="form-control" id="tit" value="{{ old('peso') }}"
                                        placeholder="Peso" name="peso">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Altura:</label>
                                    <small id="emailHelp" class="form-text text-muted">La altura en cms, por favor. Si no ha variado, no toques nada.</small>
                                    <input type="text" class="form-control" id="tit" value="{{ Auth::user()->altura }}"
                                        placeholder="Altura" name="altura">
                                </div>

                                <div class="form-group">

                                    <label for="foto_delante">Foto por delante:</label>
                                    <input type="file" class="form-control-file" id="foto_delante" name="foto_delante">
                                    
                                </div>

                                <div class="form-group">

                                    <label for="foto_lado">Foto de lado:</label>
                                    <input type="file" class="form-control-file" id="foto_lado" name="foto_lado">
                                    
                                </div>

                                <div class="form-group">

                                    <label for="foto_atras">Foto por detrás:</label>
                                    <input type="file" class="form-control-file" id="foto_atras" name="foto_atras">
                                    
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

    </div>







    <!-- Pantalla principal -->

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
                                            <h4>Peso</h4>
                                        </label>
                                        <input type="number" class="form-control  @error('peso') is-invalid @enderror"
                                            name="peso" id="password" placeholder="Peso"
                                            value="{{ auth()->user()->peso }}">
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
                                            <h4>Altura (en cm)</h4>

                                        </label>
                                        <input type="number" class="form-control  @error('altura') is-invalid @enderror"
                                            name="altura" id="password" placeholder="Altura (en cm)"
                                            value="{{ auth()->user()->peso }}">
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
                                            name="email" value="{{ auth()->user()->email }}" required
                                            autocomplete="email" placeholder="Correo electrónico">

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
        <!-- Ajustes de perfil -->























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