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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>

    <!-- CHAT -->
    <script src="https://use.typekit.net/hoy3lrg.js"></script>
    <script>
        try{Typekit.load({ async: true });}catch(e){}
    </script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch'
        href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <!-- CHAT -->


    <!-- Pusher -->
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('b7fd28c714585deddbc4', {
          cluster: 'eu'
        });
    
        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
          
          //  alert(JSON.stringify(data));

          if(data.de == {{ auth()->user()->id }}){

        
            $("#listaMensajes").append('<li class="replies"><img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" /><p>' + data.texto + '</p></li>');
            $(".messages").animate({ scrollTop: $(document).height() }, "fast");
        }

          if(data.para == {{ auth()->user()->id }}){

            if ($("#idPrimerUsuario").val() == data.de ){ //si el usuario pulsado es quien me manda el mensaje...
                
                $("#listaMensajes").append('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + data.texto + '</p></li >');
                    $(".messages").animate({ scrollTop: $(document).height() }, "fast");
}
            
            
          }

          $(".messages").animate({ scrollTop: $(document).height() }, "fast");
          $('.message-input input').val(null);


          //$("#zonaChat").animate({ scrollTop: $(document).height() }, 1000);
          //$("#divv").html(JSON.stringify(data));
          //window.livewire.emit('mensajeRecibido', data);
        });
    </script>

    <!-- livewire -->
    <!-- livewireStyles -->

    <!-- JQuery para botones -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>
    <script src="{{ asset('js/articulo.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')


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
    <!-- ENVIAR MENSAJES -->
    <script>
        //

    </script>


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
                        <!--
                        <a class="dropdown-item">
                            Configuración
                        </a>-->


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

                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle elevation-2"
                            alt="avatar" style="width: 40px; height: 40px;">

                        @else

                        <img src="images/users/{{ auth()->user()->fotoPerfil }}" class="img-circle elevation-2"
                            alt="avatar" style="width: 40px; height: 40px;">

                        @endif
                    </div>
                    <div class="info">

                        @if (!Auth::guest() && Auth::user()->hasRole('admin'))

                        <a style="font-size: 25px" href="{{ url('/admin') }}"
                            class="d-block">{{ Auth::user()->name }}</a>

                        @else

                        <a style="font-size: 25px" href="{{ url('/areaPersonal') }}"
                            class="d-block">{{ Auth::user()->name }}</a>

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
                    <div class="row">
                        <!--había mb-2 -->

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

                        <!-- OCULTADO POR AHORA -->
                        <div class="col-12" style="display: none">

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

        <!-- COPYRIGHT 
         /.content-wrapper 
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="http://youssefrahou.com">Youssef Rahou</a>.</strong>
            Todos los derechos reservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

         COPYRIGHT -->

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

    <!-- script livewire -->
    <!-- livewireScripts -->
</body>


</html>