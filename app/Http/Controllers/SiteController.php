<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variedade;

class SiteController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $variedades = Variedade::get();
        return view('index', compact('variedades'));
    }
}
