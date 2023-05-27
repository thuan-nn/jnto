<?php

namespace App\Models;

use App\Builders\StoryBuilder;
use App\Transformers\StoryTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends BaseModel
{
    use SoftDeletes;

    protected $table = 'stories';

    public function provideCustomBuilder()
    {
        return StoryBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'content',
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
     *
     * @return mixed
     */
    static function transform($data)
    {
        return responderWithRelations($data, StoryTransformer::class, ['user']);
    }

    /*----RELATIONSHIP----*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
