<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeudoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeudores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula', 20);
            $table->string('nombres', 100);
            $table->string('direccion_casa', 100);
            $table->string('direccion_trabajo', 100)->nullable();
            $table->string('oficio', 50)->nullable();
            $table->string('telefono', 20);
            $table->string('celular', 20)->nullable();
            $table->string('url_cedula', 100)->nullable();
            $table->string('url_carta_laboral', 100)->nullable();
            $table->unsignedInteger('personas_id');
            $table->foreign('personas_id')->references('id')->on('personas');
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
        Schema::dropIfExists('codeudores');
    }
}
