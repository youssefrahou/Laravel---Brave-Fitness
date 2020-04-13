@extends('plantillas.plantilla_admin')

@section('head')
<div class="container-fluid">
    <div class="row justify-content-center bg-dark">
        <img src="{{asset('img/logo.png')}}" class="img-fluid col-6 col-md-3">
    </div>
</div>

@endsection

@section('body')

<div class="container-fluid bg-light p-5">

    <div class="row justify-content-center">
        <h1 class="text-center">Admin</h1>
    </div>

    <div class="row justify-content-center">

        <div class="row col-md-2">

            <button type="button" class="btn btn-info m-2" id="categoria">USUARIOS</button>
            <button type="button" class="btn btn-info m-2" id="categoria">ARTICULOS</button>

        </div>
        <div class="row col-md-10" id="usuarios">

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>Country</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>35</td>
                        <td>New York</td>
                        <td>USA</td>
                    </tr>
                </table>
            </div>

        </div>

    </div>


    <div class="row">

        <form action="/categoria" method="POST">

            <label>Nombre</label><br />
            <input type="text" name="nombre_categoria" placeholder="Nombre de la categoria">
            {{ csrf_field() }}
            <br />
            <button type="submit">Guardar categoria</button>
            <button type="reset">Borrar</button>

        </form>

    </div>

</div>

@endsection