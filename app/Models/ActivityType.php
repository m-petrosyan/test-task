<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActivityType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sort_order',
    ];

    /**
     * Get the activities associated with this activity type.
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
    
}
