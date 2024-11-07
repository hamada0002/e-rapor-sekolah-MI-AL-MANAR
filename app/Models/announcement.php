<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    // Izinkan mass assignment untuk field tertentu
    protected $fillable = ['title', 'content'];
}
