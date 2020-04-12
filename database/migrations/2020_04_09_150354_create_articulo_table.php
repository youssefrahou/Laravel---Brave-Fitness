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
            $table->text('subtitulo');
            $table->longText('introduccion');
            $table->string('foto1');
            $table->string('pie_imagen1');

            $table->longText('text2')->nullable();
            $table->string('foto2')->nullable();
            $table->string('pie_imagen2')->nullable();

            $table->longText('text3')->nullable();
            $table->string('foto3')->nullable();
            $table->string('pie_imagen3')->nullable();

            $table->longText('text4')->nullable();
            $table->string('foto4')->nullable();
            $table->string('pie_imagen4')->nullable();

            $table->longText('text5')->nullable();
            $table->string('foto5')->nullable();
            $table->string('pie_imagen5')->nullable();


            $table->longText('text6')->nullable();
            $table->string('foto6')->nullable();
            $table->string('pie_imagen6')->nullable();


            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')
                ->references('id')->on('users')
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')
                ->references('id')->on('categoria')
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
