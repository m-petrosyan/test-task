<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PermissionEnum implements HasLabel
{
    case CRUD;
    case CRU;
    case R;

    public function getValues(): array
    {
        return match ($this) {
            self::CRUD => ['CRUD', 'CRU', 'R'],
            self::CRU => ['CRU', 'R'],
            self::R => ['R'],
        };
    }

    public function getLabel(): ?string
    {
        return $this->name;
    }
}