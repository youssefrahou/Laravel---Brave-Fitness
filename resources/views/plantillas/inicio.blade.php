<!doctype html>
<html lang="es">

<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <title>
    @yield('titulo')
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--ICONOS PARA LAS REDES SOCIALES-->
    <script src="https://kit.fontawesome.com/7b2c38623a.js" crossorigin="anonymous"></script>

    <!-- Caroussel CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--JS-->
    <script src="{{asset('js/js.js')}}"></script>

    @yield('head')

    

</head>

<body class="container-fluid">

    <!--/top-header-content-->
    <section>
        <div>

            <!--/nav-->
            <nav class="navbar navbar-expand-md navbar-dark bg-info ">
                <!-- fixed-top para FIJARLOOOOO-->
                <a class="navbar-brand col-3 col-md-1" href="{{ url('/') }}"><img src="{{asset('img/logo.png')}}" class="img-fluid" /></a>
                <button class="navbar-toggler bg-info" type="button" data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="{{ url('/') }}" class="nav-link">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/articulos') }}" class="nav-link">Articulos</a>
                        </li>
                        <!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Artículos</a>
                            <div class="dropdown-menu bg-info">
                                <a class="dropdown-item text-white" href="#">Entrenamiento</a>
                                <a class="dropdown-item text-white" href="#">Nutrición</a>
                                <a class="dropdown-item text-white" href="adelgazar.html">Suplementación</a>
                            </div>
                        </li>
-->

                        <li class="nav-item">
                            <a href="{{ url('/planes') }}" class="nav-link">Planes</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/sobreNosotros') }}" class="nav-link">Sobre nosotros</a>
                        </li>
                    </ul>


                    <ul class="nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link active" href="https://www.instagram.com/youssefrahou0/"><i class="fa fa-instagram text-white"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/youssefra333"><i class="fa fa-facebook text-white"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-twitter text-white"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-youtube text-white"></i></a>
                        </li>
                    </ul>



                </div>
            </nav>
            <!--//nav-->
        </div>

    </section>
   

   @yield('body')
 


    <section class="w3l-footer-22-main">
        <!-- footer-22 -->
        <div class="footer-hny py-5">
            <div class="container py-lg-4">
                <div class="sub-columns row">
                    <div class="sub-one-left col-lg-4 col-md-6">
                        <h6>Brave Fitness </h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa officia dicta magni ea at,
                            culpa atque, rerum dolorum voluptas alias qui temporibus ex expedita obcaecati vel
                            asperiores totam distinctio nobis impedit minus.</p>

                    </div>
                    <div class="sub-two-right col-lg-4 col-md-6 my-md-0 my-5">
                        <h6>Menú</h6>
                        <div class="footer-hny-ul">
                            <ul>
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li><a href="{{ url('/articulos') }}">Artículos</a></li>
                                <li><a href="{{ url('/planes') }}">Planes</a></li>
                                <li><a href="{{ url('/sobreNosotros') }}">Sobre nosotros</a></li>
                            </ul>
                            <ul>
                                <li><a href="{{ url('/politicaPrivacidad') }}">Política de privacidad</a></li>
                                <li><a href="{{ url('/terminosCondiciones') }}">Términos y condiciones</a></li>
                                <li><a href="{{ url('/ayuda') }}">Ayuda</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sub-one-left col-lg-4 col-md-6 mt-lg-0 mt-md-5">
                        <h6>¿Quieres recibir las últimas novedades?</h6>
                        <form action="#" method="post" class="footer-newsletter">
                            <div class="">
                                <input type="email" name="email" class="form-input" placeholder="Escribe tu email.." />
                            </div>
                            <button type="submit" class="btn btn-info">Suscribirse</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="below-section">
            <div class="container">
                <div class="copyright-footer row">
                    <div class="columns col-lg-6">
                        <ul class="social footer">
                            <li><a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                            <li><a href="#"><span class="fa fa-google" aria-hidden="true"></span></a></li>
                            <li><a href="#"><span class="fa fa-github" aria-hidden="true"></span></a></li>
                        </ul>
                    </div>
                    <div class="columns copy-right col-lg-6">
                        <p>Brave Fitness 2020 ©. Todos los derechos reservados. Diseñado por <a
                                href="https://youssefrahou.com/" target="_blank">
                                Youssef Rahou</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- //titels-5 -->
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Subir">
            <span class="fa fa-long-arrow-up"></span>
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- /move top -->

    </section>


    </div>
</body>

</html>


<!-- disable body scroll which navbar is in active -->
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- JQuery para articulo -->
<script src="{{ asset('js/articulo.js') }}"></script>