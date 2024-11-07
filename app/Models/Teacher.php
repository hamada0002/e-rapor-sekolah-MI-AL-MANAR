<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'position',
        'class',
    ];

    // Relasi dengan murid
    public function students()
    {
        return $this->hasMany(Student::class, 'class', 'class');
    }
}
