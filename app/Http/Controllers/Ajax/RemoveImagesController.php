<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Exception;
use Illuminate\Http\JsonResponse;

class RemoveImagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param int
     * @return JsonResponse
     */
    public function __invoke(int $imageId): JsonResponse
    {
        try {
            Image::find($imageId)?->delete();
            return response()->json(['messages' => 'Image was deleted successfully.']);
        } catch (Exception $exception) {
            logs()->error($exception);
            return response(status: 422)->json(['messages' => 'Error. See log.']);
        }
    }
}
