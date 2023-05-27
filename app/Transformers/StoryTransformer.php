<?php

namespace App\Transformers;

use App\Models\Story;
use Flugg\Responder\Transformers\Transformer;

class StoryTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'user' => UserTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * @param Story $story
     *
     * @return array
     */
    public function transform(Story $story)
    {
        return [
            'id'          => (string)$story->id,
            'user_id'     => (string)$story->user_id,
            'title'       => (string)$story->title,
            'content'     => (string)$story->content,
            'is_approved' => (boolean)$story->is_approved,
            'created_at'  => (string)$story->created_at,
            'updated_at'  => (string)$story->updated_at,
        ];
    }
}
