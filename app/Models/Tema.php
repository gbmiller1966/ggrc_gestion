<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    //
    protected $fillable = ['tema'];


    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
}