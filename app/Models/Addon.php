<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'thumbnail',
        'download_url',
        'source_name',
        'file_size',
        'addon_type',
        'status',
        'is_featured',
        'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function addonImages()
    {
        return $this->hasMany(AddonImage::class);
    }

    public function addonDependencies()
    {
        return $this->hasMany(AddonDependency::class);
    }

    public function downloadLogs()
    {
        return $this->hasMany(DownloadLog::class);
    }
}
