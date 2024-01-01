<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 *
 * @version October 24, 2023, 4:00 pm UTC
 *
 * @property int $country_id
 * @property string $name
 * @property string $status
 */
class State extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'states';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'country_id',
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
        'country_id' => 'integer',
        'name' => 'string',
        'status' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required',
        'name' => 'required|string|max:255',
        'status' => 'required|string',
        'created_at' => 'required',
        'updated_at' => 'required',
        'deleted_at' => 'nullable',
    ];
}
