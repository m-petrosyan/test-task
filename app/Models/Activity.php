<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

class Activity extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $fillable = [
        'activity_type_id',
        'title',
        'activity_dates',
        'location',
        'description',
        'short_description',
    ];

    protected $casts = [
        'activity_dates' => 'array',
        'location' => 'array',
    ];

    protected $appends = [
        'files',
    ];

    public function activityType(): BelongsTo
    {
        return $this->belongsTo(ActivityType::class);
    }

    public function participant(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class);
    }

    public function getFilesAttribute(): MediaCollection
    {
        return $this->getMedia('media_files');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('media_files');
    }

    public function scopeOrderByActivityTypeSortOrder($query)
    {
        return $query->orderBy(ActivityType::select('sort_order')
            ->whereColumn('activity_types.id', 'activities.activity_type_id')
            ->limit(1));
    }
}
