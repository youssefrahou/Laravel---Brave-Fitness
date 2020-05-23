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



@stop

@section('lateral')

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


    <li class="nav-item has-treeview" id="lateralMiProgreso">
        <span href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Mi progreso
            </p>
        </span>
    </li>

    <li class="nav-item has-treeview">
        <span href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Videos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
            </p>
        </span>
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
        <span href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Chat
            </p>
        </span>
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