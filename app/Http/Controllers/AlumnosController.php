<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Carreras;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function index()
    {
        // select * from Carreras
        $alumnos = Alumnos::select('alumnos.id', 'name', 'email', 'id_carrera', 'carrera')->join('carreras', 'carreras.id', "=", 'alumnos.id_carrera')->get();
        $carreras = Carreras::all();
        // Regresa la vista llamada carreras
        return view('alumnos.index', compact('alumnos', 'carreras'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        /* $alumno = new Alumnos($request->input());
        $alumno->saveOrFail(); */

        $alumno = Alumnos::create($request->all());
        return redirect('alumnos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $alumno = Alumnos::find($id);
        $carreras = Carreras::all();
        return view('alumnos.edit', compact('alumno', 'carreras'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'id_carrera' => 'required'
        ]);

        //
        $alumno = Alumnos::find($id);
        $alumno->fill($request->input())->saveOrFail();
        return redirect('alumnos');
    }

    public function destroy($id)
    {
        //
        $alumno = Alumnos::find($id);
        $alumno->delete();
        return redirect('alumnos');
    }
}
