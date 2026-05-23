<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadLog extends Model
{
    protected $fillable = [
        'addon_id',
        'source',
        'ip_address',
        'user_agent',
    ];

    public function addon()
    {
        return $this->belongsTo(Addon::class);
    }
}
