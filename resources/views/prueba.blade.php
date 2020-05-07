@extends('plantillas.inicio')

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
        padding: 10%;
        margin-top: 10%;
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


    /*SWITCH DE LESION*/

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
            <p>Regístrate para acceder a todas las ventajas que te ofrece Brave Fitness. <br /><br /><br />Si ya estás
                registrado, inicia sesión</p>

            <a href="{{url('login')}}" class="btn btn-primary">Iniciar sesión</a><br />
            <br />
        </div>
        <div class="col-md-9 register-right">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                                <input type="text" class="form-control" required id="nombre" name="name"
                                                    placeholder="Nombre">
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
                                                <input type="text" class="form-control" required id="ap" name="email"
                                                    placeholder="Primer apellido">
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
                                                            <option value="noDecirlo">Prefiero no decirlo</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

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
                                                        <input type="text" class="form-control" name="app" id="password"
                                                            placeholder="Peso">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="password">Altura (en cm)</label>
                                                        <input type="text" class="form-control" name="app" id="password"
                                                            placeholder="Altura (en cm)">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="password">Fecha de nacimiento:</label>
                                                        <input type="date" class="form-control" name="app" id="password"
                                                            placeholder="Altura (en cm)">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Estás lesionado? </label><br/>
                                                        <label class="switch">
                                                            <input type="checkbox" id="lesionado">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group" id="mostrarLesionado" style="display: none">
                                                        <label for="password">¿Cuál es la lesión?</label>
                                                        <input type="text" class="form-control" name="app" id="password"
                                                            placeholder="Altura (en cm)">
                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                    </div>




                                    <input type="button" name="previous" class="previous-form btn btn-default"
                                        value="Anterior" />
                                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                                </fieldset>
                                <fieldset>
                                    <h2> Paso 3: Perfil de usuario</h2>
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="Last Name">
                                    </div>
                                    <input type="button" name="previous" class="previous-form btn btn-default"
                                        value="Previous" />
                                    <input type="button" name="next" class="next-form btn btn-info" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <h2> Step 2: Add Personal Details</h2>
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="Last Name">
                                    </div>
                                    <input type="button" name="previous" class="previous-form btn btn-default"
                                        value="Previous" />
                                    <input type="button" name="next" class="next-form btn btn-info" value="Next" />
                                </fieldset>











                                <fieldset>
                                    <h2> Step 2: Add Personal Details</h2>
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="Last Name">
                                    </div>
                                    <input type="button" name="previous" class="previous-form btn btn-default"
                                        value="Previous" />
                                    <input type="button" name="next" class="next-form btn btn-info" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <h2>Step 3: Add Contact Information</h2>
                                    <div class="form-group">
                                        <label for="mobile">Mobile*</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile"
                                            placeholder="Mobile Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address"
                                            placeholder="Communication Address"></textarea>
                                    </div>
                                    <input type="button" name="previous" class="previous-form btn btn-default"
                                        value="Previous" />
                                    <input type="submit" name="submit" class="submit btn btn-success" value="Submit" />
                                </fieldset>
                            </form>
                        </div>



















                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@stop