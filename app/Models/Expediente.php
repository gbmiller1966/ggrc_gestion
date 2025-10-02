<?php
//Con Eloquent
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model {


    // permite no controlar los campos a cargar masivamente: protected $guarded = [];

    protected $fillable = [
        'titulo',
        'objeto',
        'num_expte',
        'fecha_ingreso_cfi',
        'fecha_derivacion_area',
        'tiempo_cfi_area',
        'fecha_derivacion_tecnico',
        'tiempo_area_tecnico',
        'fecha_elevacion_tdrs',
        'tiempo_tecnico_elevacion_tdrs',
//incluimos al jefe de área
        'fecha_firma_area',
        'tiempo_tecnico_area',

//modificamos el tiempo de dirección: tiempo_area_direccion
        'fecha_firma_direccion',
        'tiempo_area_direccion',
        'gde_firma_direccion',
        'fecha_derivacion_compras',
        'tiempo_direccion_compras',
        'tiempo_compras_contrato',
        'fecha_inicio_contrato',
        'tiempo_total_gestion',
        'plazo',
        'fecha_fin_contrato',
        'monto_solicitud',
        'monto_contrato',
        'monto_cargo_cfi',
        'monto_total_contrato',
        'fecha_aprobacion_if',
        'gde_aprobacion_if',
        'fecha_envio_biblioteca',
        'gde_envio_biblioteca',
        'fecha_envio_archivo',
        'gde_envio_archivo',
        'doc_proveedor',
        'doc_dotacion',
        'doc_tdrs',
        'observaciones',
        'region_id',
        'provincia_id',
        'localidad_id',
        'usuario_id',
        'direccion_id',
        'area_id',
        'contraparte_id',
        'proveedor_id',
        'asignacion_id',
        'tema_id',
        'tipo_id',
        'estado_id'
    ];

    protected $casts = [
        'fecha_ingreso_cfi' => 'datetime',
        'fecha_derivacion_area' => 'datetime',
        'fecha_derivacion_tecnico' => 'datetime',
        'fecha_elevacion_tdrs' => 'datetime',
        'fecha_firma_area' => 'datetime',
        'fecha_firma_direccion' => 'datetime',
        'fecha_derivacion_compras' => 'datetime',
        'fecha_inicio_contrato' => 'datetime',
        'fecha_fin_contrato' => 'datetime',
        'fecha_aprobacion_if' => 'datetime',
        'fecha_envio_biblioteca' => 'datetime',
        'fecha_envio_archivo' => 'datetime'
    ];

    public function region(){
        return $this->belongsTo(Region::class);
    }    

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function contraparte(){
        return $this->belongsTo(Contraparte::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function asignacion(){
        return $this->belongsTo(Asignacion::class);
    }

    public function tema(){
        return $this->belongsTo(Tema::class);
    }

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function informes(){
        return $this->belongsToMany(Informe::class, 'expediente_informes')->withTimestamps();
    }

    public function colaboradores(){
        return $this->belongsToMany(Colaborador::class, 'expediente_colaboradores')->withTimestamps();
    }

    public function hitos(){
        return $this->hasMany(Hito::class);
    }

}




/* ------------------------------------------------------------------------ 
namespace App\Models;
use Illuminate\Support\Arr;

class Expediente {
    public static function all() : array
    {
        return  
        [
            [
                'id' => 1,
                'numero' => 'EX-2022-00123068- -CFI-GES#DCS',
                'titulo' => 'Sistema Informático Integral Hipódromo de La Plata',
                'provincia' => 'Buenos Aires'
            ],
            [
                'id' => 2,
                'numero' => 'EX-2024-00013906- -CFI-GES#DC',
                'titulo' => 'Sistema de Gestión Electrónica para el Registro de Consultores y Fase II de Licitadores',
                'provincia' => 'La Pampa'
            ],
            [
                'id' => 3,
                'numero' => 'EX-2024-00024018- -CFI-GES#DC',
                'titulo' => 'Implementación del Sistema Único de Novedades de Agentes de la Educación',
                'provincia' => 'Tierra del Fuego'
            ]
        ];
    }

    public static function find(int $id): array
    {
        // Reemplazamos Expediente por static: return Arr::first(Expediente::all(), fn($expediente) => $expediente['id'] == $id);
        $expediente = Arr::first(static::all(), fn($expediente) => $expediente['id'] == $id);

        if(! $expediente){
            abort(404);
        }

        return $expediente;
    }
} */

?>
