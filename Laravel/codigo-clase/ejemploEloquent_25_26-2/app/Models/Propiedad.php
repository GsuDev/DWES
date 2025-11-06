<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    //
     //Aquí descomentamos todo porque la tabla tiene las características por defecto de Eloquent.
    protected $table = 'propiedades'; //Por defecto tomaría la tabla 'propiedads' que no existe.
    //protected $primaryKey = ['dni', 'matricula'];
    //protected $keyType = ['string','string'];
    //protected $primaryKey = 'id';  //Por defecto el campo clave es 'id', entero y autonumérico. (Ya lo cumple).
    //public $incrementing = true; //Para indicarle que la clave no es autoincremental. (Ya lo cumple).
    //protected $keyType = 'int';   //Indicamos que la clave no es entera. (Ya lo cumple).
    public $timestamps = false;   //Con esto Eloquent no maneja automáticamente created_at ni updated_at.

    protected $fillable = ['dni','matricula'];
    //protected $hidden = ['dni','matricula'];


    //Opción A) Relación muchos a uno (varias propiedades pueden pertenecer a una persona o a un coche).
    // function infoCoche(){
    //     return $this->hasMany(Coche::class,'matricula','matricula');
    // }


    // function infoPersona(){
    //     return $this->hasMany(Persona::class,'dni','dni');
    // }

    //Opción B) Relación muchos a uno (varias propiedades pueden pertenecer a una persona o a un coche).
    // Cada fila pivote pertenece a un coche
    public function coche()
    {
        return $this->belongsTo(Coche::class, 'matricula', 'matricula');
    }

    // Cada fila pivote pertenece a una persona
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'dni', 'dni');
    }

}
