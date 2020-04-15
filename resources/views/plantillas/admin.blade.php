<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Brave Fitness | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <!-- JQuery para botones -->
    <script src="{{ asset('js/admin.js') }}"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.html" class="nav-link">Inicio</a>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/logo.png" alt="Logo Brave Fitness" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">BRAVE FITNESS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
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
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Editar usuario</p>
                                    </a>
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
                                <li class="nav-item">
                                    <a href="pages/charts/chartjs.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ver artículos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/flot.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Escribir artículo</p>
                                    </a>
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
                                <li class="nav-item">
                                    <a href="pages/UI/general.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ver consejos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/UI/icons.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Escribir consejo</p>
                                    </a>
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
                                <li class="nav-item">
                                    <a href="pages/forms/general.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ver todos los comentarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/forms/advanced.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ver comentarios sin leer</p>
                                    </a>
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
                                    <a href="pages/tables/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ver todos los mensajes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ver mensajes sin leer</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Zona administrador</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!--<div class="row">
                        <div class="table-responsive justify-content-center" id="bienvenida">
                            <p class="display-3">Bienvenido a Brave Fitness</p>
                        </div>-->

                    <div class="table-responsive cosa" id="ensenarUsuarios">
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

                    <div class="row col-12" id="crearticulo">
                        <h3>Escribir artículo</h3>
                        <div class="row col-12">

                            <form action="/articulo" method="POST" class="col-md-12 was-validated">
                                @csrf
                                <div class="form-group">
                                    <label for="uname">Título:</label>
                                    <input type="text" class="form-control" id="tit" placeholder="Escribe el título" name="titulo" required>
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Por favor, escribe el título.</div>
                                </div>

                                <div class="form-group">
                                    <label for="uname">Subtítulo:</label>
                                    <input type="text" class="form-control" id="subti" placeholder="Escribe el subtítulo" name="subtitulo" required>
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Por favor, escribe el subtítulo.</div>
                                </div>

                                <div class="form-group">
                                    <label for="uname">Introducción:</label>
                                    <textarea class="form-control" id="intro" rows="4" name="introduccion" required></textarea>
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
                                    <input type="text" class="form-control" id="subti" placeholder="Escribe el pie de la primera imagen" name="pie_imagen1" required>
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Por favor, escribe el pie de la primera imagen.</div>
                                </div>







                                <button type="submit" class="btn btn-primary">Publicar artículo</button>
                            </form>
                        </div>

                        @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            
                    </div>




























                </div>
        </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="http://youssefrahou.com">Youssef Rahou</a>.</strong>
        Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>


    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
</body>

</html>