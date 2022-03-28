<?php

use App\Models\User;

if (!function_exists('isAdmin')) {
    function isAdmin(int $id): bool
    {
        $role = User::find($id)?->role()->first();

        return $role?->getAttributeValue('name') === 'Admin';
    }
}
