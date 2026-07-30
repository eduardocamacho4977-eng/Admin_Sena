@extends('layouts.app')

@section('content')
    <h1>LISTAR CURSOS</h1>

    <div class="container">
        <div class="mb-3">
            <a href="{{ route('course.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Curso
            </a>
        </div>
        <table id="idCourse" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Número de curso</th>
                    <th>Día</th>
                    <th>Área Id</th>
                    <th>Área</th>
                    <th>Centro Id</th>
                    <th>Centro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->course_number }}</td>
                        <td>{{ $course->day }}</td>
                        <td>{{ $course->area_id }}</td>
                        <td>{{ $course->area->name}}</td>
                        <td>{{ $course->training_center_id }}</td>
                        <td>{{ $course->trainingCenter->name }}</td>
                        <td>
                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-sm btn-primary">Mostrar</a>
                            <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                            <form action="{{ route('course.destroy', $course->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Eliminar curso? Esto borrará {{ $course->apprentices->count() }} aprendiz(es) relacionados.')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection