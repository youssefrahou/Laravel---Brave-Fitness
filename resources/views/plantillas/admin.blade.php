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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <!-- JQuery para botones -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>
    <script src="{{ asset('js/articulo.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('head')

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
                    <a href="{{ url('/') }}" class="nav-link">Inicio</a>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="far fa-comment-alt"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item">
                            Mensajes sin leer
                        </a>

                        <a class="dropdown-item">
                            Todos los mensajes
                        </a>

                        <a class="dropdown-item">
                            Enviar mensaje
                        </a>






                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" id="actualizarPerfil">
                            Actualizar perfil
                        </a>

                        <a class="dropdown-item">
                            Configuración
                        </a>


                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Cerrar sesión') }}
                        </a>







                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            @if (!Auth::guest() && Auth::user()->hasRole('user'))

            <a href="{{ url('/areaPersonal') }}" class="brand-link">
                <img src="dist/img/logo.png" alt="Logo Brave Fitness" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light"><b>BRAVE</b> <i>FITNESS</i></span>
            </a>

            @else

            <a href="{{ url('/admin') }}" class="brand-link">
                <img src="dist/img/logo.png" alt="Logo Brave Fitness" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">BRAVE FITNESS</span>
            </a>

            @endif

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (auth()->user()->fotoPerfil == null)

                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle elevation-2" alt="avatar">

                        @else

                        <img src="images/users/{{ auth()->user()->fotoPerfil }}" class="img-circle elevation-2" alt="avatar">

                        @endif
                    </div>
                    <div class="info">

                        @if (!Auth::guest() && Auth::user()->hasRole('admin'))

                        <a href="{{ url('/admin') }}" class="d-block">{{ Auth::user()->name }}</a>

                        @else

                        <a href="{{ url('/areaPersonal') }}" class="d-block">{{ Auth::user()->name }}</a>

                        @endif

                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">

                    @yield('lateral')

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

                        <div class="row col-12">

                            @if ($errors->any())
                            <div class="col-12">
                                <div class="alert alert-danger">

                                    @if(count($errors) > 1)
                                    <h4>Errores:</h4>
                                    @else
                                    <h4>Error:</h4>
                                    @endif

                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif

                            @if (session('mensaje'))
                            <div class="alert alert-success text-center col-12">
                                {{ session('mensaje') }}
                            </div>
                            @endif

                        </div>

                        <div class="col-12">

                            @if (!Auth::guest() && Auth::user()->hasRole('admin'))
                            <h1 class="m-0 text-info text-center">ZONA ADMINISTRADOR</h1>
                            @endif

                            @if (!Auth::guest() && Auth::user()->hasRole('user'))
                            <h1 class="m-0 text-info text-center">ÁREA PERSONAL</h1>
                            @endif


                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @yield('contenido')



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