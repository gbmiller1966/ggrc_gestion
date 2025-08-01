<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contraparte extends Model
{
    //

    protected $fillable = ['nombre', 'apellido', 'email', 'celular', 'dependencia'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
    
}