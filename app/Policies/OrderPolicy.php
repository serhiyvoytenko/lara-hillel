<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Client\Request;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
//     * @param User $user
//     * @param Order $order
//     * @return bool
     */
    public function view(User $user, Order $order): bool
    {
        return true;
        dd(app('request')->get('order'));
        return $user->id === $order->user_id;
    }
}
