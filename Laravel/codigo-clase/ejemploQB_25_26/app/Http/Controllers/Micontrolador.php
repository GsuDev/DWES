<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;

class Micontrolador extends Controller
{
    public function listar() {
        //************* Sin QueryBuilder ******************
        // a) Select sencilla con un valor.
        $personas = DB::select('select * from personas where DNI = ?', ["2B"]);
        //b) Usando un parámetro con nombre.
        // $personas = DB::select('select * from personas where dni = :dn', ['dn' => '4D']);
        //c) Consulta de varias tablas.
        // $quer = 'select * from personas, propiedades, coches'
        //    . ' where propiedades.dni = personas.dni '
        //    . 'AND propiedades.matricula = coches.matricula And personas.dni = ?';
        // // dd($quer);
        // $personas = DB::select($quer,['1A']);
        /*
         * Otros ejemplos sin QB:
         */
        // try {
        //     $p = new Persona('100A', 'Carlos', '1234', 36);
        //     DB::insert('insert into personas (dni, nombre, tfno, edad) values (?, ?, ?, ?)', [$p->dni, $p->nombre, $p->tfno, $p->edad]);

        //     //DB::insert('insert into personas (dni, nombre, tfno, edad) values (?, ?, ?, ?)', ['007', 'Marco', '1234', 36]);
        //     /* $afectadas = \DB::update('update personas set tfno = '100' where dni = ?', ['3C'])
        //      * $borradas = \DB::delete('delete from personas');
        //      */
        //     return response()->json(['mensaje'=>'Registro insertado correctamente'],200);
        // }
        // catch (\Illuminate\Database\QueryException $e) {
        //     //return redirect()->back()->withErrors(($e->getCode() === '23000') ? 'E-mail ya existe.' : 'teste');
        //     return response()->json(['mensaje'=>'Clave duplicada'],202);
        // }





        //************* Con Query Builder ****************
        //Dirección de interés para Query Builder: https://laravel.com/docs/12.x/queries
        //a) El equivalente de una select *.
        // $personas = DB::table('personas')->orderBy('dni','asc')->get();
        //b) Select con condiciones
        // $personas = DB::table('personas')
        // ->select('dni', 'nombre', 'tfno', 'edad')
        // ->where('dNI', '=', '5E')
        // ->orderBy('edad', 'desc')
        // ->get();
        //c) Selección con opciones AND y OR
        // $personas = DB::table('personas')
        //  ->select('dni','nombre','tfno','edad')
        //  ->whereBetween('edad', [35, 40])
        //  ->orwhere('nombre','Jaime')
        //  ->orderBy('edad','desc')
        //  ->get();
        //d) Selección haciendo join de varias tablas.
        // $personas = DB::table('personas')
        //         ->join('propiedades', 'propiedades.DNI', '=', 'personas.DNI')
        //         ->join('coches', 'coches.matricula', '=', 'propiedades.matricula')
        //         ->select('personas.dni', 'nombre', 'edad', 'marca', 'modelo')
        //         ->where('nombre','Noelia')
        //         ->get();

        ///Otras opciones con QB:
        // try {
        //     // $registro = DB::table('personas')->insert(
        //     //     ['dni' => '2034T', 'nombre' => 'Yoda', 'tfno' => '435', 'edad' => 10]
        //     //     );
        //     $registro = DB::table('personas_id_auto')->insert(
        //         ['id' => NULL, 'nombre' => 'Yoda', 'tfno' => '435', 'edad' => 180]
        //         );
        //     return response()->json(['mensaje'=>'Registro insertado correctamente', 'registro' => $registro],200);
        // }
        // catch(\Illuminate\Database\QueryException $e){
        //     return response()->json(['mensaje'=>'Clave duplicada'],202);
        // }

        // $personas = DB::table('personas')
        //  ->where('dni', '1A')
        //  ->update(['tfno' => '2345']);
        // $personas = DB::table('personas')->where('dni', '=', '007')->delete();
        // $personas = DB::table('personas')->truncate();



        $datos = [
            'pers' => $personas
        ];

        return response()->json($datos,200);
    }
}
