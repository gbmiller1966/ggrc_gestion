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
            $table->string('titulo', 300);
            $table->string('objeto', 1000)->nullable();
            $table->string('num_expte');
            $table->date('fecha_ingreso_cfi')->nullable();
            $table->date('fecha_derivacion_area')->nullable();
            $table->integer('tiempo_cfi_area')->nullable()->default(0);
            $table->date('fecha_derivacion_tecnico')->nullable();
            $table->integer('tiempo_area_tecnico')->nullable()->default(0);
            $table->date('fecha_elevacion_tdrs')->nullable();
            $table->integer('tiempo_tecnico_elevacion_tdrs')->nullable()->default(0);
            $table->date('fecha_firma_area')->nullable();
            $table->integer('tiempo_tecnico_area')->nullable()->default(0);
            $table->date('fecha_firma_direccion')->nullable();
            $table->integer('tiempo_area_direccion')->nullable()->default(0);
            $table->string('gde_firma_direccion')->nullable();
            $table->date('fecha_derivacion_compras')->nullable();
            $table->integer('tiempo_direccion_compras')->nullable()->default(0);
            $table->date('fecha_inicio_contrato')->nullable();
            $table->integer('tiempo_compras_contrato')->nullable()->default(0);
            $table->integer('tiempo_total_gestion')->nullable()->default(0);
            $table->integer('plazo')->nullable();
            $table->date('fecha_fin_contrato')->nullable();
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
            $table->string('doc_proveedor')->nullable();
            $table->string('doc_dotacion')->nullable();
            $table->string('doc_tdrs')->nullable();
            $table->string('observaciones', 5000)->nullable();
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
