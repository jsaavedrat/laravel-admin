<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Paises;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       // abort_if(Gate::denies('user_index'), 403);
       $estados = Estados::paginate(5);
        return view('estados.index', compact('estados'));
    }

    public function create()
    {
        $paises = Paises::paginate(300);
        return view('estados.create', compact('paises'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required',
            'activo_estado' => 'required',
            'id_pais' => 'required',
            'borrado_estado' => 'required'
        ]);
        Estados::create($request->all());
        return redirect()->route('estados.index')->with('success', 'Estado creado correctamente'); 
    }

    public function show(Estados $estado)
    { 
        return view('estados.show', compact('estado'));
    }

    public function edit(Estados $estado)
    { 
        return view('estados.edit', compact('estado'));
    }

    public function update(Request $request, Estados $estado)
    { 
        $request->validate([
            'estado' => 'required',
            'activo_estado' => 'required',
            'id_pais' => 'required',
            'borrado_estado' => 'required'
        ]);
        $data = $request->all(); 
        $estado->update($data);
        return redirect()->back()->with('success', 'Estado actualizado correctamente');
    }

    public function destroy(Estados $estado)
    { 
        $estado->delete();
        return back()->with('succes', 'Estado eliminado correctamente');
    }

}
