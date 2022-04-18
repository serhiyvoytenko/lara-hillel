<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RuntimeException;

class CommentsController extends Controller
{

    public function reply(Request $request, CommentRepositoryInterface $commentRepository): RedirectResponse
    {
        try {
            $commentRepository->create($request);
            return redirect()->back();
        } catch (RuntimeException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function add(AddCommentRequest $request, CommentRepositoryInterface $commentRepository): RedirectResponse
    {
        try {
            if ($request->validated()) {
                $commentRepository->create($request);
                return redirect()->back();
            }
        } catch (RuntimeException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Request $request): RedirectResponse
    {
        return redirect()->back();
    }

    public function delete(Request $request, CommentRepositoryInterface $commentRepository): RedirectResponse
    {
        try {
            $commentRepository->remove($request);
            return redirect()->back();
        } catch (RuntimeException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
