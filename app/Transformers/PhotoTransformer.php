<?php

namespace App\Transformers;

use App\Models\Photo;
use Flugg\Responder\Transformers\Transformer;

class PhotoTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'files' => FileTransformer::class,
        'user'  => UserTransformer::class,
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
     * @param \App\Models\Photo $photo
     *
     * @return array
     */
    public function transform(Photo $photo)
    {
        return [
            'id'          => (string)$photo->id,
            'description' => (string)$photo->description,
            'is_approved' => (bool)$photo->is_approved,
            'count_share' => (int) $photo->sharingCampaignLog->count(),
            'created_at'  => (string)$photo->created_at,
            'updated_at'  => (bool)$photo->updated_at,
        ];
    }
}
