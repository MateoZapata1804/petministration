<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function listPets(){
        $pets = DB::select('
            SELECT 
                m.id id_mascota,
                m.nombre nombre,
                tm.nombre_tm,
                CONCAT(cl.nombre1," ",cl.apellido1) nombre_cliente,
                m.created_at
            FROM mascotas m
            INNER JOIN tipos_mascota tm
            ON m.tipo_mascota = tm.id
            INNER JOIN clientes cl
            ON m.cliente = cl.id;');
        return view("pets.index", ['pets' => $pets]);
    }

    public function createPet(Request $request){
        $pet = new Pet();
        $pet->nombre = $request->petName;
        $pet->cliente = DB::table('clientes')->where('documento_id','=',$request->owner)->value('id');
        $pet->tipo_mascota = $request->petType;
        $pet->save();
        return redirect('/mascotas')
            ->with('message', '¡Mascota registrada exitosamente!')
            ->with('messageStyle', 'alert alert-success');
    }

    public function updatePet(Request $newData){
        DB::table('mascotas')->where('id','=',$newData->id)->update([
            'nombre' => $newData->petName,
            'tipo_mascota' => $newData->petType
        ]);
        return redirect('/mascotas')
            ->with('message', 'Mascota actualizada exitosamente')
            ->with('messageStyle', 'alert alert-info');
    }

    public function deletePet(Request $req){
        Pet::destroy($req->id);
        return redirect('/mascotas')
            ->with('message', 'Mascota eliminada exitosamente')
            ->with('messageStyle', 'alert alert-danger');
    }
}
