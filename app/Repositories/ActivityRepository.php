<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Collection;

class ActivityRepository implements RepositoryInterface
{
    public static function list(): Collection
    {
        return Activity::with('activityType')
            ->orderByActivityTypeSortOrder()
            ->get();
    }

    public static function count(): int
    {
        return Activity::query()->count();
    }
}