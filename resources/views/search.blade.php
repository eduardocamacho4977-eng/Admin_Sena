@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Resultados de búsqueda</h2>

    @if($search == '')
        <div class="alert alert-info">
            Escribe algo en el buscador.
        </div>
    @else

        <p>
            Resultados para:
            <strong>{{ $search }}</strong>
        </p>

        {{-- CURSOS --}}
        @if($courses->count() > 0)

            <h4 class="mt-4">Cursos</h4>

            @foreach($courses as $course)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $course->name }}
                    </div>
                </div>
            @endforeach

        @endif


        {{-- INSTRUCTORES --}}
        @if($teachers->count() > 0)

            <h4 class="mt-4">Instructores</h4>

            @foreach($teachers as $teacher)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $teacher->name }}
                    </div>
                </div>
            @endforeach

        @endif


        {{-- APRENDICES --}}
        @if($apprentices->count() > 0)

            <h4 class="mt-4">Aprendices</h4>

            @foreach($apprentices as $apprentice)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $apprentice->name }}
                    </div>
                </div>
            @endforeach

        @endif


        {{-- ÁREAS --}}
        @if($areas->count() > 0)

            <h4 class="mt-4">Áreas</h4>

            @foreach($areas as $area)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $area->name }}
                    </div>
                </div>
            @endforeach

        @endif


        {{-- CENTROS --}}
        @if($trainingCenters->count() > 0)

            <h4 class="mt-4">Centros</h4>

            @foreach($trainingCenters as $center)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $center->name }}
                    </div>
                </div>
            @endforeach

        @endif


        {{-- COMPUTADORES --}}
        @if($computers->count() > 0)

            <h4 class="mt-4">Computadores</h4>

            @foreach($computers as $computer)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $computer->name }}
                    </div>
                </div>
            @endforeach

        @endif


        {{-- SIN RESULTADOS --}}
        @if(
            $courses->count() == 0 &&
            $teachers->count() == 0 &&
            $apprentices->count() == 0 &&
            $areas->count() == 0 &&
            $trainingCenters->count() == 0 &&
            $computers->count() == 0
        )

            <div class="alert alert-warning mt-4">
                No se encontraron resultados.
            </div>

        @endif

    @endif

</div>

@endsection