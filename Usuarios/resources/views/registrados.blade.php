<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <title>Examen Carlos</title>
  </head>
  <body>

    <nav  class="navbar navbar-expand-lg navbar-light p-3"  id="menu">
        <div class="container">
          <a class="navbar-brand" href="#">
            {{-- <img class="favicon" src="{{ asset('img/iqsec2.jpg') }}"> --}}
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

  <div class="container  border-top border-primary ">
    <h1>Usuarios Registrados</h1>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Edad</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $usuario)
        @php
            $fecha_nac = new DateTime($usuario->fecha_nac);
            $fecha_actual = new DateTime(date("Y-m-d"));
            $diferencia = $fecha_actual->diff($fecha_nac);
            $edad = $diferencia->format("%y");
        @endphp
          <tr>
            <th scope="row">{{ $usuario->id }}</th>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $edad }}</td>
            <td>{{ $usuario->direccion }}</td>
            <td>{{ $usuario->telefono }}</td>
            <td>
                <form action="{{ route('EliminarUsuario', ['id' => $usuario->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                  </form>
            </td>
            <td>
              <form action="{{ route('editarusuario', ['id' => $usuario->id]) }}" method="POST">
                @csrf
                @method('post')
              <button class="btn btn-info" type="submit">Editar</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
  </div>
</section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>

  </body>
</html>
