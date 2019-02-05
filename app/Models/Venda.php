<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = "venda";

    protected $fillable = array('demanda_id','plantio_id','quantidade');

    public function variedade()
    {
        return $this->belongsTo("App\Models\Venda");
    }
}
