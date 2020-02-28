<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    //
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'telefono1', 'telefono2', 'direccion', 'identificacion'];

}
