<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('articulo_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();

            $table->foreign('articulo_id')
                ->references('id')->on('articulo')
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreign('tag_id')
                ->references('id')->on('tag')
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
        Schema::dropIfExists('articulo_tags');
    }
}
