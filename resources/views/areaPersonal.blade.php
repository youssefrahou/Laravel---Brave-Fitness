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

                        <img src="images/{{ auth()->user()->fotoPerfil }}" class="avatar img-circle elevation-2"
                            alt="avatar" style="width: 300px; height: 300px">

                        @endif


                        <div class="custom-file-upload mt-2">

                            <label for="file-upload" class="custom-file-upload1">
                                <i class="fas fa-camera"></i> Subir imagen
                            </label>
                            <input type="file" id="file-upload" class="text-center center-block file-upload" />

                        </div>



                    </div><br>


                    <div class="panel panel-default">
                        <div class="panel-heading">Email <i class="fa fa-envelope fa-1x"></i></div>

                        <div class="panel-body"><a href="mailto:{{auth()->user()->email}}">{{auth()->user()->email}}</a>
                        </div>
                    </div>


                    <ul class="list-group">
                        <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span>
                            125</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13
                        </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37
                        </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span>
                            78</li>
                    </ul>

                    <div class="panel panel-default">
                        <div class="panel-heading">Social Media</div>
                        <div class="panel-body">
                            <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i
                                class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                                class="fa fa-google-plus fa-2x"></i>
                        </div>
                    </div>

                </div>
                <!--/col-3-->
                <div class="col-lg-7">


                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <form class="form" action="##" method="post" id="registrationForm">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>First name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="first name" title="enter your first name if any.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="last_name">
                                            <h4>Last name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="last name" title="enter your last name if any.">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone">
                                            <h4>Phone</h4>
                                        </label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="enter phone" title="enter your phone number if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile">
                                            <h4>Mobile</h4>
                                        </label>
                                        <input type="text" class="form-control" name="mobile" id="mobile"
                                            placeholder="enter mobile number" title="enter your mobile number if any.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="you@email.com" title="enter your email.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Location</h4>
                                        </label>
                                        <input type="email" class="form-control" id="location" placeholder="somewhere"
                                            title="enter a location">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">
                                            <h4>Password</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="password" title="enter your password.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password2">
                                            <h4>Verify</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password2" id="password2"
                                            placeholder="password2" title="enter your password2.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i
                                                class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i
                                                class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </div>
                            </form>

                            <hr>

                        </div>
                        <!--/tab-pane-->
                        <div class="tab-pane" id="messages">

                            <h2></h2>

                            <hr>
                            <form class="form" action="##" method="post" id="registrationForm">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>First name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="first name" title="enter your first name if any.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="last_name">
                                            <h4>Last name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="last name" title="enter your last name if any.">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone">
                                            <h4>Phone</h4>
                                        </label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="enter phone" title="enter your phone number if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile">
                                            <h4>Mobile</h4>
                                        </label>
                                        <input type="text" class="form-control" name="mobile" id="mobile"
                                            placeholder="enter mobile number" title="enter your mobile number if any.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="you@email.com" title="enter your email.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Location</h4>
                                        </label>
                                        <input type="email" class="form-control" id="location" placeholder="somewhere"
                                            title="enter a location">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">
                                            <h4>Password</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="password" title="enter your password.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password2">
                                            <h4>Verify</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password2" id="password2"
                                            placeholder="password2" title="enter your password2.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i
                                                class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i
                                                class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!--/tab-pane-->
                        <div class="tab-pane" id="settings">


                            <hr>
                            <form class="form" action="##" method="post" id="registrationForm">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>First name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="first name" title="enter your first name if any.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="last_name">
                                            <h4>Last name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="last name" title="enter your last name if any.">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone">
                                            <h4>Phone</h4>
                                        </label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="enter phone" title="enter your phone number if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile">
                                            <h4>Mobile</h4>
                                        </label>
                                        <input type="text" class="form-control" name="mobile" id="mobile"
                                            placeholder="enter mobile number" title="enter your mobile number if any.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="you@email.com" title="enter your email.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Location</h4>
                                        </label>
                                        <input type="email" class="form-control" id="location" placeholder="somewhere"
                                            title="enter a location">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">
                                            <h4>Password</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="password" title="enter your password.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password2">
                                            <h4>Verify</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password2" id="password2"
                                            placeholder="password2" title="enter your password2.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success pull-right" type="submit"><i
                                                class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!--/tab-pane-->
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