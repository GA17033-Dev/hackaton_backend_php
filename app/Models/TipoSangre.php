<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSangre extends Model
{
    protected $table = 'tipo_sangre';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
