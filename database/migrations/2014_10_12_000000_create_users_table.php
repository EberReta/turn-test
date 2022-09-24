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
            $table->string('lastName')->nullable();
            $table->string('email')->unique();
            $table->string('company');
            $table->string('password')->nullable();
            $table->string('phone');
            $table->double('discount')->nullable();
            $table->string('businessName')->nullable();
            $table->string('cfdi')->nullable();
            $table->string('rfc')->nullable();
            $table->enum('type',['Físico','Moral'])->nullable();
            $table->enum('location',['Bodega GDL','Bodega CDMX','Tienda'])->nullable();
            $table->enum('role',['Administrador','Vendedor','Mayorista','Coordinador de Almacen','Encargado de Facturacion'])->nullable();
            $table->string('status');

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
