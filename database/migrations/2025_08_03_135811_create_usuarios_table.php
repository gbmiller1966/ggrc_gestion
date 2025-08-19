<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->bigInteger('celular');
            $table->foreignIdFor(\App\Models\Direccion::class);
            $table->foreignIdFor(\App\Models\Area::class);
            $table->foreignIdFor(\App\Models\Rol::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
