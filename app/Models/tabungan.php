<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabungan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nasabah_id', 'jenistransaksi_id', 'nominal', 'keterangan', 'user_id'];
    public function jenistransaksi()
    {
        return $this->belongsTo(jenistransaksi::class, 'jenistransaksi_id');
    }

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
