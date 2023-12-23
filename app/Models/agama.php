<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $fillable = ['agama'];

    public function nasabahs()
    {
        return $this->hasMany(Nasabah::class, 'agama_id');
    }
}
