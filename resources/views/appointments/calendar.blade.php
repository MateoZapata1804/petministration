@extends('layouts.container')

<style>
    .calendar {
        border-radius: 5px;
        padding: 5px;
        width: 80%;
        text-decoration: none;
    }

    #container {
        width: 100%;
        height: 90%;
    }
</style>

@section('child-content')

    <input type="hidden" id="appointments" value="{{$appointments}}">
    <div class="container-fluid p-4 d-flex justify-content-end" id="container">
        <div class="container w-25 pt-5">
            @if(session('message'))
                <div class="alert alert-danger">
                    <b>{{session('message')}}</b>
                </div>
            @endif
            <div class="card" id="apmtDetails" hidden>
                <div class="card-header">
                    <h3 id="appointmentTitle"></h3>
                </div>
                <div class="card-body">
                    <span id="details"></span>
                </div>
                <div class="card-footer">
                    <form action="{{route('appointment.delete')}}" method="post">
                        <input type="hidden" name="apmtId" id="apmtId">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="calendar bg-light" id="calendar">
            {{-- << CALENDARIO >> --}}
        </div>
    </div>

    <div class="modal">
        <form action="{{route('appointment.save')}}" method="POST">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agendar cita para el día <span id="dayText"></span></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="appointmentDay" name="appointmentDay" value="">
                        <div class="d-flex justify-content-around mb-2">
                            Hora de inicio: <input class="form-control w-50" type="time" name="startHour" required>
                        </div>
                        <div class="d-flex justify-content-around mb-2">
                            Hora de finalización: <input class="form-control w-50" type="time" name="endHour" required>
                        </div>
                        <div class="d-flex mb-2">
                            <input class="form-control" type="text" name="petName" placeholder="Nombre de la mascota... ">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="modal.hide('fade')">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <script type="text/javascript">
        // No se puede obtener el div con jquery ($), no c por qué tira error
        let container = document.getElementById("calendar");
        let modal = $(".modal");
        let unparsedApmts = JSON.parse($("#appointments").val());
        let appointments = []; // ESTOS SON LOS DATOS QUE SE LE ASIGNARÁN AL events[] DEL CALENDARIO
        unparsedApmts.forEach(e => {
            var eventToPush = {
                id: e.id,
                title: `Cita con ${e.nombre_mascota}`,
                start: e.fecha + " " + e.hora_inicio,
                end: e.fecha + " " + e.hora_fin,
                color: 'orange'
            }
            appointments.push(eventToPush);
        });

        console.log(appointments);
        
        $(function(){
            let calendar = new FullCalendar.Calendar(container, {
                initialView: "dayGridMonth",
                locale: "es",
                plugins: [],
                dateClick: (date) => {
                    openFormModal(date.dateStr);
                },
                eventClick: (date) => {
                    showApmtDetails(date.event);
                },
                events: appointments
            });

            calendar.render();
        });

        function openFormModal(date) {
            modal.show("fade");
            $("#dayText").text(date);
            $("#appointmentDay").val(date);
        }

        function showApmtDetails(date) {
            console.log(date);
            var str = `
                <p>Hora de inicio: <b>${date.startStr.match(/\d{2}:\d{2}/)}</b></p>
                <p>Hora de finalizacion: <b>${date.endStr.match(/\d{2}:\d{2}/)}</b></p>
                `;
            $("#apmtDetails").attr("hidden", false);
            $("#appointmentTitle").html(date.title);
            $("#details").html(str);
            $("#apmtId").val(date.id);
        }

    </script>
@endsection