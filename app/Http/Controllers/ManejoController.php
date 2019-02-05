<?php

namespace App\Http\Controllers;

use App\Models\Manejo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManejoController extends Controller
{
    protected function validator($method, array $data)
    {
        dd($method);
        switch ($method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return Validator::make($data, [
                        'nome' => ['required', 'string', 'max:255'],
                    ]);
                }
            case 'PUT':
            case 'PATCH':
                {
                    return Validator::make($data, [
                        'nome' => ['required', 'string', 'max:255'],
                    ]);
                }
            default:break;
        }

/*         return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
        ]); */
    }

    public function index()
    {
        $manejos = Manejo::all();

        return response()->json([
            'status' => 'success',
            'message' => $manejos,
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

        $manejo = Manejo::create($data);
            
        return response()->json([
            'status' => 'success',
            'message' => $manejo,
        ], 200);
    }

    public function show($id)
    {
        if (!$manejo = Manejo::find($id)) {
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
        if (!$manejo = Manejo::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Manejo não encontrado',
            ], 404);
        }
dd($request);
        $data = $request->all();

        $v = $this->validator($request->method, $data);
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

    public function destroy(Manejo $manejo)
    {
        //
    }
}
