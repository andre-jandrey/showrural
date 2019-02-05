<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "endereco";

    protected $fillable = array('nome', 'user_id');

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function plantio()
    {
        return $this->hasMany("App\Models\Plantio");
    }
}
