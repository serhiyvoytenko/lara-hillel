<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Throwable;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * @throws Throwable
     */
    public function create(Comment $comment, string $model, int $id): Comment|bool
    {
       return false;
    }


}
