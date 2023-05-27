<?php


namespace App\Supports\Traits;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

trait UserStamps
{
    public static function bootUserStamps()
    {
        $user = Auth::guard('admins')->user();
        if ($user) {
            static::creating(function ($model) use ($user) {
                if ($user && self::checkUserStampColumn($model->getTable(), 'created_by')) {
                    $model->created_by = $user->id;
                }
            });

            static::updating(function ($model) use ($user) {
                if ($user && self::checkUserStampColumn($model->getTable(), 'updated_by')) {
                    $model->updated_by = $user->id;
                }
            });

            static::deleting(function ($model) use ($user) {
                if ($user && self::checkUserStampColumn($model->getTable(), 'deleted_by')) {
                    $model->deleted_by = $user->id;
                }
            });
        }
    }

    /**
     * @param $model
     * @param $column
     * @return bool
     */
    public static function checkUserStampColumn($model, $column)
    {
        return Schema::hasColumn($model, $column);
    }

}
