<?php

namespace App\Repositories\Contracts;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{
    public function create(array $request): Model|bool;
    public function setTransaction(string $transaction_order_id, Transaction $transaction): void;
}
