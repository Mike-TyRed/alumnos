<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    
    public function index()
    {
        // select * from Carreras
        //$carreras = Carreras::orderBy('id', 'desc')->paginate();
        $carreras = Carreras::all();

        // Regresa la vista llamada carreras
        return view('carreras.index', compact('carreras'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //guarda en la bd
        $carrera = new Carreras($request->input());
        $carrera->saveOrFail();
        return redirect('carreras');
    }

    
    public function show($id)
    {
        //
        
    }

    
    public function edit($id)
    {
        //
        $carrera = Carreras::find($id);
        return view('carreras.edit', compact('carrera'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'carrera' => 'required'
        ]);
        //
        $carrera = Carreras::find($id);
        $carrera->fill($request->input())->saveOrFail();
        return redirect('carreras');
    }

    
    public function destroy($id)
    {
        //
        $carrera = Carreras::find($id);
        $carrera->delete();
        return redirect('carreras');
    }
}
