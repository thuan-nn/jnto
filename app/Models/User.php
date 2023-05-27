<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'display_name',
        'phone_number',
        'email',
        'campaign_register_type',
        'sns_url',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'sns_url' => 'object',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function story() {
        return $this->hasOne(Story::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function photo() {
        return $this->hasOne(Photo::class, 'user_id', 'id');
    }
}
