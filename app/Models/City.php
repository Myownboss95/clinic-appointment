<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class City
 *
 * @version October 24, 2023, 4:12 pm UTC
 *
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property string $status
 */
class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'cities';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'state_id',
        'name',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'state_id' => 'integer',
        'name' => 'string',
        'status' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => 'required',
        'name' => 'required|string|max:255',
        'status' => 'required|string',
    ];
}
