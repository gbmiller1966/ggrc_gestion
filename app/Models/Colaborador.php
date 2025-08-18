<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    //

    public function expedientes(){
        return $this->belongsToMany(Expediente::class, 'expediente_colaboradores')->withTimestamps();
    }
    
}