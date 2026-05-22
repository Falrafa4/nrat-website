<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddonImage extends Model
{
    protected $fillable = ['addon_id', 'image_path', 'caption', 'sort_order'];

    public function addon()
    {
        return $this->belongsTo(Addon::class);
    }
}
