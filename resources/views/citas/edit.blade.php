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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Editar cita</h2>
                    <hr>
                    <form method="POST" action="{{ route('citas.update', $cita) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="mascota_id">Mascota</label>
                            <select name="mascota_id" id="mascota_id" class="form-control">
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}" {{ $cita->mascota_id == $mascota->id ? 'selected' : '' }}>{{ $mascota->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inicio">Fecha y hora de inicio</label>
                            <input type="datetime-local" name="inicio" id="inicio" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($cita->inicio)) }}">
                        </div>
                        <div class="form-group">
                            <label for="final">Fecha y hora de fin</label>
                            <input type="datetime-local" name="final" id="final" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($cita->final)) }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
  </body>