<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sena </title>
    @include('includes.dependencias')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #ffffff;
            color: #333333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        footer {
            background: #00A651;
            padding: 2rem 0;
            border-top: 1px solid rgba(0,166,81,0.1);
            color: #ffffff;
        }
        .hero {
            min-height: 80vh;
        }
        .card-custom {
            background: rgba(0,166,81,.08);
            border: 2px solid rgba(0,166,81,.15);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
            color: #333333;
        }
        .section-title {
            letter-spacing: .14em;
            text-transform: uppercase;
            opacity: .75;
            font-weight: 600;
            color: #00A651;
        }
        .btn-sena { 
            font-weight: 600; 
            background-color: #00A651;
            border-color: #00A651;
            color: #ffffff;
        }
        .btn-sena:hover {
            background-color: #008040;
            border-color: #008040;
            color: #ffffff;
        }
        .logo-sena {
            max-height: 80px;
            margin-bottom: 2rem;
            border-radius: 50%;
        }
        .navbar-sena {
            background: linear-gradient(135deg, #00A651 0%, #00A651 0%) !important;
        }
        .btn-sena-outline {
            border: 2px solid #00A651;
            color: #00A651;
            font-weight: 600;
            background-color: transparent;
        }
        .btn-sena-outline:hover {
            background-color: #00A651;
            color: #ffffff;
        }
        .info-card {
            border: 1px solid rgba(0,166,81,.15);
            border-left: 4px solid #00A651;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(0,0,0,.06);
        }
    </style>
</head>
<body>
    @include('includes.navbar')

    <main class="container py-5 hero">
        <div class="row align-items-center">
            <div class="col-lg-6">
               
              
                <h1 class="display-5 fw-bold" style="color: #00A651;">Sena</h1>
                <p class="lead" style="color: #666666;">Gestiona cursos, instructores, aprendices y centros de formación con una interfaz simple y moderna.</p>
                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('course.index') }}" class="btn btn-sena btn-lg">Ver cursos</a>
                    <a href="{{ route('apprentice.index') }}" class="btn btn-sena-outline btn-lg">Ver aprendices</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="card card-custom p-4 shadow-lg">
                    
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=800&q=80" class="img-fluid rounded mb-3" alt="Aprendices">
                    <div class="row" style="color: #666666;">
                        <div class="col-6">
                            <div class="mb-3">
                                <h5 class="mb-0">Cursos</h5>
                                <small>Gestiona tu oferta académica</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <h5 class="mb-0">Aprendices</h5>
                                <small>Controla inscripciones y avances</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-5" style="color: #21c27f;">
            <div class="row gy-4">
                <div class="col-md-4">
                    <div class="card card-custom p-4 h-100 border-0 shadow-sm rounded-3 transition-all">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-shape bg-success bg-opacity-10 text-success rounded-circle p-3 me-3 d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fas fa-compass fs-4" style="color: #00A651;"></i>
                            </div>
                            <h5 class="fw-bold mb-0 text-dark">Navegación fácil</h5>
                        </div>
                        <p class="text-muted mb-0">
                            Menú superior intuitivo diseñado para moverte de forma rápida y fluida entre las secciones principales.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 pt-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <p class="section-title mb-1">Panel de control</p>
                    <h2 class="h3 fw-bold text-dark mb-0">Administración</h2>
                </div>
                <i class="bi bi-sliders2 fs-2" style="color: #00A651;" aria-hidden="true"></i>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 gy-3">
                <div class="col">
                    <a href="{{ route('area.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                        <i class="bi bi-diagram-3 fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                        <h3 class="h5 text-dark mb-1">Áreas</h3>
                        <p class="text-muted mb-0">Organiza las áreas de formación.</p>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('training_center.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                        <i class="bi bi-building fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                        <h3 class="h5 text-dark mb-1">Centros de formación</h3>
                        <p class="text-muted mb-0">Consulta y administra los centros.</p>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('course.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                        <i class="bi bi-book fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                        <h3 class="h5 text-dark mb-1">Cursos</h3>
                        <p class="text-muted mb-0">Gestiona la oferta académica.</p>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('teacher.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                        <i class="bi bi-person-workspace fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                        <h3 class="h5 text-dark mb-1">Profesores</h3>
                        <p class="text-muted mb-0">Administra instructores y docentes.</p>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('apprentice.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                        <i class="bi bi-people fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                        <h3 class="h5 text-dark mb-1">Aprendices</h3>
                        <p class="text-muted mb-0">Revisa aprendices y sus avances.</p>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('computer.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                        <i class="bi bi-pc-display fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                        <h3 class="h5 text-dark mb-1">Computadoras</h3>
                        <p class="text-muted mb-0">Controla los equipos disponibles.</p>
                    </a>
                </div>
            </div>
        </section>

        <section class="mt-5 pt-3">
            <div class="row gy-4">
                <div class="col-lg-7">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="section-title mb-1">Mantente informado</p>
                            <h2 class="h3 fw-bold text-dark mb-0">Noticias</h2>
                        </div>
                        <i class="bi bi-newspaper fs-2" style="color: #00A651;" aria-hidden="true"></i>
                    </div>
                    <div class="d-grid gap-3">
                        <article class="info-card rounded-3 p-4">
                            <small class="text-success fw-semibold">FORMACIÓN</small>
                            <h3 class="h5 text-dark mt-2">Nuevos cursos disponibles</h3>
                            <p class="text-muted mb-0">Consulta la oferta académica y encuentra nuevas oportunidades de formación para los aprendices.</p>
                        </article>
                        <article class="info-card rounded-3 p-4">
                            <small class="text-success fw-semibold">COMUNIDAD SENA</small>
                            <h3 class="h5 text-dark mt-2">Actualización del portal administrativo</h3>
                            <p class="text-muted mb-0">Ya puedes consultar y administrar la información de cursos, instructores y centros desde un solo lugar.</p>
                        </article>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="section-title mb-1">Agenda</p>
                            <h2 class="h3 fw-bold text-dark mb-0">Próximos eventos</h2>
                        </div>
                        <i class="bi bi-calendar-event fs-2" style="color: #00A651;" aria-hidden="true"></i>
                    </div>
                    <div class="info-card rounded-3 p-4 mb-3">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="text-center text-success fw-bold">
                                <span class="d-block fs-3 lh-1">15</span>
                                <small>SEP</small>
                            </div>
                            <div>
                                <h3 class="h5 text-dark mb-1">Feria de oportunidades</h3>
                                <p class="text-muted mb-0"><i class="bi bi-clock me-1"></i>8:00 a. m. · Auditorio principal</p>
                            </div>
                        </div>
                    </div>
                    <div class="info-card rounded-3 p-4">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="text-center text-success fw-bold">
                                <span class="d-block fs-3 lh-1">28</span>
                                <small>SEP</small>
                            </div>
                            <div>
                                <h3 class="h5 text-dark mb-1">Encuentro de instructores</h3>
                                <p class="text-muted mb-0"><i class="bi bi-clock me-1"></i>2:00 p. m. · Sala de reuniones</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('includes.footer')

    @include('includes.dependenciasbody')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
