<?php

namespace App\Traits;

trait AccessPanelActions
{
    public static function canCreate(): bool
    {
        return auth()->user()?->can('CRU');
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('CRU');
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('CRUD');
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->can('R');
    }
}