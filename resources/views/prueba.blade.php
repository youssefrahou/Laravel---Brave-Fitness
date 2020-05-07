@extends('plantillas.inicio')

@section('titulo')
Registro - Blave Fitness
@stop


@section('body')
<style>
.register{
    background: -webkit-linear-gradient(top, #17a2b8, #00c6ff);
    margin-top: 0%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left a{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    font-weight: bold;
    /*margin-top: 0%;*/
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
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
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
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
            <h3>Bienvenida a <br/><b>Brave Fitness</b></h3>
            <p>Regístrate para acceder a todas las ventajas que te ofrece Brave Fitness. <br/><br/><br/>Si ya estás registrado, inicia sesión</p>
            
        <a href="{{url('login')}}" class="btn btn-primary">Iniciar sesión</a><br/>
            <br/>
        </div>
        <div class="col-md-9 register-right">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Regístrate, es gratis</h3>
                    <div class="row register-form">
                        
                        <div class="container">
                           
                            <div class="alert alert-danger" id="DivErrores" style="display: none">
                            </div>
                            
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            
                            <form id="register_form" novalidate action="form_action.php" method="post">
                                <fieldset>
                                    <h2>Step 1: Add Account Details</h2>
                                    <div class="form-group">
                                        <label for="email">Email address*</label>
                                        <input type="email" class="form-control" required id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password*</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    </div>
                                    <input type="button" class="next-form btn btn-info" value="Siguiente" />
                                </fieldset>



                                <fieldset>
                                    <h2> Step 2: Add Personal Details</h2>
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                    </div>
                                    <input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
                                    <input type="button" name="next" class="next-form btn btn-info" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <h2> Step 2: Add Personal Details</h2>
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                    </div>
                                    <input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
                                    <input type="button" name="next" class="next-form btn btn-info" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <h2> Step 2: Add Personal Details</h2>
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                    </div>
                                    <input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
                                    <input type="button" name="next" class="next-form btn btn-info" value="Next" />
                                </fieldset>











                                <fieldset>
                                    <h2> Step 2: Add Personal Details</h2>
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                    </div>
                                    <input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
                                    <input type="button" name="next" class="next-form btn btn-info" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <h2>Step 3: Add Contact Information</h2>
                                    <div class="form-group">
                                        <label for="mobile">Mobile*</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" placeholder="Communication Address"></textarea>
                                    </div>
                                    <input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
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