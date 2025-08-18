<?php
//Con Eloquent
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model {

    protected $table = 'localidades';
    protected $fillable = ['localidad', 'longitud', 'latitud', 'provincia_id'];

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

}