<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    //
    protected $table = 'asignaciones';
    protected $fillable = ['asignacion'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
    
}