<?php
//Con Eloquent
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model {

    protected $fillable = ['titulo', 'objeto', 'num_expte', 'region_id', 'provincia_id', 'localidad_id'];

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
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
