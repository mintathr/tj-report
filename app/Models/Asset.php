<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_tiket',
        'user_id',
        'halte_id',
        'nama_barang',
        'kondisi',
        'serial_number',
        'status',
        'nik_petugas_halte',
        'nama_petugas_halte',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id')->withDefault(); //ini menampilkan default
    }

    public function halteId()
    {
        return $this->belongsTo(BusStop::class, 'halte_id', 'id')->withDefault(); //ini menampilkan default
    }
}
