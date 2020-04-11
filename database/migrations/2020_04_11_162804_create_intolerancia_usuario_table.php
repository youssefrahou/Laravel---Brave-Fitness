<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntoleranciaUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intolerancia_usuario', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('intolerancia_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();

            $table->foreign('intolerancia_id')
                ->references('id')->on('intolerancia')
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreign('users_id')
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
        Schema::dropIfExists('intolerancia_usuario');
    }
}
