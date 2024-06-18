<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\CanTransformTraits;
use App\Http\Controllers\Api\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    use ResponseTrait;
    use CanTransformTraits;
}
