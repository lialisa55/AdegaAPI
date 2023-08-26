<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        //
        $dadosBebidas = Bebida::all();
        $contador = $dadosBebidas->count();

        return 'Bebidas: '.Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosBebidas = $request->all();

        $valida = Validator::make($dadosBebidas, [
            'nomeBebida' => 'required',
            'marcaBebida' => 'required'
        ]);

        if ($valida->fails()){
            return 'Dados inválidos'.$valida->erros(true). 500;                      
        }

        $bebidasBanco = Bebidas::create($valida);

        if($bebidasBanco){
            return 'Bebidas cadastradas'.Response()->json([], Response::HTTP_NO_CONTENT);
        }else{
            return 'Bebidas não cadastradas'.Response()->json([], Response::HTTP_NO_CONTENT);;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
    }
}
