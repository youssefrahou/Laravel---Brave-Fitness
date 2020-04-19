@extends('plantillas.admin')


@section('lateral')

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
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Editar usuario</p>
                </span>
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
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver artículos</p>
                </span>
            </li>
            <li class="nav-item">
                <span id="escribirArticulo" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Escribir artículo</p>
                </span>
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
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver consejos</p>
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Escribir consejo</p>
                </span>
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
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver todos los comentarios</p>
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver comentarios sin leer</p>
                </span>
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
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver todos los mensajes</p>
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver mensajes sin leer</p>
                </span>
            </li>

        </ul>
    </li>

</ul>

@stop


@section('content')

<div class="row">




    <div class="table-responsive justify-content-center" id="bienvenida">
        <p class="h3">Bienvenido a Brave Fitness. Elige una opción en el menú lateral. </p>
    </div>

    <div class="table-responsive" style="display: none" id="ensenarUsuarios">
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

    <div class="row col-12" style="display: none" id="crearticulo">
        <h3>Escribir artículo</h3>
        <div class="row col-12">

            <form id="formArticulo" action="articulo" method="POST" class="col-md-12 was-validated" accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">







                <div class="form-group">
                    <label for="exampleFormControlSelect1">Selecciona la categoría del artículo: </label>
                    <select class="form-control" name="categoria_id" id="selectCate" required>

                        <option value="">Selecciona categoría</option>
                        @foreach ($categorias as $categoria)

                        <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>

                        @endforeach
                        <option value="anadir">Añadir categoría</option>

                    </select>
                    <div class="invalid-feedback">Selecciona una categoría. Si no aparece, añádela con la última opción.</div>
                </div>





                <div class="form-group">
                    <label for="uname">Título:</label>
                    <input type="text" class="form-control" id="tit" value="{{ old('titulo') }}" placeholder="Escribe el título" name="titulo" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe el título.</div>
                </div>

                <div class="form-group">
                    <label for="uname">Subtítulo:</label>
                    <input type="text" class="form-control" id="subti" value="{{ old('subtitulo') }}" placeholder="Escribe el subtítulo" name="subtitulo" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe el subtítulo.</div>
                </div>

                <div class="form-group">
                    <label for="uname">Introducción:</label>
                    <textarea class="form-control" id="intro" rows="4" name="introduccion" required>{{ old('introduccion') }}</textarea>
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
                    <input type="text" class="form-control" value="{{ old('pie_imagen1') }}" id="subti" placeholder="Escribe el pie de la primera imagen" name="pie_imagen1" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe el pie de la primera imagen.</div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                </div>



                <button type="submit" id="subirArticulo" class="btn btn-primary">Publicar artículo</button>
            </form>
        </div>


        <!-- Modal para añadir categoria -->
        <div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir nueva categoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formCateegoria" action="categoria" method="POST" class="col-md-12 was-validated" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="uname">Nombre de la categoría:</label>
                                <input type="text" class="form-control" id="tit" value="{{ old('nombre_categoria') }}" placeholder="Escribe el nombre de la categoría" name="nombre_categoria" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Por favor, escribe el nombre de la categoría.</div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar categoría</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



    </div>


    <div class="row col-12" style="display: none" id="verArticulos">



        <!-- details card section starts from here -->
        <div class="container-fluid">

            <section class="details-card">
                <div class="container">


                    <div class="row">


                        @isset($articulos)

                        @foreach($articulos as $articulo)

                        @php

                        $titulo = substr($articulo->titulo, 0, 60);

                        if (strlen($titulo) == 60){
                        $titulo = $titulo . "...";
                        };

                        $texto = substr($articulo->introduccion, 0, 180);

                        if (strlen($texto) == 180){
                        $texto = $texto . "...";
                        };


                        @endphp

                        <div class="col-lg-4 p-2">
                            <div class="card-content">
                                <div class="card-img" style="height: 240px">
                                    @if($articulo->foto1)

                                    <img src="{{ url('/') }}/images/articulos/{{ $articulo->foto1 }}" alt="Imagen" width="100%">

                                    @else

                                    <img src="https://www.solac.com/images/blank_product.png" alt="Imagen no disponible">

                                    @endif


                                    <span>
                                        <h4>PREMIUM</h4>
                                    </span>
                                </div>
                                <div class="card-desc">
                                    <h4 style="height: 90px">{!! $titulo !!} </h4>
                                    <p style="height: 120px">{!! $texto !!}</p>
                                    <a href="articulo/{{$articulo->id}}" class="btn btn-info">LEER</a>
                                </div>
                            </div>
                        </div>



                        @endforeach

                        @endisset





                    </div>




                </div>
























        </div>
    </div>
</div>

@stop