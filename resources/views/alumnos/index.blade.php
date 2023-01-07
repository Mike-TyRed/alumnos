@extends('layouts.template')

@section('title', 'Alumnos')

@section('content')
    <div class="mt-5 flex justify-center items-center">
        <div class="rounded-3xl p-10 shadow-lg w-fit text-lg">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="p-3 whitespace-nowrap" scope="col">ID</th>
                        <th class="p-3 whitespace-nowrap" scope="col">Nombre</th>
                        <th class="p-3 whitespace-nowrap" scope="col">Email</th>
                        <th class="p-3 whitespace-nowrap" scope="col">Carrera</th>
                        <th class="p-3 whitespace-nowrap" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <th scope="row">{{ $alumno->id }}</th>
                            <td >{{ $alumno->name }}</td>
                            <td>{{ $alumno->email }}</td>
                            <td>{{ $alumno->carrera }}</td>
                            <td class="flex flex-row">
                                <a href="{{ route('alumnos.edit', $alumno->id) }}"
                                    class="btn btn-primary ml-2 mr-2"">Editar</a>
                                <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Boton para agregar alumno --}}
    <div class="flex justify-center items-center mt-5">

        <form action="{{ route('alumnos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" id="name" placeholder="Name"
                    class="form-control rounded-lg indent-2 p-1 shadow-lg">
                <input type="text" class="form-control rounded-lg indent-2 p-1 shadow-lg" name="email" id="email"
                    placeholder="Email">

                <select class="form-control rounded-lg indent-2 p-1 shadow-lg" name="id_carrera" id="id_carrera">
                    <option value="">Carrera</option>
                    @foreach ($carreras as $row)
                        <option value="{{ $row->id }}">{{ $row->carrera }}</option>
                    @endforeach
                </select>

            </div>
            <div class="flex justify-center items-center mt-2">
                <button type="submit"> Agregar </button>
            </div>

    </div>
@endsection
