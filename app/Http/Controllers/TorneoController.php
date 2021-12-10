<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $listamaterias=Torneo::all();
        return response()->json($listamaterias);
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
     * @return \Illuminate\Http\JsonResponse
     * Estado --> Creado, Registro abierto, iniciado, finalizado
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->json()->all(),[
            "nombre"=> ['required','string'],
            "nombreJuego"=> ['required','string'],
            "fechaInicio"=> ['required','date'],
            "fecahFin"=> ['required', 'date'],
            "estado"=> ['required','string'],
            "puntuacionVictoria"=> ['required', 'integer'],
            "puntuacionDerrota"=> ['required', 'integer'],
            "puntuacionEmpate"=> ['required', 'integer'],
            "modalidad"=> ['required', 'integer'],
            "creador_id"=> ['required', 'integer'],
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), Response::HTTP_BAD_REQUEST);
        }
        $Torneo=new Torneo($request->json()->all());
        $Torneo->save();
        return response()->json($Torneo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Torneo  $Torneo
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $Torneo =Torneo::find($id);
        if($Torneo==null){
            return response()->json(array("message"=> "Item not found"), Response::HTTP_NOT_FOUND);
        }
        return response()->json($Torneo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Torneo  $Torneo
     * @return \Illuminate\Http\Response
     */
    public function edit(Torneo $Torneo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Torneo  $Torneo
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $Torneo =Torneo::find($id);
        if($Torneo==null){
            return response()->json(array("message"=> "Item not found"), Response::HTTP_NOT_FOUND);
        }
        if($request->method()=='PUT'){
            $validator = Validator::make($request->json()->all(),[
                "nombre"=> ['required','string'],
                "nombreJuego"=> ['required','string'],
                "fechaInicio"=> ['required','string'],
                "fecahFin"=> ['required', 'date'],
                "estado"=> ['required','string'],
                "puntuacionVictoria"=> ['required', 'integer'],
                "puntuacionDerrota"=> ['required', 'integer'],
                "puntuacionEmpate"=> ['required', 'integer'],
                "creador_id"=> ['required', 'creador_id'],
            ]);
        }else{
            $validator = Validator::make($request->json()->all(),[
                "nombre"=> ['required','string'],
                "nombreJuego"=> ['required','string'],
                "fechaInicio"=> ['required','string'],
                "fecahFin"=> ['required', 'date'],
                "estado"=> ['required','string'],
                "puntuacionVictoria"=> ['required', 'integer'],
                "puntuacionDerrota"=> ['required', 'integer'],
                "puntuacionEmpate"=> ['required', 'integer'],
                "creador_id"=> ['required', 'creador_id'],
            ]);
        }
        if($validator->fails()){
            return response()->json($validator->messages(),Response::HTTP_BAD_REQUEST);
        }
        $Torneo->fill($request->json()->all());
        $Torneo->save();
        return response()->json($Torneo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Torneo  $Torneo
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $Torneo =Torneo::find($id);
        if($Torneo==null){
            return response()->json(array("message"=> "Item not found"), Response::HTTP_NOT_FOUND);
        }
        $Torneo->delete();
        return response()->json(['success'=>true]);
    }
}
