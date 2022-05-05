<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $status_id
 * @property int $user_id
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string $email
 * @property string $country
 * @property string $city
 * @property string $address
 * @property float $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static OrderFactory factory(...$parameters)
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereAddress($value)
 * @method static Builder|Order whereCity($value)
 * @method static Builder|Order whereCountry($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereEmail($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereName($value)
 * @method static Builder|Order wherePhone($value)
 * @method static Builder|Order whereStatusId($value)
 * @method static Builder|Order whereSurname($value)
 * @method static Builder|Order whereTotal($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 * @mixin Eloquent
 * @property-read Collection|OrderStatus[] $orderStatuses
 * @property-read int|null $order_statuses_count
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @property-read OrderStatus|null $orderStatus
 * @property-read User $user
 */
class Order extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'country',
        'city',
        'address',
        'total',
        'status_id',
        'user_id',
        'vendor_order_id',
        'transaction_id',
    ];

    public function orderStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'status_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'single_price']);
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
