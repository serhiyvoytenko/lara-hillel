<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Product;
use App\Repositories\Contracts\CommentRepositoryInterface;
use RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * @throws Throwable
     */
    public function create(Request $request, string $model = Product::class): Comment
    {
        $comment = new Comment();
        $comment->setAttribute('body', $request->input('body'));
        $comment->setAttribute('commentable_type', $model);
        $comment->setAttribute('commentable_id', $request->input('model_id'));
        $comment->setAttribute('user_id', Auth::id());
        if ($comment->save()){
            return $comment;
        }
        throw new RuntimeException('Some errors');
    }


}
