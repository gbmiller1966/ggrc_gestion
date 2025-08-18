<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //
    protected $table = 'direcciones';
    protected $fillable = ['direccion'];


    public function areas(){
        return $this->hasMany(Area::class);
    }
}