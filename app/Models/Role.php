<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read User|null $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role admin()
 * @method static \Illuminate\Database\Eloquent\Builder|Role customer()
 */
class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    private function getRole($query, $role = 'customer')
    {
        return $query->where(
            'name',
            '=',
            config('constants.db.roles.' . $role)
        );
    }

    public function scopeCustomer($query)
    {
        return $this->getRole($query);
    }

    public function scopeAdmin($query)
    {
        return $this->getRole($query, 'admin');
    }
}


