<?php

namespace App\Models;

/**
 * Class EntityType
 * @package Modules\CoreTransport\Entities
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 */

use Illuminate\Database\Eloquent\Model;

abstract class Classification extends Model
{
    protected $fillable = ['name', 'description'];

    public $timestamps = false;
}
