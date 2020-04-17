@extends('plantillas.inicio')

@section('titulo')
Planes - Brave Fitness
@stop

@section('head')

<style>
    .db-bk-color-one {
        background-color: #f55039;
    }

    .db-bk-color-two {
        background-color: #46A6F7;
    }

    .db-bk-color-three {
        background-color: #47887E;
    }

    .db-bk-color-six {
        background-color: #F59B24;
    }

    /*============================================================
PRICING STYLES
==========================================================*/
    .db-padding-btm {
        padding-bottom: 50px;
    }

    .db-button-color-square {
        color: #fff;
        background-color: rgba(0, 0, 0, 0.50);
        border: none;
        border-radius: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
    }

    .db-button-color-square:hover {
        color: #fff;
        background-color: rgba(0, 0, 0, 0.50);
        border: none;
    }


    .db-pricing-eleven {
        margin-bottom: 30px;
        margin-top: 50px;
        text-align: center;
        box-shadow: 0 0 5px rgba(0, 0, 0, .5);
        color: #fff;
        line-height: 30px;
    }

    .db-pricing-eleven ul {
        list-style: none;
        margin: 0;
        text-align: center;
        padding-left: 0px;
    }

    .db-pricing-eleven ul li {
        padding-top: 20px;
        padding-bottom: 20px;
        cursor: pointer;
    }

    .db-pricing-eleven ul li i {
        margin-right: 5px;
    }


    .db-pricing-eleven .price {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 40px 20px 20px 20px;
        font-size: 60px;
        font-weight: 900;
        color: #FFFFFF;
    }

    .db-pricing-eleven .price small {
        color: #B8B8B8;
        display: block;
        font-size: 12px;
        margin-top: 22px;
    }

    .db-pricing-eleven .type {
        background-color: #52E89E;
        padding: 50px 20px;
        font-weight: 900;
        text-transform: uppercase;
        font-size: 30px;
    }

    .db-pricing-eleven .pricing-footer {
        padding: 20px;
    }

    .db-attached>.col-lg-4,
    .db-attached>.col-lg-3,
    .db-attached>.col-md-4,
    .db-attached>.col-md-3,
    .db-attached>.col-sm-4,
    .db-attached>.col-sm-3 {
        padding-left: 0;
        padding-right: 0;
    }

    .db-pricing-eleven.popular {
        margin-top: 10px;
    }

    .db-pricing-eleven.popular .price {
        padding-top: 80px;
    }
</style>

@stop

@section('body')

<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <br /><br />
            <h2>Plane Brave Fitness</h2>
            <br /><br />
        </div>
    </div>
<!--
    <div class="row db-padding-btm db-attached">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="db-wrapper">
                <div class="db-pricing-eleven db-bk-color-one">
                    <div class="price">
                        <sup>$</sup>99
                        <small>per quarter</small>
                    </div>
                    <div class="type">
                        BASIC PLAN
                    </div>
                    <ul>

                        <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                        <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                        <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                    </ul>
                    <div class="pricing-footer">

                        <a href="#" class="btn db-button-color-square btn-lg">BOOK ORDER</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="db-wrapper">
                <div class="db-pricing-eleven db-bk-color-two popular">
                    <div class="price">
                        <sup>$</sup>199
                        <small>per quarter</small>
                    </div>
                    <div class="type">
                        MEDIUM PLAN
                    </div>
                    <ul>

                        <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                        <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                        <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                    </ul>
                    <div class="pricing-footer">

                        <a href="#" class="btn db-button-color-square btn-lg">BOOK ORDER</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="db-wrapper">
                <div class="db-pricing-eleven db-bk-color-three">
                    <div class="price">
                        <sup>$</sup>249
                        <small>per quarter</small>
                    </div>
                    <div class="type">
                        ADVANCE PLAN
                    </div>
                    <ul>

                        <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                        <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                        <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                    </ul>
                    <div class="pricing-footer">

                        <a href="#" class="btn db-button-color-square btn-lg">BOOK ORDER</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="db-wrapper">
                <div class="db-pricing-eleven db-bk-color-six">
                    <div class="price">
                        <sup>$</sup>599
                        <small>per quarter</small>
                    </div>
                    <div class="type">
                        EXTENDED PLAN
                    </div>
                    <ul>

                        <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                        <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                        <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                    </ul>
                    <div class="pricing-footer">

                        <a href="#" class="btn db-button-color-square btn-lg">BOOK ORDER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

-->
    <div class="row db-padding-btm db-attached">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="db-wrapper">
                <div class="db-pricing-eleven db-bk-color-one">
                    <div class="price">
                        0€
                        <small>AL MES</small>
                    </div>
                    <div class="type">
                        BÁSICO
                    </div>
                    <ul>

                        <li><i class="glyphicon glyphicon-print"></i>Tienes los artículos gratuitos y da gracias </li>
                    </ul>
                    <div class="pricing-footer">

                        <a href="#" class="btn db-button-color-square btn-lg">ESCOGER</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="db-wrapper">
                <div class="db-pricing-eleven db-bk-color-two popular">
                    <div class="price">
                        20€
                        <small>AL MES</small>
                    </div>
                    <div class="type">
                        PLAN PRO
                    </div>
                    <ul>

                        <li><i class="glyphicon glyphicon-print"></i>Dieta ajustada a tus necesidades y horarios </li>
                        <li><i class="glyphicon glyphicon-time"></i>Dieta enfocada a tu objetivo; estético, rendimiento, pérdida de grasa, ganancia de músculo </li>
                        <li><i class="glyphicon glyphicon-trash"></i>Revisión del peso cada semana, posibles cambios en la dieta, ajustes de calorías</li>
                        <li><i class="glyphicon glyphicon-trash"></i>Asesoramiento con suplementación</li>
                    </ul>
                    <div class="pricing-footer">

                        <a href="#" class="btn db-button-color-square btn-lg">ESCOGER</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="db-wrapper">
                <div class="db-pricing-eleven db-bk-color-three">
                    <div class="price">
                        50€
                        <small>AL MES</small>
                    </div>
                    <div class="type">
                        PLAN PREMIUM
                    </div>
                    <ul>

                        <li><i class="glyphicon glyphicon-print"></i>Dieta ajustada a tus necesidades y horarios </li>
                        <li><i class="glyphicon glyphicon-time"></i>Entrenamiento enfocado a tus objetivos; hipertrofia, pérdida de grasa, rendimiento, fuerza...</li>
                        <li><i class="glyphicon glyphicon-trash"></i>Revisión cada semana de peso, progresión en el entrenamiento y seguimiento del proceso</li>
                        <li><i class="glyphicon glyphicon-trash"></i>Asesoramiento con la suplementación</li>
                    </ul>
                    <div class="pricing-footer">

                        <a href="#" class="btn db-button-color-square btn-lg">ESCOGER</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>

@stop