<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Eloquent;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;
use App\Services\FileStorageService;
use Illuminate\Support\Facades\Auth;
use willvincent\Rateable\Rateable;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $short_description
 * @property string $sku
 * @property int $category_id
 * @property float $price
 * @property int $discount
 * @property int $count
 * @property int $image_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ProductFactory factory(...$parameters)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereCount($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereDiscount($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereImageId($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereShortDescription($value)
 * @method static Builder|Product whereSku($value)
 * @method static Builder|Product whereTitle($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read Collection|Image[] $images
 * @property-read int|null $images_count
 * @property-read Collection|Order[] $orders
 * @property-read int|null $orders_count
 * @property string $thumbnail
 * @property-read Category $category
 * @method static Builder|Product whereThumbnail($value)
 * @property-read Collection|User[] $followers
 * @property-read int|null $followers_count
 * @property-read Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read mixed $average_rating
 * @property-read mixed $sum_rating
 * @property-read mixed $user_average_rating
 * @property-read mixed $user_sum_rating
 * @property-read Collection|\willvincent\Rateable\Rating[] $ratings
 * @property-read int|null $ratings_count
 */
class Product extends Model
{
    use HasFactory, Rateable;

    protected $fillable = [
        'title',
        'description',
        'short_description',
        'sku',
        'category_id',
        'price',
        'discount',
        'count',
        'thumbnail',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'wishes',
            'product_id',
            'user_id'
        );
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(
            Comment::class,
            'commentable'
        )->whereNull('parent_id');
    }


    /**
     * @throws FileNotFoundException
     */
    public function setThumbnailAttribute($image): void
    {
        if (!empty($this->attributes['thumbnail'])) {
            FileStorageService::remove($this->attributes['thumbnail']);
        }
        $this->attributes['thumbnail'] = FileStorageService::upload($image);
    }

    protected function available(): Attribute
    {
        return Attribute::make(
            get: static fn($values, $attributes) => $attributes['count'] > 0,
        );
    }

    public function getUserRating()
    {
        $ratings = $this->ratings()->where('rateable_id','=', $this->id)->get();
        return $ratings->where('user_id', Auth::id())->first();
    }
}
