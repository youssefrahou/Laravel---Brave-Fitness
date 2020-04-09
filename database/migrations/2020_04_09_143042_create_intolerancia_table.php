<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntoleranciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intolerancia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_alimento');


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
        Schema::dropIfExists('intolerancia');
    }
}
