<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaSemanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_semana', function (Blueprint $table) {
            $table->id();
            $table->enum('dia', ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']);
            

            $table->bigInteger('id_dieta')->unsigned();
            $table->foreign('id_dieta')
                ->references('id')->on('dieta')
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
        Schema::dropIfExists('dia_semana');
    }
}
