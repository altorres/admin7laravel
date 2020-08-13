<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roles_id')->references('id')->on('roles')->onDelete('cascade');//relacion con la tabla roles y si se elima se borra en cascada
            $table->foreignId('permiso_id')->references('id')->on('permisos')->onDelete('cascade');//relacion con la tabla usuarios y si se elima se borra en cascada
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
        Schema::dropIfExists('permiso_roles');
    }
}
