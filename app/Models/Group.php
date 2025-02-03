<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'description'];

    public function section()
    {
        $this->belongsTo(Section::class);
    }
    public function teachers()
    {
        $this->belongsTo(Teacher::class);
    }
    public function students()
    {
        $this->hasMany(Student::class);
    }
}
