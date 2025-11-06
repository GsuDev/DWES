<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    public $timestamps = false;   //Con esto Eloquent no maneja automáticamente created_at ni updated_at.


    function perteneceA(){
        return $this->belongsTo(Persona::class,'dni','dni');
    }
}
