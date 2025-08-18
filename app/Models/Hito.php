<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hito extends Model
{
    protected $fillable = ['hito', 'expediente_id'];

    public function expediente(){
        return $this->belongsTo(Expediente::class);
    }
    
}