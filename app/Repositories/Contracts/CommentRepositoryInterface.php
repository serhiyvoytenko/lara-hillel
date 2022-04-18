<?php

namespace App\Repositories\Contracts;

use App\Models\Comment;
use Illuminate\Http\Request;

interface CommentRepositoryInterface
{
    public function create(Request $request, string $model): Comment;
    public function remove(Request $request): bool;
}
