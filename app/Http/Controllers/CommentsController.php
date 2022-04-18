<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RuntimeException;

class CommentsController extends Controller
{

    public function reply(Request $request): RedirectResponse
    {
        return redirect()->back();
    }

    public function add(Request $request, CommentRepositoryInterface $commentRepository): RedirectResponse
    {
        try {
            $commentRepository->create($request);
            return redirect()->back();
        } catch (RuntimeException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Request $request): RedirectResponse
    {
        return redirect()->back();
    }
}
