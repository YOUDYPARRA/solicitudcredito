<?php

namespace App\Http\Controllers;

use App\Models\Solicitante;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SolicitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // Log::debug("Solicitante");
        if(!empty($request->all())){
            // dd($request->buscar);

            $solicitantes=Solicitante::buscar($request->buscar)->get();
        }else{
            $solicitantes=Solicitante::all();

        }
        // dd($solicitantes);
        return Inertia::render('Solicitantes',['solicitantes'=>$solicitantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombres'=>'required | max:10 | min:2',
            'apellidos'=>'required | max:10 | min 3',
            'domicilio'=>'required | max:25 | min 3',
            'monto'=>'required | max:10 | min 3',
            'curp'=>'required max:18| min:18',
            'rfc'=>'required max:13| min:13',
            'nss'=>'required max:10| min:10',
            'habilitado'=>'required| min:5'
        ]);
        solicitante::create([
            'nombres'=>$request->nombres,
            'apellidos'=>$request->apellidos,
            'domicilio'=>$request->domicilio,
            'monto'=>$request->monto,
            'curp'=>$request->curp,
            'rfc'=>$request->rfc,
            'nss'=>$request->nss,
            'habilitado'=>$request->habilitado,
        ]);
        return redirect()->back()->with('message', 'Elemento Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitante  $solicitante
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitante $solicitante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitante  $solicitante
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitante $solicitante)
    {
        //
        $solicitante->habilitado=$request->habilitado;
        $solicitante->save();
        return redirect()->back()->with('message', 'Se ha habilitado/deshabilitado el solicitante');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitante  $solicitante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitante $solicitante)
    {
        //
        // dd($request->nombres);
        $request->validate([
            'nombres'=>'required  | min:2',
            'apellidos'=>'required | min: 3',
            'domicilio'=>'required | max:205 | min: 3',
            'monto'=>'required | max:4 | min: 3',
            'curp'=>'required |max:13| min:13',
            'rfc'=>'required |max:18| min:18',
            'nss'=>'required|min:5',
            'habilitado'=>'required'
            ]);

            $solicitante->nombres=$request->nombres;
            // dd($solicitante->nombres);
            $solicitante->apellidos=$request->apellidos;
            $solicitante->domicilio=$request->domicilio;
            $solicitante->monto=$request->monto;
            $solicitante->curp=$request->curp;
            $solicitante->rfc=$request->rfc;
            $solicitante->nss=$request->nss;
            $solicitante->save();
            $solicitantes=Solicitante::where('id','>')->get();
            return redirect()->back()->with('message', 'Se ha Eliminado solicitante');
            // dd($request->nombres);
            
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitante  $solicitante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitante $solicitante)
    {
        //
        $solicitante->delete();
        // $solicitante->save();
        return redirect()->back()->with('message', 'Se ha Eliminado solicitante');
    }
}
