<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    //

    protected $fillable = ['informe'];

    public function expedientes(){
        return $this->belongsToMany(Expediente::class, 'expediente_informes')->withTimestamps();
    }
    
}