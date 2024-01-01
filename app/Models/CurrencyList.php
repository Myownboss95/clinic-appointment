<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CurrencyList
 *
 * @version October 24, 2023, 4:10 pm UTC
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $dial_code
 * @property string $currency_name
 * @property string $currency_symbol
 * @property string $currency_code
 */
class CurrencyList extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'currency_lists';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $guarded = ['id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'dial_code' => 'string',
        'currency_name' => 'string',
        'currency_symbol' => 'string',
        'currency_code' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:191',
        'code' => 'nullable|string|max:191',
        'dial_code' => 'nullable|string|max:191',
        'currency_name' => 'nullable|string|max:191',
        'currency_symbol' => 'nullable|string|max:191',
        'currency_code' => 'nullable|string|max:191',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
    ];
}
