@extends('layouts.container')

@section('child-content')

    <div class="container-fluid mt-4">
        <table class="table table-light table-striped table-sm">
            <thead class="text-center table-warning">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Animal</th>
                    <th>Dueño</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pets as $pet)
                    <tr>
                        <td>{{ $pet->id_mascota }}</td>
                        <td>{{ $pet->nombre }}</td>
                        <td>{{ $pet->nombre_tm }}</td>
                        <td>{{ $pet->nombre_cliente }}</td>
                        <td>{{ $pet->created_at }}</td>
                        <td class="d-flex justify-content-around">
                            {{-- UPDATE --}}
                            <span>
                                <a href="{{route('pet.form.update', $pet->id_mascota)}}" style="color: orange; border: none;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </span>
                            {{-- DELETE --}}
                            <form action="{{route('pet.delete', ["id" => $pet->id_mascota])}}" method="POST">
                                @method('DELETE') @csrf
                                <button style="color: crimson; border: none;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container-fluid d-flex justify-content-between mt-4">
            <div>
                @if (session('message'))
                    <b class="{{session('messageStyle')}}">{{session('message')}}</b>
                @endif
            </div>
            <div>
                <a class="btn btn-primary" href="{{ url('mascotas/registrar') }}">+ Agregar</a>
            </div>
        </div>
    </div>
    
@endsection