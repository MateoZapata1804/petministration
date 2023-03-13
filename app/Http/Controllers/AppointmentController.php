<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function showCalendary(){
        $appointments = Appointment::all();
        return view('appointments.calendar', ['appointments' => $appointments]);
    }

    public function scheduleAppointment(Request $request){
        $apmt = new Appointment();
        $apmt->fecha = $request->appointmentDay;
        $apmt->hora_inicio = $request->startHour;
        $apmt->hora_fin = $request->endHour;
        $apmt->nombre_mascota = $request->petName;
        $apmt->save();
        return redirect()->route('appointment.index');
    }

    public function updateAppointment(Request $newData){
        $apmt = new Appointment();
        $apmt->id = $newData->id;
        $apmt->fecha = $newData->appointmentDate;
        $apmt->hora = $newData->appointmentHour;
        $apmt->mascota = $newData->petId;
        $apmt->update();
    }

    public function deleteAppointment(int $id){
        Appointment::destroy($id);
    }
}
