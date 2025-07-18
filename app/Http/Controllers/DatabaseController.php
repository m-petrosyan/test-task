<?php

namespace App\Http\Controllers;

use App\Repositories\ActivityRepository;
use App\Repositories\ActivityTypeRepository;
use App\Repositories\UserRepository;
use Inertia\Inertia;

class DatabaseController
{
    public function __invoke(): \Inertia\Response
    {
        return Inertia::render('Database', [
            'userCount' => UserRepository::count(),
            'activityCount' => ActivityRepository::count(),
            'activityTypeCount' => ActivityTypeRepository::count(),
            'participantCount' => ActivityRepository::count(),
        ]);
    }
}