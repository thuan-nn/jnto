<?php

namespace App\Models;

use App\Builders\BannerBuilder;
use App\Transformers\BannerTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends BaseModel
{
    use SoftDeletes;

    protected $table = 'banners';

    public function provideCustomBuilder()
    {
        return BannerBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'order',
        'is_selected',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * @param $data
     * @return mixed
     */
    static function transform($data)
    {
        return responderWithRelations($data, BannerTransformer::class, ['files']);
    }

    /*----RELATIONSHIP----*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function files()
    {
        return $this->morphToMany(File::class, 'model', 'model_has_files')->withPivot('file_type');
    }
}
