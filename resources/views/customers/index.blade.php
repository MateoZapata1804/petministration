@extends('layouts.container')

@section('child-content')

    <div class="container-fluid mt-4">
        <table class="table table-light table-striped table-bordered table-sm">
            <thead class="text-center table-secondary">
                <tr>
                    <th>Doc. Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th># de Contacto</th>
                    <th>Correo Electronico</th>
                    <th>Fecha Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody style="font-size: 90%;">
                @foreach ($customers as $cmr)
                    <tr>
                        <td>{{ $cmr->documento_id }}</td>
                        <td>{{ $cmr->nombre1." ".$cmr->nombre2 }}</td>
                        <td>{{ $cmr->apellido1." ".$cmr->apellido2 }}</td>
                        <td>{{ $cmr->celular }}</td>
                        <td>{{ $cmr->email }}</td>
                        <td>{{ $cmr->created_at }}</td>
                        <td class="d-flex justify-content-around">
                            <span>
                                <a href="{{route('customer.form.update', $cmr->id)}}" style="color: orange; border: none;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </span>
                            <form action="{{route('customer.delete', ["id" => $cmr->id])}}" method="POST">
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
                <a class="btn btn-secondary" href="{{ url('clientes/registrar') }}">+ Agregar</a>
            </div>
        </div>
    </div>
    
@endsection