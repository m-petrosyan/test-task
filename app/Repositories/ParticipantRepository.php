<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Collection;

class ParticipantRepository implements RepositoryInterface
{
    public static function list(): Collection
    {
        return Participant::query()->get();
    }

    public static function count(): int
    {
        return Participant::query()->count();
    }
}