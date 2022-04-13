<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index(): void
    {
        $user = Auth::user();
        $user?->wishes()->attach(2);
        dd($user?->wishes()->get());
    }
}
