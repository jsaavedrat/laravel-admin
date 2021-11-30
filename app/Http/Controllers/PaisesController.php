<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Paises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // abort_if(Gate::denies('user_index'), 403);
        $paises = Paises::paginate(5);
        return view('paises.index', compact('paises'));
    }
    public function estados(Request $request)
    {
        $cid = $request->post('cid');
        $state = DB::table('estados')->where('id_pais', $cid)->orderBy('estado', 'asc')->get();
        /* $html = '<option value="">Select State</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->estado . '</option>';
        }
        echo $html; */
        
        return response()->json($state);
    }
    public function states(Request $request)
    {
       

        if ($request->ajax()) {
            $states = Estados::where('id_pais', $request->id_pais)->orderBy('estado', 'asc')->get(); 
            foreach ($states as $state) {
                $statesArray[$state->id] = $state->estado;
            }
            return response()->json($statesArray);
        }
        
    }
    public function getCareers(Request $request)
    {
       

        if ($request->ajax()) {
            $states = Estados::where('id_pais', $request->id_pais)->orderBy('estado', 'asc')->get(); 
            foreach ($states as $state) {
                $statesArray[$state->id] = $state->estado;
            }
            return response()->json($statesArray);
        }
        
    }
    public function create()
    {
        return view('paises.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'pais' => 'required|unique:paises',
            'activo_pais' => 'required',
            'borrado_pais' => 'required'
        ]);
        Paises::create($request->all());
        return redirect()->route('paises.index')->with('success', 'Pais creado correctamente');
    }

    public function show(Paises $pais)
    {
        return view('paises.show', compact('pais'));
    }

    public function edit(Paises $pais)
    {
        return view('paises.edit', compact('pais'));
    }

    public function update(Request $request, Paises $pais)
    {
         $request->validate([
            'pais' => 'required',
            'activo_pais' => 'required',
            'borrado_pais' => 'required'
        ]);

        $data = $request->all();
        $pais->update($data);
        return redirect()->back()->with('success', 'Pais actualizado correctamente');
    }

    public function destroy(Paises $pais)
    {
        $pais->delete();
        return back()->with('succes', 'Pais eliminado correctamente');
    }
}
