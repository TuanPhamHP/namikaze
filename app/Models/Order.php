<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'phone',
        'address',
        'name',
        'gender',
        'note',
        'status_id',
        'product_ids',
    ];
    protected $casts = [
        'product_ids' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    // Relationships
    public function getProductsAttribute()
    {
        return Product::whereIn('id', $this->product_ids)->get();
    }
}
