<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nim', 'nama', 'alamat', 'telepon', 'gender', 'program_studi'];

    // Convert the 'program_studi' attribute to/from JSON when accessing the database
    protected $casts = [
        'program_studi' => 'json',
    ];
}
