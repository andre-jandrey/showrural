<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variedade extends Model
{
    protected $table = "variedade";

    protected $fillable = ['nome', 'ciclo'];

    public function plantios()
    {
        return $this->hasMany("App\Models\Plantio");
    }
}
