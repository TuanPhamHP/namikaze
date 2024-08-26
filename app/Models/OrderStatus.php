<?php

namespace App\Models;

use App\Models\Classification;

/**
 * Class OrderStatus
 * @package Modules\OrderManagement\Entities
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 *
 */
class OrderStatus extends Classification
{
    public const V1_NEW = 200;
    public const V1_FORWARDER = 210;
    public const V1_DRIVER = 220;
    public const V1_DELIVERY_IN_PROGRESS = 420;
    public const V1_FINISHED = 440;
    public const V1_CANCELED = 500;
}
