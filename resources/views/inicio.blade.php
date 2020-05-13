@extends('plantillas.inicio')

@section('titulo')
Blave Fitness
@stop

@section('body')

@if (!Auth::guest() && Auth::user()->hasRole('admin'))


<div class="row justify-content-center bg-info col-12 ml-0">

    <div class="row">
        <a class="btn btn-warning text-white" href="{{ url('/admin') }}">Pulse para acceder al panel del
            administrador</a>

        <a href="{{ route('logout') }}" class="btn btn-danger text-white"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar sesión
        </a>

        <!-- Form para cerrar sesion -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

    </div>

</div>

@elseif (!Auth::guest() && Auth::user()->hasRole('user'))

<div class="row justify-content-center bg-info col-12 ml-0">

    <div class="row">
        <a class="btn btn-danger text-white" href="{{ url('/areaPersonal') }}">Pulse para acceder al panel de
            usuario</a>
    </div>

</div>

@endif


<!--w3l-banner-slider-main-->
<section class="w3l-banner-slider-main">
    <div class="bannerhny-content">
        <!--/banner-slider-->
        <div class="content-baner-inf">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="carousel-caption">

                                <h3>Bienvenido a <span class="b-ck">Brave Fitness </span></h3>
                                <p>Es una aplicación web especializada en entrenamiento, nutrición, deportes, hábitos
                                    saludables, etc.
                                    Si quieres formar parte, empezar a aprender y quieres que te ayudemos a conseguir
                                    tus objetivos no dudes en crearte una cuenta.</p>
                                <a href="{{ url('login') }}" class="banner-btn btn bg-info text-white">Iniciar
                                    sesión</a>
                                <a href="{{ url('register') }}" class="banner-btn btn bg-info text-white">Registrarse
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item item2">
                        <div class="container">
                            <div class="carousel-caption">
                                <h3>Los mejores <span class="b-ck"> artículos </span></h3>
                                <p>Todo tipo de artículos del mundo <i>FITNESS</i></p>
                                <a href="about.html" class="banner-btn btn bg-info text-white">Leer artículos</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item item3">
                        <div class="container">
                            <div class="carousel-caption">
                                <h3>Panel<span class="b-ck">Brave Fitness</span></h3>
                                <p>Encontrarás tus dietas, tu progreso, tus fotos, etc</p>
                                <a href="about.html" class="banner-btn btn bg-info text-white">Iniciar sesión</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item item4">
                        <div class="container">
                            <div class="carousel-caption">
                                <h3><span class="b-ck">Damià Oliver</span></h3>
                                <p>Nuestro entrenador personal te guiará en todo tu progreso, hasta cumplir todas tus
                                    metas</p>
                                <a href="about.html" class="banner-btn btn bg-info text-white">Sobre nosotros</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!--//banner-slider-->
    </div>
</section>
<!-- //w3l-banner-slider-main -->

<!--Que te ofrecemos titulo-->
<div class="row bg-dark justify-content-center p-3 ml-0 col-12">

    <h1 class="text-white">¿Qué te ofrecemos?</h1>

</div>

<div class="row bg-dark justify-content-center p-3 ml-0 col-12">

    <p class="text-white">Brave fitness te ofrece las siguientes ventajas:</p>

</div>
<!--fin titulo k t ofrecemos-->

<!-- CARDs -->
<section class="row justify-content-around m-0">
    <div class="col-sm-3">
        <div class="card">
            <a href="#" data-toggle="tooltip" data-html="true" title="Apúntate, es gratis el primer mes">
                <img src="img/php_logo.png" class="card-img-top">
            </a>
            <div class="card-body">
                <h3 class="card-title">Curso PHP</h3>
                <h5 class="card-subtitle mb-3">Haz tu web de manera fácil</h5>
                <div class="card-text">
                    PHP es el lenguaje de programación más usado para hacer páginas Web.
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <a href="#" data-toggle="tooltip" data-html="true" title="Apúntate, es gratis el primer mes">
                <img src="img/mysql.png" class="card-img-top">
            </a>
            <div class="card-body">
                <h3 class="card-title">Curso MySQL</h3>
                <h5 class="card-subtitle mb-3">Todo la potencia de SQL.</h5>
                <div class="card-text">
                    MySQL pone la potencia de las bases de datos relacionales a tu alcance.
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <a href="#" data-toggle="tooltip" data-html="true" title="Apúntate, es gratis el primer mes">
                <img src="img/jquery.png" class="card-img-top">
            </a>
            <div class="card-body">
                <h3 class="card-title">Curso jQuery</h3>
                <h5 class="card-subtitle mb-3">Da vida a tu Web</h5>
                <div class="card-text">
                    jQuery te permite dar vida a tu página web de una manera fácil y sencilla.
                </div>
            </div>
        </div>
    </div>
</section>
<!--Fin cards-->
@stop