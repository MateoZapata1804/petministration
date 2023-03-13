@extends('layouts.main-layout')

@section('title','Petministration')

@section('content')
    
    <header class="container-fluid p-2" style="background: #2E2300">
        <h1 style="color: white;">Petministration</h1>
    </header>

    <div class="container-fluid position-absolute mt-4 d-flex justify-content-center h-75">
        <div style="width: 90%; background: lightgray;">
            <nav class="bg-danger">
                <ul class="nav" style="background: #DB9501">
                    <li><a href="{{ route('customer.index') }}" class="btn px-4">Clientes</a></li>
                    <li><a href="{{ route('pet.index') }}" class="btn px-4">Mascotas</a></li>
                    <li><a href="{{ route('appointment.index') }}" class="btn px-4">Calendario de Citas</a></li>
                </ul>
            </nav>
            @yield('child-content')
        </div>
    </div>

    <script type="text/javascript">
        let url = window.location.pathname;
        let i = (url.includes("/clientes")) ? 0 : 
                (url.includes("/mascotas")) ? 1 : 
                (url.includes("/citas")) ? 2 : null;
        document.getElementsByTagName("nav")[0]
            .getElementsByTagName("li")[i].style.background = 'lightgray';
    </script>

@endsection