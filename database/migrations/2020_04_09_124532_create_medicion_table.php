<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('peso');
            $table->decimal('altura');
            $table->string('foto_delante');
            $table->string('foto_lado');
            $table->string('foto_atras');
            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                ->references('id')->on('users')
                ->onDelete("cascade");



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
        Schema::dropIfExists('medicion');
    }
}
