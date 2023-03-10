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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Detalles de la cita') }}</div>
        
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="mascota" class="col-md-4 col-form-label text-md-right">{{ __('Mascota') }}</label>
        
                                <div class="col-md-6">
                                    <p>{{ $cita->mascota->nombre }}</p>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="inicio" class="col-md-4 col-form-label text-md-right">{{ __('Fecha y hora de inicio') }}</label>
        
                                <div class="col-md-6">
                                    <p>{{ $cita->inicio }}</p>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="final" class="col-md-4 col-form-label text-md-right">{{ __('Fecha y hora de fin') }}</label>
        
                                <div class="col-md-6">
                                    <p>{{ $cita->final }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reserva" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de reserva') }}</label>
            
                                <div class="col-md-6">
                                    <p>{{ $cita->reserva }}</p>
                                </div>
                            </div>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('citas.index') }}" class="btn btn-primary">{{ __('Volver') }}</a> 
                                    
                                    
                                        <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-primary">
                                            Editar cita
                                        </a>
                                        <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres cancelar esta cita?')">
                                                Eliminar cita
                                            </button>
                                        </form>

                                    
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
  </body>