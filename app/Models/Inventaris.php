<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'halte_id',
        'serial_number',
        'status',
        'user_id',
        'item_id',
        'brand_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id')->withDefault(); //ini menampilkan default
    }

    public function halteId()
    {
        return $this->belongsTo(BusStop::class, 'halte_id', 'id')->withDefault(); //ini menampilkan default
    }

    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id', 'id')->withDefault(); //ini menampilkan default
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id')->withDefault(); //ini menampilkan default
    }
    
}
