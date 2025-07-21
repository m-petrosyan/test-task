<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Participant extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $fillable = [
        'name',
        'url',
        'location',
    ];

    protected $casts = [
        'location' => 'array',
    ];

    protected $appends = [
        'logo',
    ];

    public function getLogoAttribute(): string
    {
        return $this->getFirstMediaUrl('logo');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('media_files');
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class);
    }
}
