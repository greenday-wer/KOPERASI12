<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenistransaksi extends Model
{
    use HasFactory;
    protected $fillable = ['jenistransaksi', 'operator'];
    public function tabungan()
    {
        return $this->hasMany(Tabungan::class, 'jenistransaksi_id');
    }
    
}
