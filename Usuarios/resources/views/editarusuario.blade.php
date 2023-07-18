<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <title>Examen Carlos</title>
  </head>
  <body>

    <nav  class="navbar navbar-expand-lg navbar-light p-3"  id="menu">
        <div class="container">
          <a class="navbar-brand" href="#">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{route('index')}}">Registrar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('listar-usuarios') }}">Ver usuarios</a>
              </li>
            </ul>
            </div>
        </div>
      </nav>

<section id="seccion-contacto" class="border-bottom border-secondary border-2">
  <div id="bg-contactos">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#131e40" fill-opacity="1" d="M0,32L120,42.7C240,53,480,75,720,74.7C960,75,1200,53,1320,42.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
  </div>

  <div class="container  border-top border-primary " style="max-width: 500px" id="contenedor-formulario">
      <div class="text-center mb-4" id="titulo-formulario">
        <h2>Editar Usuario</h2>
      </div>

      <form method="GET" data-netlify="true">
        @csrf
        @foreach($usuario as $data)
            <div class= "mb-3">
                <label>id:</label>
                <input type="text" class="form-control" id="id" name="id" value="{{$data->id}}" readonly>
            </div>
            <div class= "mb-3">
              <label>Email:</label>
              <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
            </div>

            <div class="mb-3">
              <label>Nombre:</label>
              <input type="input" class="form-control" id="name" name="name" value="{{$data->name}}">
            </div>

            <div class="mb-3">
              <label>Contraseña:</label>
              <input type="password" class="form-control" name="pass" id="pass" placeholder="°°°°°°">
            </div>

            <div class="mb-3">
                <label>Dirección:</label>
                <input type="text" class="form-control" name="address" id="address" value="{{$data->direccion}}">
            </div>

            <div class="mb-3">
                <label>Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="birthday" id="birthday" min="1970-01-01" max="2005-12-31" value="{{$data->fecha_nac}}">
            </div>

            <div class="mb-3">
                <label>Telefono:</label>
                <input type="phone" class="form-control" name="phone_number" id="phone_number" value="{{$data->telefono}}">
            </div>
            @endforeach
          <div class="mb-3">
            <input type="button" value="Editar" id="editar">
          </div>
      </form>

  </div>
</section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/functions_edit.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>

  </body>
</html>
