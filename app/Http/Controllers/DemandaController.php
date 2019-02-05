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
        $data['user_id'] = 1;
        $demanda = Demanda::create($data);
        $demanda = Demanda::with('user', 'variedade')->find($demanda->id);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.wassenger.com/v1/messages",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"phone\":\"+5544999631273\",\"message\":\"CooperVenda informa: Coperativa ".$demanda->user->name." solicita demanda de ".$demanda->variedade->nome.". Acesse o aplicativo e fique por dentro! #coopervenda\"}",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/json",
            "token: dd432d1f947a1bbe1d601d71e7594fa4e35aa3bb0bc65d608d2c0cc95ce1977973e79b802f206f80"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        //echo "cURL Error #:" . $err;
        } else {
        //echo $response;
        }
                  
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
