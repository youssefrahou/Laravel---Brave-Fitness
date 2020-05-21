@extends('plantillas.admin')

@section('head')

<script src="https://use.typekit.net/hoy3lrg.js"></script>
<script>
    try{Typekit.load({ async: true });}catch(e){}
</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<link rel='stylesheet prefetch'
    href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<style class="cp-pen-styles">
    #frame {
        width: 100%;
        height: 92vh;
        min-height: 300px;
        max-height: 90%;
        background: #E6EAEA;
    }

    @media screen and (max-width: 360px) {
        #frame {
            width: 100%;
            height: 100vh;
        }
    }

    #frame #sidepanel {
        float: left;
        min-width: 280px;
        max-width: 340px;
        width: 40%;
        height: 100%;
        background: #2c3e50;
        color: #f5f5f5;
        overflow: hidden;
        position: relative;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel {
            width: 58px;
            min-width: 58px;
        }
    }

    #frame #sidepanel #profile {
        width: 80%;
        margin: 25px auto;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile {
            width: 100%;
            margin: 0 auto;
            padding: 5px 0 0 0;
            background: #32465a;
        }
    }

    #frame #sidepanel #profile.expanded .wrap {
        height: 210px;
        line-height: initial;
    }

    #frame #sidepanel #profile.expanded .wrap p {
        margin-top: 20px;
    }

    #frame #sidepanel #profile.expanded .wrap i.expand-button {
        -moz-transform: scaleY(-1);
        -o-transform: scaleY(-1);
        -webkit-transform: scaleY(-1);
        transform: scaleY(-1);
        filter: FlipH;
        -ms-filter: "FlipH";
    }

    #frame #sidepanel #profile .wrap {
        height: 60px;
        line-height: 60px;
        overflow: hidden;
        -moz-transition: 0.3s height ease;
        -o-transition: 0.3s height ease;
        -webkit-transition: 0.3s height ease;
        transition: 0.3s height ease;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap {
            height: 55px;
        }
    }

    #frame #sidepanel #profile .wrap img {
        width: 50px;
        border-radius: 50%;
        padding: 3px;
        border: 2px solid #e74c3c;
        height: auto;
        float: left;
        cursor: pointer;
        -moz-transition: 0.3s border ease;
        -o-transition: 0.3s border ease;
        -webkit-transition: 0.3s border ease;
        transition: 0.3s border ease;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap img {
            width: 40px;
            margin-left: 4px;
        }
    }

    #frame #sidepanel #profile .wrap img.online {
        border: 2px solid #2ecc71;
    }

    #frame #sidepanel #profile .wrap img.away {
        border: 2px solid #f1c40f;
    }

    #frame #sidepanel #profile .wrap img.busy {
        border: 2px solid #e74c3c;
    }

    #frame #sidepanel #profile .wrap img.offline {
        border: 2px solid #95a5a6;
    }

    #frame #sidepanel #profile .wrap p {
        float: left;
        margin-left: 15px;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap p {
            display: none;
        }
    }

    #frame #sidepanel #profile .wrap i.expand-button {
        float: right;
        margin-top: 23px;
        font-size: 0.8em;
        cursor: pointer;
        color: #435f7a;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap i.expand-button {
            display: none;
        }
    }

    #frame #sidepanel #profile .wrap #status-options {
        position: absolute;
        opacity: 0;
        visibility: hidden;
        width: 150px;
        margin: 70px 0 0 0;
        border-radius: 6px;
        z-index: 99;
        line-height: initial;
        background: #435f7a;
        -moz-transition: 0.3s all ease;
        -o-transition: 0.3s all ease;
        -webkit-transition: 0.3s all ease;
        transition: 0.3s all ease;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options {
            width: 58px;
            margin-top: 57px;
        }
    }

    #frame #sidepanel #profile .wrap #status-options.active {
        opacity: 1;
        visibility: visible;
        margin: 75px 0 0 0;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options.active {
            margin-top: 62px;
        }
    }

    #frame #sidepanel #profile .wrap #status-options:before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 8px solid #435f7a;
        margin: -8px 0 0 24px;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options:before {
            margin-left: 23px;
        }
    }

    #frame #sidepanel #profile .wrap #status-options ul {
        overflow: hidden;
        border-radius: 6px;
    }

    #frame #sidepanel #profile .wrap #status-options ul li {
        padding: 15px 0 30px 18px;
        display: block;
        cursor: pointer;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li {
            padding: 15px 0 35px 22px;
        }
    }

    #frame #sidepanel #profile .wrap #status-options ul li:hover {
        background: #496886;
    }

    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 5px 0 0 0;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
            width: 14px;
            height: 14px;
        }
    }

    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
        content: '';
        position: absolute;
        width: 14px;
        height: 14px;
        margin: -3px 0 0 -3px;
        background: transparent;
        border-radius: 50%;
        z-index: 0;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
            height: 18px;
            width: 18px;
        }
    }

    #frame #sidepanel #profile .wrap #status-options ul li p {
        padding-left: 12px;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li p {
            display: none;
        }
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
        background: #2ecc71;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
        border: 1px solid #2ecc71;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
        background: #f1c40f;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
        border: 1px solid #f1c40f;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
        background: #e74c3c;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
        border: 1px solid #e74c3c;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
        background: #95a5a6;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
        border: 1px solid #95a5a6;
    }

    #frame #sidepanel #profile .wrap #expanded {
        padding: 100px 0 0 0;
        display: block;
        line-height: initial !important;
    }

    #frame #sidepanel #profile .wrap #expanded label {
        float: left;
        clear: both;
        margin: 0 8px 5px 0;
        padding: 5px 0;
    }

    #frame #sidepanel #profile .wrap #expanded input {
        border: none;
        margin-bottom: 6px;
        background: #32465a;
        border-radius: 3px;
        color: #f5f5f5;
        padding: 7px;
        width: calc(100% - 43px);
    }

    #frame #sidepanel #profile .wrap #expanded input:focus {
        outline: none;
        background: #435f7a;
    }

    #frame #sidepanel #search {
        border-top: 1px solid #32465a;
        border-bottom: 1px solid #32465a;
        font-weight: 300;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #search {
            display: none;
        }
    }

    #frame #sidepanel #search label {
        position: absolute;
        margin: 10px 0 0 20px;
    }

    #frame #sidepanel #search input {
        font-family: "proxima-nova", "Source Sans Pro", sans-serif;
        padding: 10px 0 10px 46px;
        width: calc(100% - 25px);
        border: none;
        background: #32465a;
        color: #f5f5f5;
    }

    #frame #sidepanel #search input:focus {
        outline: none;
        background: #435f7a;
    }

    #frame #sidepanel #search input::-webkit-input-placeholder {
        color: #f5f5f5;
    }

    #frame #sidepanel #search input::-moz-placeholder {
        color: #f5f5f5;
    }

    #frame #sidepanel #search input:-ms-input-placeholder {
        color: #f5f5f5;
    }

    #frame #sidepanel #search input:-moz-placeholder {
        color: #f5f5f5;
    }

    #frame #sidepanel #contacts {
        height: calc(100% - 177px);
        overflow-y: scroll;
        overflow-x: hidden;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts {
            height: calc(100% - 149px);
            overflow-y: scroll;
            overflow-x: hidden;
        }

        #frame #sidepanel #contacts::-webkit-scrollbar {
            display: none;
        }
    }

    #frame #sidepanel #contacts.expanded {
        height: calc(100% - 334px);
    }

    #frame #sidepanel #contacts::-webkit-scrollbar {
        width: 8px;
        background: #2c3e50;
    }

    #frame #sidepanel #contacts::-webkit-scrollbar-thumb {
        background-color: #243140;
    }

    #frame #sidepanel #contacts ul li.contact {
        position: relative;
        padding: 10px 0 15px 0;
        font-size: 0.9em;
        cursor: pointer;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact {
            padding: 6px 0 46px 8px;
        }
    }

    #frame #sidepanel #contacts ul li.contact:hover {
        background: #32465a;
    }

    #frame #sidepanel #contacts ul li.contact.active {
        background: #32465a;
        border-right: 5px solid #435f7a;
    }

    #frame #sidepanel #contacts ul li.contact.active span.contact-status {
        border: 2px solid #32465a !important;
    }

    #frame #sidepanel #contacts ul li.contact .wrap {
        width: 88%;
        margin: 0 auto;
        position: relative;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap {
            width: 100%;
        }
    }

    #frame #sidepanel #contacts ul li.contact .wrap span {
        position: absolute;
        left: 0;
        margin: -2px 0 0 -2px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 2px solid #2c3e50;
        background: #95a5a6;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.online {
        background: #2ecc71;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.away {
        background: #f1c40f;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.busy {
        background: #e74c3c;
    }

    #frame #sidepanel #contacts ul li.contact .wrap img {
        width: 40px;
        border-radius: 50%;
        float: left;
        margin-right: 10px;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap img {
            margin-right: 0px;
        }
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta {
        padding: 5px 0 0 0;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap .meta {
            display: none;
        }
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
        font-weight: 600;
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
        margin: 5px 0 0 0;
        padding: 0 0 1px;
        font-weight: 400;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        -moz-transition: 1s all ease;
        -o-transition: 1s all ease;
        -webkit-transition: 1s all ease;
        transition: 1s all ease;
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
        position: initial;
        border-radius: initial;
        background: none;
        border: none;
        padding: 0 2px 0 0;
        margin: 0 0 0 1px;
        opacity: .5;
    }

    #frame #sidepanel #bottom-bar {
        position: absolute;
        width: 100%;
        bottom: 0;
    }

    #frame #sidepanel #bottom-bar button {
        float: left;
        border: none;
        width: 50%;
        padding: 10px 0;
        background: #32465a;
        color: #f5f5f5;
        cursor: pointer;
        font-size: 0.85em;
        font-family: "proxima-nova", "Source Sans Pro", sans-serif;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button {
            float: none;
            width: 100%;
            padding: 15px 0;
        }
    }

    #frame #sidepanel #bottom-bar button:focus {
        outline: none;
    }

    #frame #sidepanel #bottom-bar button:nth-child(1) {
        border-right: 1px solid #2c3e50;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button:nth-child(1) {
            border-right: none;
            border-bottom: 1px solid #2c3e50;
        }
    }

    #frame #sidepanel #bottom-bar button:hover {
        background: #435f7a;
    }

    #frame #sidepanel #bottom-bar button i {
        margin-right: 3px;
        font-size: 1em;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button i {
            font-size: 1.3em;
        }
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button span {
            display: none;
        }
    }

    #frame .content {
        float: right;
        width: 60%;
        height: 100%;
        overflow: hidden;
        position: relative;
    }

    @media screen and (max-width: 735px) {
        #frame .content {
            width: calc(100% - 58px);
            min-width: 200px !important;
            /*minimo para que se vea en una pantalla de minimo eso. estaba en 300px*/
        }
    }

    @media screen and (min-width: 900px) {
        #frame .content {
            width: calc(100% - 340px);
        }
    }

    #frame .content .contact-profile {
        width: 100%;
        height: 60px;
        line-height: 60px;
        background: #f5f5f5;
    }

    #frame .content .contact-profile img {
        width: 40px;
        border-radius: 50%;
        float: left;
        margin: 9px 12px 0 9px;
    }

    #frame .content .contact-profile p {
        float: left;
    }

    #frame .content .contact-profile .social-media {
        float: right;
    }

    #frame .content .contact-profile .social-media i {
        margin-left: 14px;
        cursor: pointer;
    }

    #frame .content .contact-profile .social-media i:nth-last-child(1) {
        margin-right: 20px;
    }

    #frame .content .contact-profile .social-media i:hover {
        color: #435f7a;
    }

    #frame .content .messages {
        height: auto;
        min-height: calc(100% - 93px);
        max-height: calc(100% - 93px);
        overflow-y: scroll;
        overflow-x: hidden;
    }

    @media screen and (max-width: 735px) {
        #frame .content .messages {
            max-height: calc(100% - 105px);
        }
    }

    #frame .content .messages::-webkit-scrollbar {
        width: 8px;
        background: transparent;
    }

    #frame .content .messages::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.3);
    }

    #frame .content .messages ul li {
        display: inline-block;
        clear: both;
        float: left;
        margin: 15px 15px 5px 15px;
        width: calc(100% - 25px);
        font-size: 0.9em;
    }

    #frame .content .messages ul li:nth-last-child(1) {
        margin-bottom: 20px;
    }

    #frame .content .messages ul li.sent img {
        margin: 6px 8px 0 0;
    }

    #frame .content .messages ul li.sent p {
        background: #435f7a;
        color: #f5f5f5;
    }

    #frame .content .messages ul li.replies img {
        float: right;
        margin: 6px 0 0 8px;
    }

    #frame .content .messages ul li.replies p {
        background: #f5f5f5;
        float: right;
    }

    #frame .content .messages ul li img {
        width: 22px;
        border-radius: 50%;
        float: left;
    }

    #frame .content .messages ul li p {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 20px;
        max-width: 205px;
        line-height: 130%;
    }

    @media screen and (min-width: 735px) {
        #frame .content .messages ul li p {
            max-width: 300px;
        }
    }

    #frame .content .message-input {
        position: absolute;
        bottom: 0;
        width: 100%;
        z-index: 99;
    }

    #frame .content .message-input .wrap {
        position: relative;
    }

    #frame .content .message-input .wrap input {
        font-family: "proxima-nova", "Source Sans Pro", sans-serif;
        float: left;
        border: none;
        width: calc(100% - 90px);
        padding: 11px 32px 10px 8px;
        font-size: 0.8em;
        color: #32465a;
    }

    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap input {
            padding: 15px 32px 16px 8px;
        }
    }

    #frame .content .message-input .wrap input:focus {
        outline: none;
    }




    #frame .content .message-input .wrap button {
        float: right;
        border: none;
        width: 50px;
        padding: 12px 0;
        cursor: pointer;
        background: #32465a;
        color: #f5f5f5;
    }

    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap button {
            padding: 16px 0;
        }
    }

    #frame .content .message-input .wrap button:hover {
        background: #435f7a;
    }

    #frame .content .message-input .wrap button:focus {
        outline: none;
    }
</style>


@stop


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
            <li class="nav-item" id="verArticulos">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver artículos</p>
                </span>
            </li>
            <li class="nav-item" id="escribirArticulo">
                <span class="nav-link">
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
            <li class="nav-item" id="verConsejos">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver consejos</p>
                </span>
            </li>
            <li class="nav-item" id="anadirConsejo">
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
            <li class="nav-item" id="verComentarios">
                <span class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver todos los comentarios</p>
                </span>
            </li>
            <li class="nav-item" id="verComentariosSinLeer">
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


@section('contenido')

<div class="row">

    <!-- Mensaje de bienvenida
    <div class="table-responsive justify-content-center" id="bienvenida">
        <p class="h3 text-center"> </p>
    </div>
    Mensaje de bienvenida -->


    <!-- Tabla usuarios -->
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
    <!-- Tabla usuarios -->


    <!-- Escribir articulo -->
    <div class="row col-12" style="display: none" id="crearticulo">
        <h3>Escribir artículo</h3>
        <div class="row col-12">

            <form id="formArticulo" action="{{ url('articulo') }}" method="POST" class="col-md-12 was-validated"
                accept-charset="UTF-8" enctype="multipart/form-data">
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
                    <div class="invalid-feedback">Selecciona una categoría. Si no aparece, añádela con la última opción.
                    </div>
                </div>

                <div class="form-group">
                    <label for="uname">Título:</label>
                    <input type="text" class="form-control" id="tit" value="{{ old('titulo') }}"
                        placeholder="Escribe el título" name="titulo" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe el título.</div>
                </div>

                <div class="form-group">
                    <label for="uname">Subtítulo:</label>
                    <input type="text" class="form-control" id="subti" value="{{ old('subtitulo') }}"
                        placeholder="Escribe el subtítulo" name="subtitulo" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe el subtítulo.</div>
                </div>

                <div class="form-group">
                    <label for="uname">Introducción:</label>
                    <textarea class="form-control" id="intro" rows="4" name="introduccion"
                        required>{{ old('introduccion') }}</textarea>
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
                    <input type="text" class="form-control" value="{{ old('pie_imagen1') }}" id="subti"
                        placeholder="Escribe el pie de la primera imagen" name="pie_imagen1" required>
                    <div class="valid-feedback">Válido.</div>
                    <div class="invalid-feedback">Por favor, escribe el pie de la primera imagen.</div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                </div>


                <button type="submit" id="subirArticulo" class="btn btn-primary">Publicar artículo</button>
            </form>
        </div>
        <!-- Escribir articulo -->


        <!-- Modal para añadir categoria -->
        <div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir nueva categoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formCateegoria" action="{{ url('categoria') }}" method="POST"
                            class="col-md-12 was-validated" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="uname">Nombre de la categoría:</label>
                                <input type="text" class="form-control" id="tit" value="{{ old('nombre_categoria') }}"
                                    placeholder="Escribe el nombre de la categoría" name="nombre_categoria" required>
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
        <!-- Modal para añadir categoria -->

    </div>
    <!-- Escribir articulo -->



    <!-- Ver articulos -->
    <div class="row col-12" style="display: none" id="ensenarArticulos">
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

                                    <img src="{{ url('/') }}/images/articulos/{{ $articulo->foto1 }}" alt="Imagen"
                                        width="100%">

                                    @else

                                    <img src="https://www.solac.com/images/blank_product.png"
                                        alt="Imagen no disponible">

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
            </section>
        </div>
    </div>
    <!-- Ver articulos -->

    <!-- Ver consejos -->
    <div class="row col-12" style="display: none" id="ensenarConsejos">
        <div class="container-fluid">

            <section class="details-card">
                <div class="container">

                    <div class="row">

                        @isset($consejos)

                        @foreach($consejos as $consejo)

                        @php

                        $titulo = substr($consejo->titulo, 0, 60);

                        if (strlen($titulo) == 60){
                        $titulo = $titulo . "...";
                        };

                        $texto = substr($consejo->texto, 0, 180);

                        if (strlen($texto) == 180){
                        $texto = $texto . "...";
                        };
                        @endphp


                        <div class="col-lg-4 p-2">
                            <div class="card-content">
                                <div class="card-img" style="height: 240px; border-bottom: 0.5px solid gray">
                                    @if($consejo->foto)

                                    <img src="{{ url('/') }}/images/consejos/{{ $consejo->foto }}" alt="Imagen"
                                        width="100%">

                                    @else

                                    <img src="https://www.solac.com/images/blank_product.png"
                                        alt="Imagen no disponible">

                                    @endif

                                </div>
                                <div class="card-desc">
                                    <h4 style="height: 90px">{!! $titulo !!} </h4>
                                    <p style="height: 120px">{!! $texto !!}</p>
                                    <span>{{$consejo->fecha}}</span><br />
                                    <a href="" class="btn btn-danger">Borrar</a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        @endisset

                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- Ver consejos -->

    <!-- Modal para añadir CONSEJO -->
    <div class="modal fade" id="modalConsejo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo consejo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="formConsejo" action="{{ url('consejo') }}" method="POST" class="col-md-12 was-validated"
                        accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="uname">Título del consejo:</label>
                            <input type="text" class="form-control" value="{{ old('titulo') }}"
                                placeholder="Escribe el titulo del consejo" name="titulo" required>
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Por favor, escribe el título del consejo.</div>
                        </div>

                        <div class="form-group">
                            <label for="uname">Consejo:</label>
                            <textarea class="form-control" rows="3" name="texto" required>{{ old('texto') }}</textarea>
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Por favor, escribe el consejo.</div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Imagen <i>(opcional)</i></label>
                            <input type="file" class="form-control-file" name="foto">
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Por favor, selecciona una imagen.</div>
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
    <!-- Modal para añadir CONSEJO -->

    <!-- Ver todos comentarios -->
    <div class="row col-12" style="display: none" id="ensenarComentarios">
        <div class="container-fluid">

            <section class="details-card">
                <div class="container">

                    <div class="row">

                        @isset($comentarios)

                        @foreach($comentarios as $comentario)

                        @php

                        $titulo = substr($comentario->titulo, 0, 60);

                        if (strlen($titulo) == 60){
                        $titulo = $titulo . "...";
                        };

                        $texto = substr($comentario->texto, 0, 180);

                        if (strlen($texto) == 180){
                        $texto = $texto . "...";
                        };
                        @endphp


                        <div class="col-lg-4 p-2">

                            @if($comentario->leido == 0)
                            <div class="card-content p-5" style="background-color: #D7D7D7">

                                @php
                                $articulo = \App\Articulo::where('id', $comentario -> articulo_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Artículo:</h5>
                                    <p>{{$articulo[0]->titulo}}</p>

                                </div>


                                <div class="row col-12">
                                    <h5 class="col-12">Asunto:</h5>
                                    <p>{{$comentario->asunto}}</p>
                                    <h5 class="col-12">Comentario:</h5>
                                    <p>{{$comentario->texto}}</p><br />

                                </div>

                                @php
                                $nombreUsuario = \App\User::where('id', $comentario -> users_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Usuario: </h5>
                                    <p>{{$nombreUsuario[0]->name}}</p><br />
                                </div>


                                <div class="row col-12">
                                    <span class="col-12">{{$comentario->fecha_hora}}</span>

                                    <!-- CONTESTAR comentario -->

                                    <button class="btn btn-info col-md-6" id="contestarComentario">Contestar</button>
                                    <!-- CONTESTAR comentario -->

                                    <!-- Modal para CONTESTAR comentario -->
                                    <div class="modal fade" id="modalContestarComentario" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Responder comentario
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="formRespuestaLeid" action="{{ url('respuesta') }}"
                                                        method="POST" class="col-md-12 was-validated"
                                                        accept-charset="UTF-8" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="uname" class="w-100">Comentario:
                                                                "<i>{{ $comentario->texto }}</i>"</label>
                                                            <label for="uname">Respuesta:</label>
                                                            <input type="text" class="form-control" id="tit"
                                                                value="{{ old('texto') }}"
                                                                placeholder="Escribe la respuesta al comentario"
                                                                name="texto" required>
                                                            <div class="valid-feedback">Válido.</div>
                                                            <div class="invalid-feedback">Por favor, escribe la
                                                                respuesta.</div>
                                                        </div>
                                                        <input type="hidden" name="leido" value="1">
                                                        <input type="hidden" name="users_id"
                                                            value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="comentario_id"
                                                            value="{{ $comentario->id }}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <input type="submit" class="btn btn-success col-md-6"
                                                        style="display:none" value="M">

                                                    <button type="button" id="enviarYmarcar"
                                                        class="btn btn-success">Responder</button>
                                                </div>
                                                </form>

                                                <!-- Marcar como leído -->
                                                <form id="formLeidoMarc"
                                                    action="{{ url('comentario')}}/{{$comentario->id}}" method="POST"
                                                    class="col-md-12" accept-charset="UTF-8"
                                                    enctype="multipart/form-data">

                                                    <input type="hidden" name="_token" id="token"
                                                        value="{{ csrf_token() }}">

                                                    {{ method_field('PUT') }}

                                                    <input type="hidden" value="1" name="leido">
                                                    <input type="submit" class="btn btn-success col-md-6"
                                                        style="display:none" value="Marcar leído">

                                                </form>
                                                <!-- Marcar como leído -->


                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal para CONTESTAR comentario -->



                                    <!-- Marcar como leído -->
                                    <form id="formLeido" action="{{ url('comentario')}}/{{$comentario->id}}"
                                        method="POST" class="col-md-12" accept-charset="UTF-8"
                                        enctype="multipart/form-data">

                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                        {{ method_field('PUT') }}

                                        <input type="hidden" value="1" name="leido">
                                        <input type="submit" class="btn btn-success col-md-6" value="Marcar leído">

                                    </form>
                                    <!-- Marcar como leído -->

                                    <a href="{{ url('articulo')}}/{{$comentario->articulo_id}}"
                                        class="btn btn-warning col-md-6">Ver artículo</a>

                                    <!-- Borrar comentario -->
                                    <form id="formLeido" action="{{ url('comentario')}}/{{$comentario->id}}"
                                        method="POST" class="col-md-12" accept-charset="UTF-8"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger col-md-6">Borrar</button>

                                    </form>
                                    <!-- Borrar comentario -->

                                </div>

                            </div>

                            @else

                            <div class="card-content p-5">

                                @php
                                $articulo = \App\Articulo::where('id', $comentario -> articulo_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Artículo:</h5>
                                    <p>{{$articulo[0]->titulo}}</p>

                                </div>


                                <div class="row col-12">
                                    <h5 class="col-12">Asunto:</h5>
                                    <p>{{$comentario->asunto}}</p>
                                    <h5 class="col-12">Comentario:</h5>
                                    <p>{{$comentario->texto}}</p><br />

                                </div>

                                @php
                                $nombreUsuario = \App\User::where('id', $comentario -> users_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Usuario: </h5>
                                    <p>{{$nombreUsuario[0]->name}}</p><br />
                                </div>


                                <div class="row col-12">
                                    <span class="col-12">{{$comentario->fecha_hora}}</span>
                                    <a href="" class="btn btn-info">Contestar</a>
                                </div>

                            </div>

                            @endif


                        </div>

                        @endforeach

                        @endisset

                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- Ver todos comentarios -->

    <!-- Ver comentarios SIN LEER -->
    <div class="row col-12" style="display: none" id="ensenarComentariosSinLeer">
        <div class="container-fluid">

            <section class="details-card">
                <div class="container">

                    <div class="row">

                        @isset($comentarios)

                        @foreach($comentarios as $comentario)

                        @php

                        $titulo = substr($comentario->titulo, 0, 60);

                        if (strlen($titulo) == 60){
                        $titulo = $titulo . "...";
                        };

                        $texto = substr($comentario->texto, 0, 180);

                        if (strlen($texto) == 180){
                        $texto = $texto . "...";
                        };
                        @endphp


                        <div class="col-lg-4 p-2">

                            @if($comentario->leido == 0)
                            <div class="card-content p-5" style="background-color: #D7D7D7">

                                @php
                                $articulo = \App\Articulo::where('id', $comentario -> articulo_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Artículo:</h5>
                                    <p>{{$articulo[0]->titulo}}</p>

                                </div>


                                <div class="row col-12">
                                    <h5 class="col-12">Asunto:</h5>
                                    <p>{{$comentario->asunto}}</p>
                                    <h5 class="col-12">Comentario:</h5>
                                    <p>{{$comentario->texto}}</p><br />

                                </div>

                                @php
                                $nombreUsuario = \App\User::where('id', $comentario -> users_id)->get();
                                @endphp

                                <div class="row col-12">
                                    <h5 class="col-12">Usuario: </h5>
                                    <p>{{$nombreUsuario[0]->name}}</p><br />
                                </div>


                                <div class="row col-12">
                                    <span class="col-12">{{$comentario->fecha_hora}}</span>

                                    <!-- CONTESTAR comentario -->

                                    <button class="btn btn-info col-md-6" id="contestarComentario2">Contestar</button>
                                    <!-- CONTESTAR comentario -->

                                    <!-- Modal para CONTESTAR comentario -->
                                    <div class="modal fade" id="modalContestarComentario2" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Responder comentario
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="formMarcarYcontestar2" action="{{ url('respuesta') }}"
                                                        method="POST" class="col-md-12 was-validated"
                                                        accept-charset="UTF-8" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="uname" class="w-100">Comentario:
                                                                "<i>{{ $comentario->texto }}</i>"</label>
                                                            <label for="uname">Respuesta:</label>
                                                            <input type="text" class="form-control" id="tit"
                                                                value="{{ old('texto') }}"
                                                                placeholder="Escribe la respuesta al comentario"
                                                                name="texto" required>
                                                            <div class="valid-feedback">Válido.</div>
                                                            <div class="invalid-feedback">Por favor, escribe la
                                                                respuesta.</div>
                                                        </div>
                                                        <input type="hidden" name="leido" value="1">
                                                        <input type="hidden" name="users_id"
                                                            value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="comentario_id"
                                                            value="{{ $comentario->id }}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="button" id="marcarYResponder2"
                                                        class="btn btn-success">Responder</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal para CONTESTAR comentario -->



                                    <!-- Marcar como leído -->
                                    <form id="formuMmarcarYResponder2"
                                        action="{{ url('comentario')}}/{{$comentario->id}}" method="POST"
                                        class="col-md-12" accept-charset="UTF-8" enctype="multipart/form-data">

                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                        {{ method_field('PUT') }}

                                        <input type="hidden" value="1" name="leido">
                                        <input type="submit" class="btn btn-success col-md-6" value="Marcar leído">

                                    </form>
                                    <!-- Marcar como leído -->

                                    <a href="{{ url('articulo')}}/{{$comentario->articulo_id}}"
                                        class="btn btn-warning col-md-6">Ver artículo</a>

                                    <!-- Borrar comentario -->
                                    <form id="formLeido" action="{{ url('comentario')}}/{{$comentario->id}}"
                                        method="POST" class="col-md-12" accept-charset="UTF-8"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger col-md-6">Borrar</button>

                                    </form>
                                    <!-- Borrar comentario -->


                                </div>

                            </div>

                            @endif
                        </div>


                        @endforeach

                        @endisset

                        @php
                        $totalSinLeer = DB::table('comentario')->where('leido', 0)->count();
                        @endphp

                        @if($totalSinLeer == 0)

                        <div class="container-fluid bg-light">
                            <div class="row h1 p-5 justify-content-center">
                                <p class="text-center">No hay comentarios sin leer</p>
                                <br /><br /><br /><br />
                            </div>


                        </div>
                        @endif




                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- Ver comentarios SIN LEER-->



    <!-- CHAT -->

    <div class="row col-12" id="chat">

        <div id="frame">
            <div id="sidepanel">
                <div id="profile">
                    <div class="wrap">

                        @if(!auth()->user()->fotoPerfil)

                        <img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" />

                        @else

                        <img id="profile-img" src="images/users/{{ auth()->user()->fotoPerfil }}" class="online"
                            alt="" />

                        @endif

                        <p>{{ auth()->user()->name }}</p>

                    </div>
                </div>
                <div id="search">
                    <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                    <input type="text" placeholder="Buscar..." />
                </div>
                <div id="contacts">
                    <ul>

                        @foreach($usuarios as $usuario)

                        @php
                        $ultimoMensaje = DB::select("select * from users, mensaje where mensaje.de = ? or mensaje.para =
                        ? order by mensaje.fecha desc limit 1", [$usuario->id, $usuario->id])
                        @endphp

                        <li class="contact" id="{{ $usuario->id }}" onclick="cargarMensajes(this)">
                            <div class="wrap">
                                <span class="contact-status online"></span>

                                @if(!$usuario->fotoPerfil)
                                <img src="https://cdn.pixabay.com/photo/2012/04/26/19/43/profile-42914_1280.png"
                                    alt="" />
                                @else
                                <img src="images/users/{{ $usuario->fotoPerfil }}" alt="" />
                                @endif

                                <div class="meta">
                                    <p class="name">{{ $usuario->name }}</p>

                                    @if($usuario->id == $ultimoMensaje[0]->de)
                                    <p class="preview"><span>Tú:</span> {{ $ultimoMensaje[0]->texto }}</p>
                                    @else
                                    <p class="preview">{{ $ultimoMensaje[0]->texto }}</p>
                                    @endif


                                </div>
                            </div>
                        </li>

                        @endforeach
                        <!--
                        <li class="contact">
                            <div class="wrap">
                                <span class="contact-status online"></span>
                                <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
                                <div class="meta">
                                    <p class="name">Louis Litt</p>
                                    <p class="preview">You just got LITT up, Mike.</p>
                                </div>
                            </div>
                        </li>

                        <li class="contact active">
                            <div class="wrap">
                                <span class="contact-status busy"></span>
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <div class="meta">
                                    <p class="name">Harvey Specter</p>
                                    <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you
                                        call their bluff. Or, you do any one of a hundred and forty six other things.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">
                                <span class="contact-status"></span>
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>
                                    <p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
                                </div>
                            </div>
                        </li>
                    -->


                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="contact-profile">
                    <img src="" id="imagenUsuarioArriba" alt="" />
                    <p id="nombreUsuarioArriba"></p>
                    <div class="social-media">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="messages">
                    <ul id="listaMensajes">

                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>What are you talking about? You do what they say or they shoot you.</p>
                        </li>


                        <li class="replies">
                            @if(!auth()->user()->fotoPerfil)

                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />


                            @else

                            <img src="images/users/{{ auth()->user()->fotoPerfil }}" alt="" />

                            @endif

                            <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you
                                do any one of a hundred and forty six other things.</p>
                        </li>
                    </ul>
                </div>
                <div class="message-input">
                    <div class="wrap">

                        <input type="text" id="textoMensaje" placeholder="Escribe tu mensaje..." />
                        <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>


                    </div>
                </div>
            </div>
        </div>
        <script
            src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'>
        </script>
        <script>
            /**
 * 
 * CHAT
 */
 var idUsuarioPulsado;
function cargarMensajes(usuario) {
    //alert(usuario.id);

    idUsuarioPulsado = usuario.id;
    usuarioPorId(idUsuarioPulsado);

    $("#listaMensajes").html(""); //borro todos los anteriores mensajes
    $.ajax({
        url: 'mensajes' + "/" + usuario.id,
        type: 'get',
        success: function(response) {

            let mensajes = JSON.parse(response);

            for (var mensaje in mensajes) {

                if (mensajes[mensaje].para == {{ auth()->user()->id}}){
                    $("#listaMensajes").append('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + mensajes[mensaje].texto + '</p></li >');
                }

                if (mensajes[mensaje].de == {{ auth()->user()->id}}){
                    $("#listaMensajes").append('<li class="replies"><img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" /><p>' + mensajes[mensaje].texto + '</p></li>');
                }

                   
                //alert(mensajes[mensaje].texto);


            }

        },
        statusCode: {
            404: function() {
                alert('web not found');
            }
        },
        error: function(x, xs, xt) {

            //window.open(JSON.stringify(x));
            alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
        }
    });
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");


}

function usuarioPorId(id) {
    
    $.ajax({
        url: 'usuarios' + "/" + id,
        type: 'get',
        success: function(response) {

            let usuario = JSON.parse(response);a
            $("#nombreUsuarioArriba").text(usuario[0].name);
           
 
            if (usuario[0].fotoPerfil == null){
    $("#imagenUsuarioArriba").attr("src", "https://cdn.pixabay.com/photo/2012/04/26/19/43/profile-42914_1280.png");

}else{
    $("#imagenUsuarioArriba").attr("src", "images/users/" + usuario[0].fotoPerfil);

}
            //alert(usuario);

        },
        statusCode: {
            404: function() {
                alert('web not found');
            }
        },
        error: function(x, xs, xt) {
            alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
        }
    
});
}


/**
 * 
 * fin CHAT
 */


 
            $(".messages").animate({ scrollTop: $(document).height() }, "fast");
        
        $("#profile-img").click(function() {
            $("#status-options").toggleClass("active");
        });
        
        $(".expand-button").click(function() {
          $("#profile").toggleClass("expanded");
            $("#contacts").toggleClass("expanded");
        });
        
        $("#status-options ul li").click(function() {
            $("#profile-img").removeClass();
            $("#status-online").removeClass("active");
            $("#status-away").removeClass("active");
            $("#status-busy").removeClass("active");
            $("#status-offline").removeClass("active");
            $(this).addClass("active");
            
            if($("#status-online").hasClass("active")) {
                $("#profile-img").addClass("online");
            } else if ($("#status-away").hasClass("active")) {
                $("#profile-img").addClass("away");
            } else if ($("#status-busy").hasClass("active")) {
                $("#profile-img").addClass("busy");
            } else if ($("#status-offline").hasClass("active")) {
                $("#profile-img").addClass("offline");
            } else {
                $("#profile-img").removeClass();
            };
            
            $("#status-options").removeClass("active");
        });
        
        function newMessage() {
            message = $(".message-input input").val();

            if($.trim(message) == '') {
                return false;
            }
            $.ajax({
            url: 'mensaje',
            method: 'post',
            data: { de: {{ auth()->user()->id }}, para: idUsuarioPulsado, leido: 0, texto: $("#textoMensaje").val()},
            type: 'post',
            success: function(response) {

            },
            statusCode: {
                404: function() {
                    alert('web not found');
                }
            },
            error: function(x, xs, xt) {

                //window.open(JSON.stringify(x));
                alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
            }
        });
        
            $('<li class="replies"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
            $('.message-input input').val(null);
            $('.contact.active .preview').html('<span>You: </span>' + message);
            $(".messages").animate({ scrollTop: $(document).height() }, "fast");
        };
        
        $('.submit').click(function() {
          newMessage();
        });
        
        $(window).on('keydown', function(e) {
          if (e.which == 13) {
            newMessage();
            return false;
          }
        });
        //# sourceURL=pen.js
        </script>

    </div>
    <!-- CHAT -->










</div>

@stop