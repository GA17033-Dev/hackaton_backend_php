<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioRoles extends Model
{
    protected $table = 'roles_usuario';

    protected $primaryKey = 'id';

    public $timestamps = false;

}