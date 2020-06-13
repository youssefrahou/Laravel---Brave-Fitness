<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentoDiaSemanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimento_dia_semana', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('alimento_dieta_id');
            $table->unsignedBigInteger('dia_semana_id');


            $table->timestamps();

            $table->foreign('alimento_dieta_id')
                ->references('id')
                ->on('alimento_dieta')
                ->onDelete('cascade');
            $table->foreign('dia_semana_id')
                ->references('id')
                ->on('dia_semana')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alimento_dia_semana');
    }
}
