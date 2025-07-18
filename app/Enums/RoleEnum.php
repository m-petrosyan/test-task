<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum RoleEnum: string implements HasLabel
{
    case User = 'user';
    case Admin = 'admin';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
