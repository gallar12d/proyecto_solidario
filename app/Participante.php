<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    //
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'telefono1', 'telefono2', 'direccion', 'identificacion', 'fecha_ingreso'];

    public function izq()
    {
        return $this->hasOne('App\Participante', 'id', 'id_usuario_izquierda');
    }
    public function der()
    {
        return $this->hasOne('App\Participante', 'id', 'id_usuario_derecha');
    }


    public function padre_der()

    {
        return $this->belongsTo('App\Participante', 'id', 'id_usuario_derecha');
    }

    public function padre_izq()

    {
        return $this->belongsTo('App\Participante', 'id', 'id_usuario_izquierda');
    }

}
