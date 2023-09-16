<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bebida;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Http\Controllers;


class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosBedidas = Bebida::All();
        $contador = $dadosBedidas->count();

        return 'Bebidas: '.$contador.  $dadosBedidas. Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosBedidas = $request->All();

        $valida = Validator::make($dadosBedidas, [
            'nomeBebida'=> 'required',
            'marcaBebida'=> 'required',
        ]);

        if($valida->fails()){
            return 'Dados inválidos'.$valida->errors(true). 500;
        }
            $bebidasBanco = Bebida::create($dadosBedidas);
        if($bebidasBanco){
            return 'Bebidas cadastradas '.Response()->json([], Response::HTTP_NO_CONTENT); 
        }else{
            return 'Bebidas não cadastradas '.Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bebidasBanco = Bebida::find($id);
        $contador = $bebidasBanco->count();

        if($bebidasBanco){
            return 'Bebidas  encontradas: '.$contador.' - '.$bebidasBanco.response()->json([],Response::HTTP_NO_CONTENT); 
        }else{
            return 'Bebidas Não localizadas.'.response()->json([],Response::HTTP_NO_CONTENT); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bebidasDados = $request->All();
        $valida = Validator::make($bebidasDados,[
            'nomeBebida' => 'required',
            'marcaBebida' => 'required'
        ]);

        if($valida->fails()){
            return 'Dados incompletos '.$valida->errors(true). 500;
        }

        $bebidasBanco = Bebida::find($id);
        $bebidasBanco->nomeBebida = $bebidasDados['nomeBebida'];
        $bebidasBanco->marcaBebida = $bebidasDados['marcaBebida'];

        $RegistrosBebidas = $bebidasBanco->save();
        if($RegistrosBebidas){
            return 'Dados alterados com sucesso.'.Response()->json([], Response::HTTP_NO_CONTENT); ;
        }else{  
            return 'Dados não alterados no banco de dados'.Response()->json([], Response::HTTP_NO_CONTENT); ;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bebidasBanco = Bebida::find($id);
        if($bebidasBanco){
            $bebidasBanco->delete();
            return 'A Bebida foi deletada com sucesso.'.response()->json([],Response::HTTP_NO_CONTENT); 
        }else{
            return 'A Bebida Não foi deletada com sucesso.'.response()->json([],Response::HTTP_NO_CONTENT); 
        }
    }
}
