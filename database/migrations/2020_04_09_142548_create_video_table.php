<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->string('descripcion');
            $table->string('ruta');
            
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
        Schema::dropIfExists('video');
    }
}
