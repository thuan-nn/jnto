<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelHasFile extends Model
{
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'file_id',
        'file_type',
        'model_type',
        'model_id',
    ];
}
