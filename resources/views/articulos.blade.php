@extends('plantillas.inicio')

@section('titulo')

@isset ( $articulos )
Artículos - Blave Fitness
@else
404 - Brave Fitness
@endisset

@stop

@section('head')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>


@stop

@section('body')

<!-- details card section starts from here -->
<div class="container-fluid">
    <div class="row col-md-3">
        <p>
            <a href="{{ url('/') }}"> Inicio </a> <span>> </span>
            <a href="{{ url('/articulos') }}">Articulos</a>
        </p>


    </div>

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
                            <h4 style="height: 90px">{{ $titulo }} </h4>
                            <p style="height: 120px">{{ $texto }}</p>
                            <a href="articulo/{{$articulo->id}}" class="btn btn-info">LEER</a>
                        </div>
                    </div>
                </div>



                @endforeach

                @endisset





            </div>










        </div>
    </section>
    <!-- details card section starts from here -->


</div>


@stop