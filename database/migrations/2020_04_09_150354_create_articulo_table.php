<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo');
            $table->longText('contenido');
            $table->string('foto1');
            $table->string('pie_imagen1');
            $table->string('foto2');
            $table->string('pie_imagen2');
            $table->string('foto3');
            $table->string('pie_imagen3');
            $table->string('foto4');
            $table->string('pie_imagen4');

            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                ->references('id')->on('users')
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo');
    }
}
