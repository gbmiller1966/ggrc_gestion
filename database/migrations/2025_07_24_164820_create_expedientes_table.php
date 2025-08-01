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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('objeto');
            $table->string('num_expte');
            $table->date('fecha_ingreso_cfi')->nullable();
            $table->date('fecha_ingreso_area')->nullable();
            $table->date('fecha_derivacion_tecnico')->nullable();
            $table->date('fecha_tdrs_elevacion')->nullable();
            $table->date('fecha_tdrs_firma_direccion')->nullable();
            $table->string('gde_tdrs_firma_direccion')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->integer('plazo')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->float('monto_solicitud',10,2)->nullable();
            $table->float('monto_contrato',10,2)->nullable();
            $table->float('monto_cargo_cfi',10,2)->nullable();
            $table->float('monto_total_contrato',10,2)->nullable();
            $table->date('fecha_aprobacion_if')->nullable();
            $table->string('gde_aprobacion_if')->nullable();
            $table->date('fecha_envio_biblioteca')->nullable();
            $table->string('gde_envio_biblioteca')->nullable();
            $table->date('fecha_envio_archivo')->nullable();
            $table->string('gde_envio_archivo')->nullable();
            $table->foreignIdFor(\App\Models\Region::class)->nullable();
            $table->foreignIdFor(\App\Models\Provincia::class);
            $table->foreignIdFor(\App\Models\Localidad::class);
/*             $table->foreignIdFor(\App\Models\Tecnico::class);
            $table->foreignIdFor(\App\Models\Contraparte::class);
            $table->foreignIdFor(\App\Models\Proveedor::class);
            $table->foreignIdFor(\App\Models\Asignacion::class);
            $table->foreignIdFor(\App\Models\Tipo::class);
            $table->foreignIdFor(\App\Models\Informes::class);
            $table->foreignIdFor(\App\Models\Acciones::class); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
