<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametrizaciones', function (Blueprint $table) {
            $table->id();
            $table->text('imagenP');
            $table->text('nameL');
            $table->text('imagenS');
            $table->enum('mostrarS',['si','no'])->nullable();
            $table->text('logoI');
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
        Schema::dropIfExists('parametrizacions');
    }
}
