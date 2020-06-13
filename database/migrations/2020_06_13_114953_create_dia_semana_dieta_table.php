<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaSemanaDietaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_semana_dieta', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('dia_semana_id');
            $table->unsignedBigInteger('dieta_id');


            $table->timestamps();

            $table->foreign('dia_semana_id')
                ->references('id')
                ->on('dia_semana')
                ->onDelete('cascade');
            $table->foreign('dieta_id')
                ->references('id')
                ->on('dieta')
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
        Schema::dropIfExists('dia_semana_dieta');
    }
}
