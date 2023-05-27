<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class File extends BaseModel
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
        'upload_name',
        'mime_type',
        'size',
        'path',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function banners()
    {
        return $this->morphToMany(Banner::class, 'model', 'model_has_files')->withPivot('file_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function photos()
    {
        return $this->morphToMany(Photo::class, 'model', 'model_has_files')->withPivot('file_type');
    }
}
