<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{

    protected $table = 'product_statuses';
    protected $fillable = [
        'name',
        'created_by',
        'updated_by'
    ];
}
