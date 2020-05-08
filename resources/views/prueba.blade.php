@extends('plantillas.landingPage')

@section('titulo')
Registro - Blave Fitness
@stop


@section('body')
<style>
    .register {
        background: -webkit-linear-gradient(top, #17a2b8, #00c6ff);
        margin-top: 0%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left a {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        font-weight: bold;
        /*margin-top: 0%;*/
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 1s infinite alternate;
        animation: mover 0.5s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }

    .register .register-form {
        padding: 3%;
        margin-top: 0%;
        /*ESTABAN EN 10 LOS DOS*/
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }

    /*altura barra de progreso de registro*/
    .progress {
        height: 30px;
    }

    /*altura barra de progreso de registro*/


    /*SWITCH DE LESION NO SE USA AL FINAL, BORRAR*/

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }



    /*SWITCH DE LESION*/
</style>

<style type="text/css">
    #register_form fieldset:not(:first-of-type) {
        display: none;
    }
</style>


<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Bienvenida a <br /><b>Brave Fitness</b></h3>
            <p>Inicia sesión o regístrate para acceder a todas las ventajas que te ofrece Brave Fitness.
                <br /><br /><br />Si ya estás
                registrado, inicia sesión</p>

            <a href="{{url('login')}}" class="btn btn-primary">Iniciar sesión</a><br />
            <br />
        </div>
        <div class="col-md-9 register-right">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div id="bienvenidaRegistro">
                        <div class="row register-form">
                            <div class="container">
                                <div class="row">

                                    <div class="row col-md-6 p-5 justify-content-center d-none d-sm-none d-md-block"
                                        style="border: 1px solid black;">

                                        <img src="{{asset('images/iphone.png')}}">

                                    </div>

                                    <div class="row col-md-6 p-5 justify-content-center"
                                        style="border: 1px solid black;">


                                        <div class="row col-12 p-3" style="border: 1px solid black;">

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <h3 class="text-center">Brave Fitness</h3>
                                                <div class="form-group row justify-content-center">


                                                    <div class="col-md-8">
                                                        <input id="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ old('email') }}" required
                                                            autocomplete="email" autofocus placeholder="Email">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row justify-content-center">

                                                    <div class="col-md-8">
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="current-password"
                                                            placeholder="Contraseña">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <div class="col-md-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="remember" id="remember"
                                                                {{ old('remember') ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Recuérdame') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0 justify-content-center">
                                                    <div class="col-md-8">
                                                        <button type="submit" class="btn btn-primary col-md-12">
                                                            {{ __('Iniciar sesión') }}
                                                        </button>

                                                        @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('¿Te has olvidado de la contraseña?') }}
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                        <div class="row col-12 p-3 mt-5 justify-content-center"
                                            style="border: 1px solid black;">
                                            <div class="row">
                                                <p class="row text-center">¿No tienes una cuenta? <span id="botonRegistro">Regístrate</span></p>
                                            </div>

                                        </div>

                                        <div class="row col-12 mt-2 justify-content-center">
                                            <p class="row text-center">Descarga la aplicación</p>
                                            <div class="row col-12 justify-content-center">
                                                <img src="{{asset('images/playstore.png')}}" height="40px"
                                                    width="134px">
                                            </div>
                                        </div>









                                    </div>








                                    <!--
                                    <div class="row col-12 text-center justify-content-center">
                                        <h3>Ya formas parte de Brave Fitness?</h3>
                                    </div>
                                    <div class="row col-12 justify-content-center">
                                        <button type="button" class="btn btn-primary">Iniciar sesión</button>
                                    </div>

                                    <div class="row col-12">
                                        <br/><br/>
                                    </div>

                                    <div class="row col-12 text-center justify-content-center">
                                        <h3>¿Eres nuevo?</h3>
                                    </div>
                                    <div class="row col-12 justify-content-center">
                                        <button type="button" class="btn btn-info">Regístrate</button>
                                    </div>
                                 -->

                                </div>

                            </div>
                        </div>

                    </div>








                    <div id="FormRegistro" style="display: none">
                        <h3 class="register-heading">Regístrate, es gratis</h3>
                        <div class="row register-form">

                            <div class="container">

                                <div class="alert alert-danger" id="DivErrores" style="display: none">
                                </div>

                                <div class="progress mb-3">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                        role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>

                                <form id="register_form" novalidate action="form_action.php" method="post">
                                    <fieldset>
                                        <h2>Paso 1: Datos personales</h2>

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="email">Nombre</label>
                                                    <input type="text" class="form-control" required id="nombre"
                                                        name="name" placeholder="Nombre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Segundo apellido</label>
                                                    <input type="text" class="form-control" name="app" id="password"
                                                        placeholder="Segundo apellido">
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="email">Primer apellido</label>
                                                    <input type="text" class="form-control" required id="ap"
                                                        name="email" placeholder="Primer apellido">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">Edad</label>
                                                            <input type="number" class="form-control" name="password"
                                                                id="password" placeholder="Edad" min="7" max="110">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">Sexo</label>
                                                            <br />
                                                            <select class="form-control" name="cars">
                                                                <option value="">Selecciona sexo</option>
                                                                <option value="hombre">Hombre</option>
                                                                <option value="mujer">Mujer</option>
                                                                <option value="otro">Otro</option>
                                                                <option value="noDecirlo">Prefiero no decirlo
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <input type="button" name="previous" class="previous-form btn btn-default"
                                        value="Atrás" id="atras"/>
                                        <input type="button" class="next-form btn btn-info" value="Siguiente" />
                                    </fieldset>



                                    <fieldset>
                                        <h2> Paso 2: Condición física</h2>
                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password">Peso</label>
                                                            <input type="text" class="form-control" name="app"
                                                                id="password" placeholder="Peso">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password">Altura (en cm)</label>
                                                            <input type="text" class="form-control" name="app"
                                                                id="password" placeholder="Altura (en cm)">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password">Fecha de nacimiento:</label>
                                                            <input type="date" class="form-control" name="app"
                                                                id="password" placeholder="Altura (en cm)">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>




                                        <input type="button" name="previous" class="previous-form btn btn-default"
                                            value="Anterior" />
                                        <input type="button" name="next" class="next-form btn btn-info"
                                            value="Siguiente" />
                                    </fieldset>

                                    <fieldset>
                                        <h2> Paso 3: Crea tu cuenta</h2>


                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first_name">Correo electrónico:</label>
                                                    <input type="text" class="form-control" name="first_name"
                                                        id="first_name" placeholder="Correo electrónico">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="last_name">Contraseña:</label>
                                                    <input type="password" class="form-control" name="last_name"
                                                        id="last_name" placeholder="Contraseña">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="last_name">Vuelve a escribir tu contraseña:</label>
                                                    <input type="password" class="form-control" name="last_name"
                                                        id="last_name" placeholder="Vuelve a escribir tu contraseña">
                                                </div>
                                            </div>

                                        </div>


                                        <input type="button" name="previous" class="previous-form btn btn-default"
                                            value="Anterior" />
                                        <input type="button" name="next" class="next-form btn btn-info"
                                            value="Siguiente" />
                                    </fieldset>


                                    <fieldset>
                                        <h2> Paso 4: Condiciones de uso</h2>

                                        <div>
                                            <br /><br />
                                            <p>Si te registras, significa que aceptas los <a href="#">Términos</a>,
                                                la <a href="#">Política de privacidad</a> y la política de <a
                                                    href="#">Uso
                                                    de cookies</a>.
                                                Además, confirmas que eres mayor de 14 años de edad.</p>
                                            <br /><br /><br />
                                        </div>

                                        <input type="button" name="previous" class="previous-form btn btn-default"
                                            value="Anterior" />
                                        <input type="submit" name="submit" class="submit btn btn-primary"
                                            value="Registrarte" />
                                    </fieldset>
                                </form>
                            </div>

















                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@stop