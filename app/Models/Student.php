<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'religion', 'class', 'nis', 'wali_kelas'];

    public function grades()
    {
        return $this->hasOne(Grade::class);
    }

    // Relasi ke wali kelas (guru)
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'class', 'class');
    }
}
