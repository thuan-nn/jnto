<?php

namespace App\Transformers;

use App\Models\Admin;
use Flugg\Responder\Transformers\Transformer;

class AdminTransformer extends Transformer
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
     * @param \App\Models\Admin $admin
     * @return array
     */
    public function transform(Admin $admin)
    {
        return [
            'id' => (string)$admin->id,
            'name' => (string)$admin->name,
            'login_id' => (string)$admin->login_id,
            'created_at' => (string)$admin->created_at,
            'updated_at' => (string)$admin->updated_at,
        ];
    }
}
