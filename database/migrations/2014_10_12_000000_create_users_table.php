<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 50)->unique();
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->date('fechaNacimiento');
            $table->string('fotoPerfil')->nullable();
            $table->string('fotoDieta')->nullable();
            $table->integer('peso');
            $table->integer('altura'); //en cms
            $table->enum('sexo', ['hombre', 'mujer', 'otro']);
            $table->enum('objetivo', ['subir_peso', 'adelgazar', 'musculatura']);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
