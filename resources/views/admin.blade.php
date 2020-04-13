@extends('plantillas.plantilla_admin')

@section('titulo')
Admin - Brave Fitness
@stop

@section('head')
<div class="container-fluid">
    <div class="row justify-content-center bg-dark">
        <img src="{{asset('img/logo.png')}}" class="img-fluid col-6 col-md-3">
    </div>
</div>

@endsection

@section('body')

<script>
    $(document).ready(function() {

        $(".cosa").hide();

        $("#usuarios").click(function() {
            $(".cosa").hide();
            $("#tablaUsuarios").show();
        });
        $("#articulos").click(function() {
            $(".cosa").hide();
            $("#tablaArticulos").show();
        });
    });
</script>

<div class="container-fluid bg-light p-5">

    <div class="row justify-content-center">
        <h1 class="text-center">Admin</h1>
    </div>

    <div class="row justify-content-center">

        <div class="row col-md-2">

            <button type="button" class="btn btn-info m-2" id="usuarios">USUARIOS</button>
            <button type="button" class="btn btn-info m-2" id="articulos">ARTICULOS</button>
            <button type="button" class="btn btn-info m-2" id="videos">VIDEOS</button>
            <button type="button" class="btn btn-info m-2" id="comentarios">COMENTARIOS</button>

        </div>
        <div class="row col-md-10">

            <div class="table-responsive cosa" id="tablaUsuarios">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>1r Apellido</th>
                        <th>1º Apellido</th>
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
                        <td>{{ $usuario->apellido1 }}</td>
                        <td>{{ $usuario->apellido2 }}</td>
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
            <div class="table-responsive cosa" id="tablaArticulos">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>articulo</th>
                        <th>1r Apellido</th>
                        <th>1º Apellido</th>
                        <th>Peso</th>
                        <th>Sexo</th>
                        <th>Objetivo</th>
                        <th>Foto perfil</th>
                        <th>Foto dieta</th>

                    </tr>

                    @isset ( $categorias )
                    @foreach ($categorias as $categoria)
                    
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre_categoria }}</td>
                    </tr>

                    @endforeach
                    @endisset
                </table>
            </div>

        </div>

    </div>


    <!--<div class="row">

        <form action="/categoria" method="POST">

            <label>Nombre</label><br />
            <input type="text" name="nombre_categoria" placeholder="Nombre de la categoria">
            {{ csrf_field() }}
            <br />
            <button type="submit">Guardar categoria</button>
            <button type="reset">Borrar</button>

        </form>

    </div>-->

</div>

@endsection