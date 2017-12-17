<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiales', function (Blueprint $table) {
            $table->increments('id');
            $table->double('total_cobrado', 10, 2);
            $table->boolean('abono')->default(false);
            $table->double('deuda_abono', 10, 2)->nulleable();
            $table->date('dia_cobro_abono')->nullable();
            $table->text('observacion')->nullable();
            $table->unsignedInteger('personas_id')->nullable();
            $table->foreign('personas_id')->references('id')->on('personas');
            $table->unsignedInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedInteger('prestamos_id')->nullable();
            $table->foreign('prestamos_id')->references('id')->on('prestamos');
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
        Schema::dropIfExists('historiales');
    }
}
