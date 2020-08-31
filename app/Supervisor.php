<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    //
    protected $fillable = [
        'clave', 'nombre', 'salario', 'departament_id'
    ];
}
