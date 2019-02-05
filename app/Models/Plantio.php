<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plantio extends Model
{
    protected $fillable = array('quantidade','inicio','fim','tipo', 'variedade_id','endereco_id');

    public function variedade()
    {
        return $this->belongsTo("App\Models\Variedade");
    }

    public function endereco()
    {
        return $this->belongsTo("App\Models\Endereco");
    }
}
