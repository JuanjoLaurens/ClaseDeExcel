<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veterinaria Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        <form method="POST" action="{{ route('citas.store') }}">
            @csrf
        
            <div class="form-group">
                <label for="mascota_id">Mascota</label>
                <select name="mascota_id" id="mascota_id" class="form-control">
                    @foreach ($mascotas as $mascota)
                        <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
        
            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control" required>
            </div>
        
            @error('hora')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        
            <button type="submit" class="btn btn-primary">Crear cita</button>
        </form>
        

        
            <button type="submit" class="btn btn-primary">Crear cita</button>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#fecha').change(function() {
                var fecha = $(this).val();
                var mascota_id = $('#mascota_id').val();
                var hora = $('#hora').val();
                
                $.ajax({
                    url: "{{ route('citas.check-availability') }}",
                    type: "GET",
                    data: {
                        fecha: fecha,
                        mascota_id: mascota_id,
                        hora: hora
                    },
                    success: function(response) {
                        if (response == "false") {
                            $('#crear-cita').prop('disabled', true);
                            alert('Ya existe una cita programada para esa fecha y hora.');
                        } else {
                            $('#crear-cita').prop('disabled', false);
                        }
                    }
                });
            });
        });
    </script>
  </body>