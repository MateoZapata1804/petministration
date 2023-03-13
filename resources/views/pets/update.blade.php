@extends('layouts.container')

@section('child-content')

    <div class="container-fluid d-flex justify-content-center">
        <form class="w-50 text-center p-3 mt-4" style="background: #6E6702;" method="POST" action="{{ route('pet.update') }}">
            <input type="hidden" name="id" value="{{$actualData->id}}">
            <input type="hidden" name="owner" value="{{$actualData->cliente}}">
            
            @csrf
            @method('PATCH')

            <div class="m-2">
                <h2>Actualizar Mascota</h2>
            </div><br>
            <div class="m-2 d-flex align-items-center">
                <label for="petName" class="form-label w-100">Nombre del animalito </label>
                <input value="{{$actualData->nombre}}" type="text" name="petName" class="form-control" placeholder="Firulais.." required>
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
                <button type="submit" class="btn btn-primary px-5" id="submit">Actualizar</button>
            </div>
        </form>
    </div>
    
@endsection