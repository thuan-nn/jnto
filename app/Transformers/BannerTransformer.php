<?php

namespace App\Transformers;

use App\Models\Banner;
use Flugg\Responder\Transformers\Transformer;

class BannerTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'files' => FileTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param \App\Models\Banner $banner
     *
     * @return array
     */
    public function transform(Banner $banner)
    {
        return [
            'id' => (string)$banner->id,
            'order' => (string)$banner->order,
            'is_selected' => (boolean)$banner->is_selected,
            'created_at' => (string)$banner->created_at,
            'updated_at' => (string)$banner->updated_at,
        ];
    }
}
