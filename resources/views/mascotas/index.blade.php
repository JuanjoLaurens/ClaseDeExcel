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
            <div class="container ">
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
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Mascotas</div>
                        <div class="card-header">
                            <form action="{{ route('mascotas.index') }}" method="GET" class="float-end">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar mascota" name="search">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre de la mascota</th>
                                        <th>Tipo de mascota</th>
                                        <th>Dueño</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mascotas as $mascota)
                                        <tr>
                                            <td>{{ $mascota->id }}</td>
                                            <td>{{ $mascota->nombre }}</td>
                                            <td>{{ $mascota->tipo }}</td>
                                            <td>{{ $mascota->cliente->nombres }}</td>
                                            <td>
                                                
                                                <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-primary">Editar</a>
                                                <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <a href="{{ route('mascotas.create') }}" class="btn btn-success">Nueva Mascota</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
  </body>