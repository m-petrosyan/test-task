<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Inertia\Inertia;
use Inertia\Response;

class UserController
{
    public function index(): Response
    {
        return Inertia::render('User/UserIndex', [
            'users' => UserRepository::list(),
            'userCount' => UserRepository::count(),
        ]);
    }

    public function show(User $user): Response
    {
        return Inertia::render('User/UserShow', [
            'user' => $user->load('roles')
        ]);
    }
}