<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements RepositoryInterface
{
    public static function list(): Collection
    {
        return User::with('roles')->get();
    }

    public static function count(): int
    {
        return User::query()->count();
    }
}