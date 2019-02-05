<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    protected $table = "demanda";

    protected $fillable = ['data', 'quantidade', 'valor', 'variedade_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function vendas()
    {
        return $this->hasMany("App\Models\Venda");
    }

}
