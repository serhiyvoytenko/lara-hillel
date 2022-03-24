<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $thumbnail
 * @property string $large_image
 * @property string $medium_image
 * @property string $video
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ImageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereLargeImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereMediumImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereVideo($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Product|null $products
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
    ];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
