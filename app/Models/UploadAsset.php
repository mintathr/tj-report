<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'user_id',
        'folder',
        'filename',
    ];
}
