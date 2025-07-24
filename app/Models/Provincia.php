<?php
//Con Eloquent
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model {

    protected $fillable = ['nombre'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
}