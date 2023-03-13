<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private function doValidations($apmtDay, $startHour, $endHour){
        $scheduledApmts = Appointment::all()
            ->where('fecha','=',$apmtDay)
            ->whereBetween('hora_inicio',[$startHour,$endHour]);

        if ($apmtDay < now()) {
            return 'La cita no puede ser agendada en un día anterior a este';
        } else if ($scheduledApmts->count() > 0) {
            return 'Ya existe una cita agendada para la hora ingresada';
        }

        return '';
    }

    public function showCalendary(){
        $appointments = Appointment::all();
        return view('appointments.calendar', ['appointments' => $appointments]);
    }

    public function scheduleAppointment(Request $request){
        $validation = $this->doValidations($request->appointmentDay, $request->startHour, $request->endHour);

        if ($validation != '') return redirect()->route('appointment.index')
            ->with('message', $validation);

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

    public function deleteAppointment(Request $req){
        Appointment::destroy($req->apmtId);
        return redirect()->route('appointment.index');
    }
}
