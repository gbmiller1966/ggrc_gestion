<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = 'proveedores';
    protected $fillable = ['razon', 'nombre', 'apellido', 'email', 'celular', 'provincia_id'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
    
    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }
}