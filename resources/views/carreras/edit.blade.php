@extends('layouts.template')

@section('title', 'Editar Carrera')

@section('content')

<div>
    <form action="{{ route('carreras.update', $carrera->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" class="form-control" name="carrera" id="carrera" value="{{ $carrera->carrera }}">
</div>
<div class="">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
    
@endsection