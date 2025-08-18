<?php
//Con Eloquent
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

    protected $fillable = ['usuario', 'password', 'nombre', 'apellido', 'email', 'celular', 'direccion_id', 'area_id', 'rol_id'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }

    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function rol(){
        return $this->belongsTo(Rol::class);
    }

}