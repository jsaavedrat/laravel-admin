<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Paises;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $estados = Estados::count();
        $paises = Paises::count();
        $users = User::count(); 
        return view('home', compact('estados', 'paises', 'users'));
    }
}
