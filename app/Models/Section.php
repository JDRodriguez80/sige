<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['nombre'];

    public function school()
    {
        return $this->belongsTo(School::class, 'id_school');
    }
    public function groups()
    {
        return $this->hasMany(Group::class, 'id_section');
    }
}
