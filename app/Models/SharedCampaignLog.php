<?php

namespace App\Models;

class SharedCampaignLog extends BaseModel
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'campaign_id',
        'campaign_type',
        'user_id',

        'shared_at',
        'created_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function campaign()
    {
        return $this->morphTo(__FUNCTION__,'campaign_type', 'campaign_id');
    }
}
