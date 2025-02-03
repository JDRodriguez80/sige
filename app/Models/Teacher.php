<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'nombres',
        'primer_apellido',
        'segundo_apellido',
        'curp',
        'telefono',
        'email',
        'direccion',
        'fecha_nacimiento',
        'sexo',
        'observaciones',
        'foto',
    ];

    public function groups()
    {
        return $this->belongsTo(Group::class);
    }
}
