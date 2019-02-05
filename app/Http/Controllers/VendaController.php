<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Demanda; 
use App\Models\Extrato; 
use App\Models\Plantio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    protected function validator($method, array $data)
    {
        if($method == 'POST'){
            return Validator::make($data, [
                'demanda_id' => ['required', 'integer'],
                'plantio_id' => ['required', 'integer'],
                'quantidade' => ['required', 'integer'],
            ]); 
        }

        if($method == 'PUT'){
            return Validator::make($data, [
                'demanda_id' => ['integer'],
                'plantio_id' => ['integer'],
                'quantidade' => ['integer'],
            ]); 
        }
        
        return [];
    }

    public function index()
    {
        $vendas = Venda::all();

        return response()->json([
            'status' => 'success',
            'message' => $vendas,
        ], 200);  
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $v = $this->validator('POST', $data);
        if ($v->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $v->errors(),
            ], 404);
        }

        if (!$demanda = Demanda::find($data['demanda_id'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Demanda não encontrada',
            ], 404);
        } 
        $Quantidade_demanda = $demanda->quantidade; 

        //selecionar todas as vendas para a demanda atual e subtrair do total da demanda
        $Quantidade_vendida = Venda::where('demanda_id', $data['demanda_id'])->sum('quantidade');
        $saldo  = $Quantidade_demanda - $Quantidade_vendida;
        
        //quantidade informada nao pode ser maior que restante da demanda
        if ($data['quantidade'] > ($saldo)){
            return response()->json([
                'status' => 'error',
                'message' => 'Demanda insuficiente. Máximo disponível '.$saldo,
            ], 400);
        }

 
        //quantidade informada nao pode ultrapassar soma das vendas do produtor para um plantio
        if (!$plantio = Plantio::find($data['plantio_id'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Plantio não encontrado',
            ], 404);
        }

        $Quantidade_vendida = Venda::where('plantio_id', $data['plantio_id'])->sum('quantidade');
        $Quantidade_plantada = $plantio->quantidade;

        $saldo  = $Quantidade_plantada - $Quantidade_vendida;
        if ($data['quantidade'] > ($saldo)){
            return response()->json([
                'status' => 'error',
                'message' => 'Saldo insuficiente. Máximo disponível '.$saldo,
            ], 400);
        }

        $venda = Venda::create($data);

        $total = $demanda->valor * $venda->quantidade;
        
       
        $extrato = [
            'user_id' => '1', 
            'valor' => $total, 
            'data' => $venda->created_at, 
            'cooperativa_id' => $demanda->user_id, 
            'descricao' => $demanda->variedade->nome
        ];
        //dd($extrato);

        Extrato::create($extrato);       
        
        return response()->json([
            'status' => 'success',
            'message' => $venda,
        ], 200);
    }

    public function show($id)
    {
        if (!$venda = Venda::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Venda não encontrada',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => $plantio,
        ], 200);  
    }

    public function update(Request $request, $id)
    {
        if (!$venda = Venda::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Venda não encontrada',
            ], 404);
        }

        $data = $request->all();

        $v = $this->validator('PUT', $data);
        if ($v->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $v->errors(),
            ], 404);
        }

        if (!$demanda = Demanda::find($data['demanda_id'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Demanda não encontrada',
            ], 404);
        }

        if (!$plantio = Plantio::find($data['plantio_id'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Plantio não encontrado',
            ], 404);
        }

        $venda->update($data);
            
        return response()->json([
            'status' => 'success',
            'message' => $venda,
        ], 200);
    }

    public function destroy(Venda $venda)
    {
        if (!$venda = Venda::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Venda não encontrada',
            ], 404);
        }
      
        $venda->delete();
            
        return response()->json([
            'status' => 'success',
            'message' => $venda,
        ], 200);
    }
}
