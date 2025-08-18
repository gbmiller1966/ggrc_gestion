<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //

    protected $fillable = ['area', 'direccion_id'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }

    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }
}