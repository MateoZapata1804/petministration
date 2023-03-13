@extends('layouts.container')

@section('child-content')

    <div class="container-fluid d-flex justify-content-center">
        <form class="w-50 text-center p-3 mt-4" style="background: orange;" method="POST" action="{{ route('appointment.save') }}">
            <div class="m-2">
                <h2>Agendar cita</h2>
            </div>
            <div class="m-2">
                <input type="date" name="appointmentDate" class="form-control" placeholder="Fecha" required>
            </div>
            <div class="m-2">
                <input type="time" name="appointmentHour" class="form-control" placeholder="Hora" required>
            </div>
            <div class="m-2">
                <select name="petId">
                    @foreach ($pets as $pet)
                        <option value="{{ $pet->id }}">{{$pet->nombre}}, de {{$pet->cliente}}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
    
@endsection