<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManejoPlantio extends Model
{
    protected $table = "manejos_plantio";

    protected $fillable = array("manejo_id", "plantio_id", "data");
}
