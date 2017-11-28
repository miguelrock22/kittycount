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
            $table->string('direccion_trabajo', 100);
            $table->string('oficio', 50);
            $table->string('telefono', 20);
            $table->string('celular', 20);
            $table->unsignedInteger('personas_id');
            $table->foreign('personas_id')->references('id')->on('personas');
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
