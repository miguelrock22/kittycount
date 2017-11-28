<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 100);
            $table->string('telefonos', 50);
            $table->string('parentesco', 100);
            $table->unsignedInteger('personas_id')->nullable();
            $table->foreign('personas_id')->references('id')->on('personas');
            $table->unsignedInteger('codeudores_id')->nullable();
            $table->foreign('codeudores_id')->references('id')->on('codeudores');
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
        Schema::dropIfExists('referencias');
    }
}
