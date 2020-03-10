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
    public function participante_update_date(Request $request){
        $id = $request->id;
        $participante = \App\Participante::find($id);
        $participante->fecha_ingreso = $request->fecha_ingreso;
        $suma = date('Y-m-d', strtotime($request->fecha_ingreso. ' + 8 days'));
        $participante->fecha_pago = $suma; 
        $participante->save();

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

            $id = $flight->id;
            $participante = \App\Participante::find($id);
            $participante->name = trim(strtoupper($participante->name));
            $participante->fecha_ingreso = date('Y-m-d');
            $suma = date('Y-m-d', strtotime(date('Y-m-d'). ' + 8 days'));
            $participante->fecha_pago = $suma; 
            $participante->save();
            return redirect()->route('participantes_create');
        }
    }
    public function participante_search_name(Request $request){

        $participantes = \App\Participante::where('name', 'LIKE', '%'.strtoupper($request->valor).'%')->get();
        return response()
            ->json(['participantes' => $participantes]);



    }

    public function participante_search(Request $request){

        $participante = NULL;
       

        if($request->input('identificacion')){
            
            $participante = \App\Participante::where('identificacion', $request->input('identificacion') )->first();
        }

        return view('participantes.search', compact('participante'));

    }
    public function post_referir_participante(Request $request){
        $id_old = $request->input('id_old');
        $id_new = $request->input('id_new');
        $lado = $request->input('lado');

        $old_participante =  \App\Participante::find($id_old);
        if($lado == 1){
            //va por izq
            $old_participante->id_usuario_izquierda = $id_new;
            $old_participante->save();

        }
        else{
            $old_participante->id_usuario_derecha = $id_new;
            $old_participante->save();

        }

        return response()
            ->json(['code' => 202]);

        

        


    }

    public function post_search_participante(Request $request){
        $participante = \App\Participante::where('identificacion', $request->input('identificacion'))->first();
        
        if($participante){
            return response()
            ->json(['code' => 202, 'participante' => $participante]);

        }
        else{
            return response()
            ->json(['code' => 404]);

        }
        
        

    }

        
        
       

    }

