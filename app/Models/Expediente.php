<?php
//Con Eloquent
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model {

    protected $fillable = ['num_expte', 'titulo'];

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

}