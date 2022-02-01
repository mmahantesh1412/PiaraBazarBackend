<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BrandCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {
                return [
                    'id' => $data->id,
                    'name' => $data->getTranslation('name'),
                    'logo' => api_asset($data->logo),
                    'slug' => $data->slug,
                    'meta_title ' => $data->meta_title ,
                    'meta_description' => $data->meta_description,
                    'links' => [
                        'products' => route('api.products.brand', $data->id)
                    ]
                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
