<?php
//Con Eloquent
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

    protected $fillable = ['nombre', 'apellido', 'email', 'celular'];

    public function expediente(){
        return $this->belongsTo(Expediente::class);
    }

}