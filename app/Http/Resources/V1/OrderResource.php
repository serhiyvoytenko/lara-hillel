<?php

namespace App\Http\Resources\V1;

use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource(User::findOrFail($this->user_id)),
            'status' => new OrderStatusResource(OrderStatus::findOrFail($this->status_id)),
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}
