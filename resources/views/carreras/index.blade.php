@extends('layouts.template')

@section('title', 'Carreras')

@section('content')

    <div class="mt-5 flex justify-center items-center">

        <div class="rounded-3xl p-10 shadow-lg w-fit text-lg">
            <table>
                <thead>
                    <tr>
                        <th class="p-3 whitespace-nowrap">Id</th>
                        <th class="p-3 whitespace-nowrap">Carrera</th>
                        <th class="p-3 whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carreras as $carrera)
                        <tr>
                            <td>{{ $carrera->id }}</td>
                            <td>{{ $carrera->carrera }}</td>
                            <td class="flex flex-row">
                                <a href="{{ route('carreras.edit', $carrera->id) }}"
                                    class="btn btn-primary ml-2 mr-2">Editar</a>
                                <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST">
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

    {{-- Boton para agregar carrera --}}
    <div class="flex justify-center items-center mt-5">

        <form action="{{ route('carreras.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control rounded-lg indent-2 p-1 shadow-lg" name="carrera" id="carrera"
                    placeholder="Add carrera">

            </div>
    </div>
    <div class="flex justify-center items-center mt-2">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

@endsection
