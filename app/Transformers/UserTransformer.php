<?php

namespace App\Transformers;

use App\Models\User;
use Flugg\Responder\Transformers\Transformer;

class UserTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param \App\Models\User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => (string)$user->id,
            'name' => (string)$user->name,
            'display_name' => (string)$user->display_name,
            'phone_number' => (string)$user->phone_number,
            'email' => (string)$user->email,
            'sns_url' => $user->sns_url,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    }
}
