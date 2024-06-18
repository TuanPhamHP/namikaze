<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property int $category_id
 * @property int $brand_id
 * @property int $status_id
 * @property string $preview_image
 * @property array $images
 * @property int $quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * Relations
 * @property ProductCategory $category
 * @property Brand $brand
 *
 */
class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'brand_id',
        'status_id',
        'preview_image',
        'images',
        'quantity',
    ];

    protected $casts = [
        'images' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function status()
    {
        return $this->belongsTo(ProductStatus::class, 'status_id');
    }


}
