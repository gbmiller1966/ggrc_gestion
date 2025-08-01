<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //

    protected $fillable = ['razon', 'nombre', 'apellido', 'email', 'celular'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
    
    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }
}