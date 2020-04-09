<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_comentario', function (Blueprint $table) {
            $table->id();
            $table->string('texto');
            $table->dateTime('fecha_hora');
            $table->boolean('leido'); //para admin marcarlo como leído


            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                ->references('id')->on('users')
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->bigInteger('id_comentario')->unsigned();
            $table->foreign('id_comentario')
                ->references('id')->on('comentario')
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
        Schema::dropIfExists('respuesta_comentario');
    }
}
