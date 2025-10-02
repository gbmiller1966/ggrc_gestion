<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('razon')->nullable();
            $table->string('cuit')->unique()->nullable();
            $table->integer('num_proveedor')->unique()->nullable()->default(0);
            $table->string('email')->nullable();
            $table->bigInteger('tel')->nullable()->default(0);
            $table->string('contacto')->nullable();
            $table->string('contacto_email')->nullable();
            $table->bigInteger('contacto_celular')->nullable()->default(0);
            $table->string('documentacion')->nullable();
            $table->foreignIdFor(\App\Models\Provincia::class)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
