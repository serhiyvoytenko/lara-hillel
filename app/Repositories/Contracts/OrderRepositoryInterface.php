<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{
    public function create(array $request): Model|bool;
}
