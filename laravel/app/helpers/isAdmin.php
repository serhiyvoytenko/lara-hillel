<?php

use App\Models\User;

if (!function_exists('check_role')) {
    function check_role(int $id): bool
    {
        $role = (new App\Models\User)->find($id)->role()->first();

        return $role?->getAttributeValue('name') === 'Admin';
    }
}
