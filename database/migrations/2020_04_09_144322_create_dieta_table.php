<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dieta', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('fecha');
            $table->string('ubicacion_pdf');


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
        Schema::dropIfExists('dieta');
    }
}
