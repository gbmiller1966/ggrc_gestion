<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    //

    protected $fillable = ['provincia', 'region_id'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
