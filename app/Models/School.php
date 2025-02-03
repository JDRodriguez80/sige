<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['nombre'];

    public function sections()
    {
        return $this->hasMany(Section::class, 'id_school')->onDelete('cascade')->onUpdate('cascade');
    }
}
