@extends('layouts.template')

@section('title', 'Editar Alumno')

@section('content')

<div>

    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $alumno->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $alumno->email }}">
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
            <select name="id_carrera" class="form-select" required>
                <option value="">Carera</option>
                @foreach($carreras as $row)
                    @if ($row->id == $alumno->id_carrera)
                        <option selected value="{{ $row->id}}">{{ $row->carrera}}</option>
                    @else
                        <option value="{{ $row->id}}">{{ $row->carrera}}</option>
                    @endif
                
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
    
@endsection