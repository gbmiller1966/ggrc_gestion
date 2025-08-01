<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //

    protected $fillable = ['nombre'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }

    public function tecnicos(){
        return $this->hasMany(Tecnico::class);
    }

    public function direcciones(){
        return $this->belongsTo(Direccion::class);
    }
}