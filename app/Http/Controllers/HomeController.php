<?php

namespace App\Http\Controllers;

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
        return view('home');
    }
    public function participantes()
    {
        return view('participantes.list');
    }
    public function participantesCreate()
    {
        return view('participantes.create');
    }

    public function postParticipantesCreate(Request $request){

        // $flights = \App\Participante::all();
        // return $flights;

        //ver si existe el usuario
        $participante_existe = \App\Participante::where('identificacion', $request->input('identificacion'))->first();
        if ($participante_existe) {
            echo '<h3>El participante con identificacion: '.$request->input('identificacion').' ya existe en el sistema!</h3>';
        } else {
            $flight = \App\Participante::create($request->all());
            return redirect()->route('participantes_create');
        }
    }

    public function participante_search(Request $request){

        $participante = NULL;
       

        if($request->input('identificacion')){
            
            $participante = \App\Participante::where('identificacion', $request->input('identificacion') )->first();
        }

        return view('participantes.search', compact('participante'));

    }

        
        
       

    }

