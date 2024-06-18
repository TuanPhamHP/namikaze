<?php

namespace App\Http\Controllers\Api\Traits;

use App\Transformers\CustomSerializer;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

trait CanTransformTraits
{
    protected $serializer;

    /**
     * Set the serializer.
     *
     * @param $serializer
     */
    public function setSerializer($serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Transform a collection of items or a single item.
     *
     * @param mixed $data
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param string|null $resourceKey
     * @param array|string $includes
     * @return array
     */
    public function transform($data, $transformer, $resourceKey = null, $includes = [])
    {
        $fractal = new Manager();
        // Sử dụng serializer tùy chỉnh nếu có
        $fractal->setSerializer(new CustomSerializer());
        $fractal->parseIncludes($includes);
        if ($data instanceof LengthAwarePaginator) {
            $resource = new Collection($data->items(), $transformer, $resourceKey);
            $resource->setPaginator(new IlluminatePaginatorAdapter($data));
        } elseif (is_array($data) || $data instanceof \Illuminate\Support\Collection) {
            $resource = new Collection($data, $transformer, $resourceKey);
        } else {
            $resource = new Item($data, $transformer, $resourceKey);
        }

        return $fractal->createData($resource)->toArray();
    }
}
