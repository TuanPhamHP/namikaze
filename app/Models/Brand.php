<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property array|null $slug
 * @property string $description
 * @property string $image
 * @property boolean $is_active
 * @property int $created_by
 * @property int $updated_by
 *
 */
class Brand extends Model
{
    //
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
