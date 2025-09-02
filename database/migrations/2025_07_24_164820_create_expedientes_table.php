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
            $table->date('fecha_derivacion_area');
            $table->integer('tiempo_cfi_area')->default(0);
            $table->date('fecha_derivacion_tecnico');
            $table->integer('tiempo_area_tecnico')->default(0);
            $table->date('fecha_elevacion_tdrs');
            $table->integer('tiempo_tecnico_elevacion_tdrs')->default(0);
            $table->date('fecha_firma_direccion');
            $table->integer('tiempo_elevacion_firma')->default(0);
            $table->string('gde_firma_direccion');
            $table->date('fecha_derivacion_gestion');
            $table->integer('tiempo_direccion_gestion')->default(0);
            $table->date('fecha_inicio_contrato');
            $table->integer('tiempo_gestion_contrato')->default(0);
            $table->integer('tiempo_total_gestion')->default(0);
            $table->integer('plazo');
            $table->date('fecha_fin_contrato');
            $table->float('monto_solicitud',10,2);
            $table->float('monto_contrato',10,2);
            $table->float('monto_cargo_cfi',10,2);
            $table->float('monto_total_contrato',10,2);
            $table->date('fecha_aprobacion_if')->nullable();
            $table->string('gde_aprobacion_if')->nullable();
            $table->date('fecha_envio_biblioteca')->nullable();
            $table->string('gde_envio_biblioteca')->nullable();
            $table->date('fecha_envio_archivo')->nullable();
            $table->string('gde_envio_archivo')->nullable();
            $table->foreignIdFor(\App\Models\Region::class);
            $table->foreignIdFor(\App\Models\Provincia::class);
            $table->foreignIdFor(\App\Models\Localidad::class);
            $table->foreignIdFor(\App\Models\Usuario::class);
            $table->foreignIdFor(\App\Models\Contraparte::class);
            $table->foreignIdFor(\App\Models\Proveedor::class);
            $table->foreignIdFor(\App\Models\Asignacion::class);
            $table->foreignIdFor(\App\Models\Tema::class);
            $table->foreignIdFor(\App\Models\Tipo::class);
            $table->foreignIdFor(\App\Models\Estado::class);
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
