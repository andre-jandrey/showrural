<?php

namespace App\Http\Controllers;

use App\Models\Demanda;
use App\Models\Variedade;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class DemandaController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'data' => ['required', 'date'],
            'quantidade' => ['required', 'integer'],
            'valor' => ['required'],
            'variedade_id' => ['required'],
            'user_id' => ['required'],
        ]); 
    }

    public function index()
    {
        $demandas = Demanda::with('variedade')->get();

        foreach($demandas as $demanda){
            $vendas = Venda::where('demanda_id', $demanda->id)->sum('quantidade');
            $qtde_final = $demanda->quantidade - $vendas;
            $demanda['qtde_final'] = $qtde_final;
        }
        return response()->json([
            'status' => 'success',
            'message' => $demandas,
        ], 200);  
    }

    public function create()
    {
        $variedades = Variedade::get();
        return view('demanda.create', compact('variedades'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $v = $this->validator($data);
        if ($v->fails()){
            return back()->withErrors($v->messages());
        }
        
        $demanda = Demanda::create($data);
            
        return redirect('/')->with('message', 'Demanda cadastrada com sucesso!');
    }

    public function show($id)
    {
        if (!$manejo = Demanda::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Manejo não encontrado',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => $manejo,
        ], 200);  
    }
   
    public function update(Request $request, $id)
    {
        if (!$manejo = Demanda::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Manejo não encontrado',
            ], 404);
        }

        $data = $request->all();

        $v = $this->validator($data);
        if ($v->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $v->errors(),
            ], 404);
        }

        $manejo->update($data);
            
        return response()->json([
            'status' => 'success',
            'message' => $manejo,
        ], 200);
    }

    public function destroy($id)
    {
        if (!$manejo = Demanda::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Manejo não encontrado',
            ], 404);
        }

        $manejo->delete();

        return response()->json([
            'status' => 'success',
            'message' => $manejo,
        ], 200);
    }
}
