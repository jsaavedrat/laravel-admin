<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Paises;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       // abort_if(Gate::denies('user_index'), 403);
       $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $paises = Paises::paginate(300);
        return view('users.create', compact('paises'));
    }
    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'id_estado' => 'required',
            'password' => 'required|min:8'
        ]);
        
        
        User::create($request->only('name', 'email', 'status', 'id_estado')
            + [
                'password' => bcrypt($request->input('password')), 
            ]);

       // $roles = $request->input('roles', []);
       // $user->syncRoles($roles);
       // return redirect()->back();
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');;
       // return redirect()->route('users.show', $user->id)
    }

    public function show(User $user)
    {
        // abort_if(Gate::denies('user_show'), 403);
       // $user = User::findOrFail($id);
        // // dd($user);
        // $user->load('roles');
        
        $estado = Estados::where('id', $user->id_estado)->first();
        $currentpais = Paises::where('id', $estado->id_pais)->first();  
        return view('users.show', compact('user', 'estado', 'currentpais'));
    }

    public function edit(User $user)
    {
       // abort_if(Gate::denies('user_edit'), 403);
       // $roles = Role::all()->pluck('name', 'id');
       // $user->load('roles');
        //return view('users.edit', compact('user', 'roles'));
        
        $paises = Paises::paginate(300);
        $estado = Estados::where('id', $user->id_estado)->first();
        $currentpais = Paises::where('id', $estado->id_pais)->first();  
        return view('users.edit', compact('user', 'paises', 'currentpais'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'id_estado' => 'required',
            'password' => 'sometimes'
        ]);
        
        // $user=User::findOrFail($id);
        $data = $request->only('name', 'status', 'email', 'id_estado');
        //dd($data);
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        // if(trim($request->password)=='')
        // {
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }

        $user->update($data);

      //  $roles = $request->input('roles', []);
      //  $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        // abort_if(Gate::denies('user_destroy'), 403);

        // if (auth()->user()->id == $user->id) {
        //     return redirect()->route('users.index');
        // }

        $user->delete();
        return back()->with('succes', 'Usuario eliminado correctamente');
    }

}
