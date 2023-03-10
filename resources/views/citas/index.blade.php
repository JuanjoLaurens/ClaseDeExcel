<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veterinaria Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <!-- jQuery y FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
    <style>
        /* Estilo para el header del calendario */
        .fc-header {
            background-color: #F7F7F7;
            border-color: #E6E6E6;
            padding: 10px;
        }

        /* Estilo para los botones de navegación */
        .fc-button {
            background-color: #FFFFFF;
            border-color: #E6E6E6;
            color: #4D4D4D;
            font-weight: bold;
        }

        /* Estilo para los botones de navegación cuando se les da hover */
        .fc-button:hover {
            background-color: #E6E6E6;
        }

        /* Estilo para los botones de navegación cuando se les da click */
        .fc-button.active {
            background-color: #E6E6E6;
        }

        /* Estilo para los días de la semana */
        .fc-day-header {
            background-color: #F7F7F7;
            border-color: #E6E6E6;
            color: #4D4D4D;
            font-weight: bold;
        }

        /* Estilo para los números de día en el mes */
        .fc-day-number {
            color: #4D4D4D;
            font-weight: bold;
        }

        /* Estilo para los eventos en el calendario */
        .fc-event {
            background-color: #F7F7F7;
            border-color: #E6E6E6;
            color: #4D4D4D;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        }

        /* Estilo para los eventos en el calendario cuando se les da hover */
        .fc-event:hover {
            background-color: #E6E6E6;
        }

        /* Estilo para el texto dentro de los eventos en el calendario */
        .fc-event .fc-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Estilo para el popup que se muestra al hacer click en un evento */
        .fc-event-popover {
            background-color: #FFFFFF;
            border-color: #E6E6E6;
            color: #4D4D4D;
            font-weight: bold;
            padding: 10px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        }

        /* Estilo para el botón de cerrar del popup */
        .fc-event-popover .fc-close {
            color: #4D4D4D;
            font-size: 14px;
            font-weight: bold;
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
        }

        /* Estilo para el fondo del popup */
        .fc-event-popover:before {
            content: "";
            display: block;
            position: absolute;
            top: -10px;
            left: 50%;
            margin-left: -10px;
            border: 10px solid transparent;
            border-bottom-color: #E6E6E6;
        }
    </style>
</head>


<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('clientes.index') }}">Clientes</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mascotas.index') }}">Mascotas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('citas.index') }}">Citas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1 class="text-center">Agenda de Citas</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agenda una nueva cita
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar Cita</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('citas.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="inicio" class="form-label">Fecha de inicio</label>
                                <input type="datetime-local" class="form-control" id="inicio" name="inicio">
                            </div>

                            <div class="mb-3">
                                <label for="final" class="form-label">Fecha de fin</label>
                                <input type="datetime-local" class="form-control" id="final" name="final">
                            </div>

                            <div class="mb-3">
                                <label for="mascota_id" class="form-label">Mascota</label>
                                <select class="form-control" id="mascota_id" name="mascota_id">
                                    @foreach ($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div id='calendar'></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css" media="print" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-UO2eT0CpHqdRigm5lvH6FQMDdXjkJmDk/0Uca3cvvH+6UwO6dIovMZntGaJwksC" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-qN9y3zwcMVOJN0aIkVmBx1zYwAJkT3EIlBsjFak+PTEzBxhGPyPr5WJQ1WysJiLw" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/es.js"></script>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                navLinks: true,
                locale: 'es',
                events: '/citas/fullcalendar',
                eventClick: function(event) {
                    window.location.href = '/citas/' + event.id;
                },
                eventRender: function(event, element) {
                    element.find('.fc-title').html(event.mascota_nombre);
                },
                select: function(start, end, jsEvent, view) {
                    var eventData;
                    var checkOverlap = $('#calendar').fullCalendar('clientEvents', function(ev) {
                        if (ev.start <= end && start <= ev.end) {
                            return true;
                        }
                        return false;
                    });
                    if (checkOverlap.length == 0) {
                        eventData = {
                            start: start,
                            end: end
                        };
                        $('#calendar').fullCalendar('renderEvent', eventData, true);
                    }
                }
            });
        });
    </script>







</body>