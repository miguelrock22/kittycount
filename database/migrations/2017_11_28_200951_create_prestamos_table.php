<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('prestamo', 12, 2);
            $table->string('porcentage', 20);
            $table->double('abono_capital', 12, 2);
            $table->date('dia_cobro');
            $table->date('dia_cobro_2')->nullable();
            $table->date('dia_solicitud');
            $table->boolean('estado');
            $table->string('cuotas', 20);
            $table->double('valor_cuota', 8, 2);
            $table->double('valor_cuota_2', 8, 2)->nullable();
            $table->text('observacion');
            $table->unsignedInteger('personas_id')->nullable();
            $table->foreign('personas_id')->references('id')->on('personas');
            $table->unsignedInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('prestamos');
    }
}
