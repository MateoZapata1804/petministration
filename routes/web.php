<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PetController;
use App\Models\Customer;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// #2E2300 #6E6702 #C05805 #DB9501

// Las vistas index de las entidades ya son devueltas por los metodos get de los controladores
Route::view('', 'index');
Route::view('/inicio', 'index');


Route::view('/clientes/registrar', 'customers.create');
Route::get('/clientes/actualizar/{id}', function($id){
    $customerData = Customer::all()->where('id','=',$id)->first();
    return view("customers.update", ['oldData' => $customerData]);
})->name('customer.form.update');


try {
    Route::view('/mascotas/registrar', 'pets.create', [
        'petTypes' => Pet::getPetTypes(),
        'registeredCmrs' => Pet::getRegisteredCustomers()
    ]);
} catch (PDOException $e) { } // Para evitar que reviente al ejecutar las migraciones

Route::get('/mascotas/actualizar/{id}', function($id){
    $petData = Pet::all()->where('id','=',$id)->first();
    if ($petData == null) return redirect('inicio');

    return view("pets.update", [
        'actualData' => $petData,
        'petTypes' => Pet::getPetTypes()
    ]);
})->name('pet.form.update');;



Route::view('/citas/agendar', 'appointments.schedule');

Route::controller(AdminController::class)->group(function(){

});

Route::prefix('/clientes')->controller(CustomerController::class)->group(function(){
    Route::get('', 'listCustomers')->name('customer.index');
    Route::post('/guardar', 'createCustomer')->name('customer.save');
    Route::delete('/eliminar', 'deleteCustomer')->name('customer.delete');
    Route::patch('/actualizar', 'updateCustomer')->name('customer.update');
});

Route::prefix('/mascotas')->controller(PetController::class)->group(function(){
    Route::get('', 'listPets')->name('pet.index');
    Route::post('/guardar', 'createPet')->name('pet.save');
    Route::delete('/eliminar', 'deletePet')->name('pet.delete');
    Route::patch('/actualizar', 'updatePet')->name('pet.update');
});

Route::prefix('/citas')->controller(AppointmentController::class)->group(function(){
    Route::get('', 'showCalendary')->name('appointment.index');
    Route::post('/agendar', 'scheduleAppointment')->name('appointment.save');
    Route::delete('/eliminar', 'deleteAppointment')->name('appointment.delete');
    Route::patch('/actualizar', 'updatAppointment')->name('appointment.update');
});