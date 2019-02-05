<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extrato;

class ExtratoController extends Controller
{
    public function saldo()
    {
        $saldo = Extrato::where('user_id', '1')->sum('valor');

        return response()->json([
            'status' => 'success',
            'message' => $saldo,
        ], 200);  
    }
}
