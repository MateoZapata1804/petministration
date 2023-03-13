<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    
    public function listCustomers(){
        $customers = Customer::all();
        return view('customers.index', ['customers' => $customers]);
    }

    public function createCustomer(Request $request){
        $cmr = new Customer();
        $cmr->documento_id = $request->docId;
        $cmr->nombre1 = $request->name1;
        $cmr->nombre2 = $request->name2;
        $cmr->apellido1 = $request->lastName1;
        $cmr->apellido2 = $request->lastName2;
        $cmr->celular = $request->phoneNumber;
        $cmr->email = $request->email;
        $cmr->save();
        return redirect('/clientes')
            ->with('message', 'Cliente registrado exitosamente!')
            ->with('messageStyle', 'alert alert-success');
    }

    public function updateCustomer(Request $newData){
        DB::table('clientes')->where('id','=',$newData->id)->update([
            'documento_id' => $newData->docId,
            'nombre1' => $newData->name1,
            'nombre2' => $newData->name2,
            'apellido1' => $newData->lastName1,
            'apellido2' => $newData->lastName1,
            'celular' => $newData->phoneNumber,
            'email' => $newData->email
        ]);
        return redirect('/clientes')
            ->with('message', 'Cliente actualizado exitosamente')
            ->with('messageStyle', 'alert alert-info');
    }

    public function deleteCustomer(Request $req){
        Customer::destroy($req->id);
        return redirect('/clientes')
            ->with('message', 'Cliente eliminado exitosamente')
            ->with('messageStyle', 'alert alert-danger');
    }

}
