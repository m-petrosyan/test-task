<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\ActivityType;
use Illuminate\Database\Eloquent\Collection;

class ActivityTypeRepository implements RepositoryInterface
{
    public static function list(): Collection
    {
        return ActivityType::query()
            ->orderBy('sort_order')
            ->get();
    }

    public static function count(): int
    {
        return ActivityType::query()->count();
    }
}