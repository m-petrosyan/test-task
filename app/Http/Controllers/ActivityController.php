<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Repositories\ActivityRepository;
use Inertia\Inertia;
use Inertia\Response;

class ActivityController
{
    public function index(): Response
    {
        return Inertia::render('Activity/ActivityIndex', [
            'activities' => ActivityRepository::list(),
            'activityCount' => ActivityRepository::count(),
        ]);
    }

    public function show(Activity $activity): Response
    {
        return Inertia::render('Activity/ActivityShow', [
            'activity' => $activity->load('activityType', 'participant')
        ]);
    }
}