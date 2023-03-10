<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Veterinaria PetLove</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Custom CSS -->
	<style>
		/* Estilos personalizados van aquí */
	</style>
</head>
<body>
	<!-- Cabecera -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
<div class="container-fluid">
	<!-- Hero -->
	<section class="jumbotron">
		<div class="container">
			<h2>¡Bienvenido a PetLove!</h2>
			<p>En nuestra clínica veterinaria ofrecemos servicios de alta calidad para el cuidado de tu mascota.</p>
			<a href="#servicios" class="btn btn-primary btn-lg">Ver nuestros servicios</a>
		</div>
	</section>

	<!-- Servicios -->
	<section id="servicios" class="bg-light">
		<div class="container">
			<h2>Nuestros servicios</h2>
			<p>Ofrecemos una amplia gama de servicios para el cuidado de tu mascota, desde consultas generales hasta procedimientos quirúrgicos especializados.</p>
			<div class="row">
				<div class="col-md-4">
					<div class="card mb-4">
						<div class="card-body">
							<h4 class="card-title">Consultas generales</h4>
							<p class="card-text">Realizamos exámenes de rutina y tratamos problemas de salud comunes.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4">
						<div class="card-body">
							<h4 class="card-title">Vacunación</h4>
							<p class="card-text">Ofrecemos programas de vacunación personalizados para cada mascota.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4">
						<div class="card-body">
							<h4 class="card-title">Procedimientos quirúrgicos</h4>
							<p class="card-text">Realizamos cirugías de tejidos blandos y ortopédicas.</p>
						</div>
					</div>
				</div>
			</div>
			<a href="{{ route('citas.index') }}" class="btn btn-primary btn-lg">Agendar una cita</a>


		</div>
	</section>
<!-- Testimonios -->
<section class="bg-light">
	<div class="container">
		<h2>Lo que dicen nuestros clientes</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card mb-4">
					<div class="card-body">
						<p class="card-text">"Excelente atención y profesionalismo. Recomendado al 100%."</p>
						<p class="text-muted">- Juan Pérez, dueño de Toby</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-4">
					<div class="card-body">
						<p class="card-text">"El mejor lugar para el cuidado de mi gatita. Siempre me siento bienvenido aquí."</p>
						<p class="text-muted">- María Rodríguez, dueña de Luna</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-4">
					<div class="card-body">
						<p class="card-text">"Excelente atención, amabilidad y profesionalismo en todo momento."</p>
						<p class="text-muted">- Carlos Gómez, dueño de Rocky</p>
					</div>
				</div>
			</div>
		</div>
		<a href="{{ route('citas.index') }}" class="btn btn-primary btn-lg">Agendar una cita</a>
	</div>
</section>
</div>
<!-- Footer -->
<div class="container mt-4">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
      </ul>
      <p class="text-center text-muted">© 2022 Company, Inc</p>
    </footer>
  </div>
</body>
</html>