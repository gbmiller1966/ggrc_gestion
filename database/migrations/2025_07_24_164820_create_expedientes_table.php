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
            $table->date('fecha_ingreso_cfi');
            $table->date('fecha_ingreso_area');
            $table->date('fecha_derivacion_tecnico');
            $table->date('fecha_tdrs_elevacion');
            $table->date('fecha_tdrs_firma_direccion');
            $table->string('gde_tdrs_firma_direccion');
            $table->date('fecha_inicio');
            $table->integer('plazo');
            $table->date('fecha_fin');
            $table->float('monto_solicitud',10,2);
            $table->float('monto_contrato',10,2);
            $table->float('monto_contrato',10,2);
            $table->float('monto_cargo_cfi',10,2);
            $table->float('monto_total_contrato',10,2);
            $table->date('fecha_aprobacion_if');
            $table->string('gde_aprobacion_if');
            $table->date('fecha_envio_biblioteca');
            $table->string('gde_envio_biblioteca');
            $table->date('fecha_envio_archivo');
            $table->string('gde_envio_archivo');
            $table->foreignIdFor(\App\Models\Region::class);
            $table->foreignIdFor(\App\Models\Provincia::class);
            $table->foreignIdFor(\App\Models\Localidad::class);
            $table->foreignIdFor(\App\Models\Tecnico::class);
            $table->foreignIdFor(\App\Models\Contraparte::class);
            $table->foreignIdFor(\App\Models\Proveedor::class);
            $table->foreignIdFor(\App\Models\Asignacion::class);
            $table->foreignIdFor(\App\Models\Tipo::class);
            $table->foreignIdFor(\App\Models\Informes::class);
            $table->foreignIdFor(\App\Models\Acciones::class);
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
