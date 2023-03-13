@extends('layouts.container')

@section('child-content')

    <div class="container-fluid d-flex justify-content-center">
        <input type="hidden" id="cmrs" value="{{$registeredCmrs}}">
        <form class="w-50 text-center p-3 mt-4" style="background: #6E6702;" method="POST" action="{{ route('pet.save') }}">
            
            @csrf

            <div class="m-2">
                <h2>Registrar Mascota</h2>
            </div><br>
            <div class="m-2 d-flex align-items-center">
                <label for="petName" class="form-label w-100">Nombre del animalito </label>
                <input type="text" name="petName" class="form-control" placeholder="Firulais.." required>
            </div>
            <div class="m-2 d-flex align-items-center">
                <label for="owner" class="form-label w-100">CC de la persona responsable </label>
                <input oninput="getIsRegisteredCmr(this.value)" type="text" name="owner" class="form-control" placeholder="Documento..." required>
            </div>
            <div class="m-2 d-flex align-items-center">
                <label for="petType" class="form-label w-100">Animal </label>
                <select name="petType" class="form-select">
                    @foreach ($petTypes as $type)
                        <option value="{{ $type->id }}">{{$type->nombre_tm}}</option>
                    @endforeach
                </select>
            </div>
            <div class="m-2 d-flex justify-content-between align-items-end">
                <span id="msgBox"> </span>
                <button type="submit" class="btn btn-primary px-5" id="submit">Registrar</button>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="{{asset('js/pet-create.js')}}"></script>
    
@endsection