<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\JsonResponse;
use Mockery\Exception;

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
            Image::whereId($imageId)->delete();
            return response()->json(['messages' => 'Product was deleted successfully.']);
        } catch (Exception $exception) {
            logs()->error($exception);
            return response(status: 422)->json(['messages' => 'Error. See log.']);
        }
    }
}
