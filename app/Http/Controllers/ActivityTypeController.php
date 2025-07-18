<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use App\Repositories\ActivityTypeRepository;
use Inertia\Inertia;
use Inertia\Response;

class ActivityTypeController
{
    public function index(): Response
    {
        return Inertia::render('ActivityType/ActivityTypeIndex', [
            'activityTypes' => ActivityTypeRepository::list(),
            'activityTypeCount' => ActivityTypeRepository::count(),
        ]);
    }

    public function show(ActivityType $activityType): Response
    {
        return Inertia::render('ActivityType/ActivityTypeShow', [
            'activityType' => $activityType
        ]);
    }
}