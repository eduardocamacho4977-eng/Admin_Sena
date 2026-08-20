<nav class="navbar navbar-expand-lg navbar-dark" style="background: #00A651;">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
      <img src="{{ asset('image/logo sena.png') }}" alt="Logo SENA" style="height: 45px; margin-right: 10px; border-radius: 50%;">
      <span style="color: #ffffff; font-weight: bold;">Sena</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}" style="color: #ffffff;">Sobre nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('administracion') }}" style="color: #ffffff;">administracion</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('area.index') }}" style="color: #ffffff;">Áreas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('training_center.index') }}" style="color: #ffffff;">Centros</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('computer.index') }}" style="color: #ffffff;">Computadores</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('course.index') }}" style="color: #ffffff;">Cursos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('teacher.index') }}" style="color: #ffffff;">Instructores</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('apprentice.index') }}" style="color: #ffffff;">Aprendices</a></li>
      </ul>
    </div>
  </div>
</nav>