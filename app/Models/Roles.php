<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'Roles';
    protected $primaryKey = 'idrol';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    protected $hidden = [
        'idrol',
    ];

    public function usuarios()
    {
         return $this->hasOne('App\Models\User', 'idrol', 'idrol');
    }
}
