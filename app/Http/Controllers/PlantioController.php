<?php

namespace App\Http\Controllers;

use App\Models\Plantio;
use App\Models\Variedade;
use App\Models\Endereco;
use App\Models\ManejoPlantio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlantioController extends Controller
{
    protected $manejoRules = [
        'plantio_id' => 'required|integer',
        'manejo_id' => 'required|integer',
        'data' => 'required|date',
    ];

    protected function validator($method, array $data)
    {
        if($method == 'POST'){
            return Validator::make($data, [
                'variedade_id' => ['required', 'integer'],
                'endereco_id' => ['required', 'integer'],
                'quantidade' => ['required', 'integer'],
                'inicio' => ['required', 'string', 'max:255'],
                'fim' => ['required', 'date'],
                'tipo' => ['required', 'integer'],
            ]); 
        }

        if($method == 'PUT'){
            return Validator::make($data, [
                'variedade_id' => ['integer'],
                'endereco_id' => ['integer'],
                'quantidade' => ['integer'],
                'inicio' => ['string', 'max:255'],
                'fim' => ['date'],
                'tipo' => ['integer'],
            ]); 
        }
        
        return [];
    }

    public function index()
    {
        $plantios = Plantio::with('variedade')->get();

        return response()->json([
            'status' => 'success',
            'message' => $plantios,
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

        if (!$variedade = Variedade::find($data['variedade_id'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Variedade não encontrada',
            ], 404);
        }

        if (!$endereco = Endereco::find($data['endereco_id'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Endereço não encontrado',
            ], 404);
        }

        $plantio = Plantio::create($data);
            
        return response()->json([
            'status' => 'success',
            'message' => $plantio,
        ], 200);
    }

    public function show($id)
    {
        if (!$plantio = Plantio::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Plantio não encontrado',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => $plantio,
        ], 200);  
    }

    public function update(Request $request, $id)
    {
        if (!$plantio = Plantio::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Plantio não encontrado',
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

        if (!$variedade = Variedade::find($data['variedade_id'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Variedade não encontrada',
            ], 404);
        }

        if (!$endereco = Endereco::find($data['endereco_id'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Endereço não encontrado',
            ], 404);
        }

        $plantio->update($data);
            
        return response()->json([
            'status' => 'success',
            'message' => $plantio,
        ], 200);
    }

    public function destroy($id)
    {
        if (!$plantio = Plantio::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Plantio não encontrado',
            ], 404);
        }
      
        $plantio->delete();
            
        return response()->json([
            'status' => 'success',
            'message' => $plantio,
        ], 200);
    }


    public function manejo(Request $request)
    {
        $validation = Validator::make($request->all(), $this->manejoRules);
        
        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validation->errors(),
            ], 404);
        }

        $data = $request->all();
        if (!$plantio = Plantio::find($data['plantio_id'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Plantio não encontrado',
            ], 404);
        }

        $manejo = ManejoPlantio::create($data);
        
        return response()->json([
            'status' => 'success',
            'message' => $manejo,
        ], 200);

        //$plantio->manejos->sync($request->input('manejo_id'));
        //$plantio->attach(['plantio_id' => $data['plantio_id']], ['manejo_id' => $data['manejo_id']], ['data' => $data['data']]);
    }
}
