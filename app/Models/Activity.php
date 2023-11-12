<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_tiket',
        'halte_awal_id',
        'halte_akhir_id',
        'problem',
        'root_cause',
        'helptopic_id',
        'action',
        'status',
        'assign_to',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id')->withDefault(); //ini menampilkan default
    }

    public function busstopAwal()
    {
        return $this->belongsTo(BusStop::class, 'halte_awal_id', 'id')->withDefault(); //ini menampilkan default
    }

    public function busstopAkhir()
    {
        return $this->belongsTo(BusStop::class, 'halte_akhir_id', 'id')->withDefault(); //ini menampilkan default
    }

    public function helpTopic()
    {
        return $this->belongsTo(HelpTopic::class, 'helptopic_id', 'id')->withDefault(); //ini menampilkan default
    }
}
