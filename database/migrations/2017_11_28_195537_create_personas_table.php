<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula', 20);
            $table->string('nombres', 100);
            $table->string('direccion_casa', 100);
            $table->string('direccion_trabajo', 100);
            $table->string('lugar_trabajo', 100);
            $table->string('oficio', 50);
            $table->string('telefono', 20);
            $table->string('telefono_trabajo', 20);
            $table->string('celular', 20);
            $table->string('url_cedula', 100)->nullable();
            $table->string('url_carta_laboral', 100)->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
