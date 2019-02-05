<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
        ]); 
    }

    public function index()
    {
        $enderecos = Endereco::all();

        return response()->json([
            'status' => 'success',
            'message' => $enderecos,
        ], 200);  
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $v = $this->validator($data);
        if ($v->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $v->errors(),
            ], 404);
        }

        $endereco = Endereco::create($data);
            
        return response()->json([
            'status' => 'success',
            'message' => $endereco,
        ], 200);
    }

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
    }
}
