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
            $table->decimal('altura')->nullable();
            $table->string('foto_delante')->nullable();
            $table->string('foto_lado')->nullable();
            $table->string('foto_atras')->nullable();

            $table->bigInteger('users_id')->unsigned();
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
        Schema::dropIfExists('medicion');
    }
}
