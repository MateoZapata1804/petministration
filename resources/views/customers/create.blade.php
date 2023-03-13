@extends('layouts.container')

@section('child-content')

    <div class="container-fluid d-flex justify-content-center">
        <form class="w-50 text-center p-3 mt-4" style="background: #C05805;" method="POST" action="{{ route('customer.save') }}">
            @csrf
            <div class="m-2">
                <h2>Registrar nuevo usuario</h2>
            </div>
            <div class="m-2">
                <input type="text" name="docId" class="form-control" placeholder="Documento de Identidad *" required>
            </div>
            <div class="m-2 d-flex">
                <input type="text" name="name1" class="form-control mx-1" placeholder="Primer Nombre *" required>
                <input type="text" name="name2" class="form-control mx-1" placeholder="Segundo Nombre">
            </div>
            <div class="m-2 d-flex">
                <input type="text" name="lastName1" class="form-control mx-1" placeholder="Primer Apellido *" required>
                <input type="text" name="lastName2" class="form-control mx-1" placeholder="Segundo Apellido">
            </div>
            <div class="m-2">
                <input type="text" name="phoneNumber" class="form-control" placeholder="Número de Celular *" required>
            </div>
            <div class="m-2">
                <input type="email" name="email" class="form-control" placeholder="Correo Electrónico  *" required>
            </div>
            <div class="m-2">
                <input type="submit" class="btn" value="Registrar" style="background: white;">
            </div>
        </form>
    </div>
    
@endsection