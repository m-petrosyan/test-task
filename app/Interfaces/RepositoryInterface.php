<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    public static function list(): Collection;

    public static function count(): int;
}