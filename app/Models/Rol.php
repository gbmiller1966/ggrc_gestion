<?php
//Con Eloquent
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

    protected $table = 'roles';
    protected $fillable = ['rol'];

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }

}