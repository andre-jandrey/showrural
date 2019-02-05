<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extrato extends Model
{
    protected $table = "extrato";

    protected $fillable = array('user_id', 'valor', 'data', 'cooperativa_id', 'descricao');

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
}
