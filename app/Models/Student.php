<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
        'grupo_id',
        'guardian_id',
    ];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
