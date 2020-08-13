<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roles_id')->references('id')->on('roles')->onDelete('cascade');//relacion con la tabla roles y si se elima se borra en cascada
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');//relacion con la tabla usuarios y si se elima se borra en cascada
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
        Schema::dropIfExists('roles_user');
    }
}
