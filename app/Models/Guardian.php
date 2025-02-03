<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = [
        'nombres',
        'primer_apellido',
        'segundo_apellido',
        'curp',
        'telefono',
        'email',
        'direccion',
        'ocupacion',
        'escolaridad',
    ];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
