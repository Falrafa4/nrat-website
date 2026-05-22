<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddonDependency extends Model
{
    protected $fillable = ['addon_id', 'name', 'description', 'url', 'source_name', 'is_required', 'sort_order'];

    public function addon()
    {
        return $this->belongsTo(Addon::class);
    }
}
