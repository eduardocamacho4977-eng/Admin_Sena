<nav class="navbar navbar-expand-lg navbar-dark" style="background: #00A651;">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center me-3" href="{{ url('/') }}">
      <img src="{{ asset('image/logo sena.png') }}" alt="Logo SENA" style="height: 40px; margin-right: 8px; border-radius: 50%;">
      <span style="color: #ffffff; font-weight: bold;">Sena</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto align-items-center">
        <!-- Rutas públicas -->
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}" style="color: #ffffff;">Sobre nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}" style="color: #ffffff;">Contacto</a></li>

        <!-- Rutas visibles SOLO cuando el usuario inicie sesión -->
        @auth
          <li class="nav-item"><a class="nav-link" href="{{ route('administracion') }}" style="color: #ffffff;">Administración</a></li>
         
        @endauth
      </ul>
     <form action="{{ route('search') }}" method="GET" class="d-flex me-2">
    <input class="form-control me-2" type="search" name="search" placeholder="Buscar..." value="{{ request('search') }}">
    <button class="btn btn-outline-light" type="submit">Buscar</button>
</form>
      <!-- Botón de sesión alineado a la derecha -->
      <ul class="navbar-nav ms-auto align-items-center">
        @guest
          <li class="nav-item"><a class="nav-link btn btn-outline-light btn-sm px-3" href="{{ route('login') }}" style="color: #2fc43b;">Inicio de sesión</a></li>
        @endguest

        @auth
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn nav-link text-white border-0 bg-transparent" style="cursor: pointer;">
                Cerrar sesión
              </button>
            </form>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>