<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    /**
     * Determines if the model hass uuid column
     */
    protected bool $hasUuidColumn = true;

    /**
     * The name of the uuid column
     */
    protected string $uuidColumn = 'uuid';

    public static function boot()
    {
        parent::boot();

        static::creating(function (self $model) {
            if ($model->hasUuidColumn) {
                $model->attributes[$model->uuidColumn] = Str::uuid();
            }
        });
    }
}
