<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 */
class ProductCategory extends Model
{
    //

    protected $table = 'product_categories';
    protected $fillable = [
        'name',
        'description',
        'image'
    ];

}
