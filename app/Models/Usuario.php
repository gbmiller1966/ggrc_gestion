<?php
//Con Eloquent
namespace App\Models;

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable {

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