<?php

namespace App\Models;


use App\Builders\PhotoBuilder;
use App\Transformers\PhotoTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends BaseModel
{
    use SoftDeletes;

    protected $table = 'photos';

    public function provideCustomBuilder()
    {
        return PhotoBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'description',
        'is_approved',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'is_approved' => 'boolean',
    ];

    /**
     * @param $data
     * @return mixed
     */
    static function transform($data){
        return responderWithRelations($data, PhotoTransformer::class, ['user', 'files']);
    }

    /*----RELATIONSHIP----*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function files()
    {
        return $this->morphToMany(File::class, 'model', 'model_has_files')->withPivot('file_type');
    }

    public function sharingCampaignLog()
    {
        return $this->morphMany(SharedCampaignLog::class, 'campaign');
    }
}
