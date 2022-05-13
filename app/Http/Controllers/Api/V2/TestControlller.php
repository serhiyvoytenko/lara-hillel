<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use http\Exception\UnexpectedValueException;
use Illuminate\Http\Request;

class TestControlller extends Controller
{
    public function test()
    {
        return response()->json(['data' => ['user' => \Auth::user()]]);
    }
}
