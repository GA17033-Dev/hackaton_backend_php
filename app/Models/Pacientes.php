<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table = 'Pacientes';
    protected $primaryKey = 'idpaciente';
    //timestamps
    public $timestamps = true;
}
