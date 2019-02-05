<?php

namespace App\Http\Controllers;

use App\Models\Variedade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VariedadeController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
        ]); 
    }

    public function index()
    {
        $variedades = Variedade::all();

        return response()->json([
            'status' => 'success',
            'message' => $variedades,
        ], 200);  
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $v = $this->validator($data);
        if ($v->fails()){
            return back()->withErrors($v->messages());
        }

        $variedade = Variedade::create($data);
            
        return redirect('/')->with('message', 'Variedade cadastrada com sucesso!');
    }
/*
    public function show($id)
    {
        if (!$endereco = Endereco::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Endereco não encontrado',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => $endereco,
        ], 200);  
    }

   
    public function update(Request $request, $id)
    {
        if (!$endereco = Endereco::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Endereco não encontrado',
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

        $endereco->update($data);
            
        return response()->json([
            'status' => 'success',
            'message' => $endereco,
        ], 200);
    }

    public function destroy($id)
    {
        if (!$endereco = Endereco::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Endereco não encontrado',
            ], 404);
        }

        $endereco->delete();

        return response()->json([
            'status' => 'success',
            'message' => $endereco,
        ], 200);
    }*/
}
