<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'telepon', 'lahir', 'gender', 'agama_id'];

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function tabungans()
    {
        return $this->hasMany(Tabungan::class, 'nasabah_id');
    }
}
