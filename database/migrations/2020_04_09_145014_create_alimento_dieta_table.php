<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentoDietaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimento_dieta', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['desayuno', 'merienda_manana', 'comida', 'cena', 'merienda_tarde']);
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            //$table->string(''); saber % de nutrientes, tipo un 20% de proteinas y esas cosas



            $table->bigInteger('dia_semana_id')->unsigned();
            $table->foreign('dia_semana_id')
                ->references('id')->on('dia_semana')
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
        Schema::dropIfExists('alimento_dieta');
    }
}
