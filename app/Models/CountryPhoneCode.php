<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CountryPhoneCode
 * @package App\Models
 * @version October 24, 2023, 4:11 pm UTC
 *
 * @property integer $id
 * @property string $name
 * @property string $dial_code
 * @property integer $dial_min_length
 * @property integer $dial_max_length
 * @property string $code
 * @property string $currency_name
 * @property string $currency_code
 * @property string $currency_symbol
 * @property string $flag
 * @property boolean $active
 */
class CountryPhoneCode extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'country_phone_codes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name',
        'dial_code',
        'dial_min_length',
        'dial_max_length',
        'code',
        'currency_name',
        'currency_code',
        'currency_symbol',
        'flag',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'dial_code' => 'string',
        'dial_min_length' => 'integer',
        'dial_max_length' => 'integer',
        'code' => 'string',
        'currency_name' => 'string',
        'currency_code' => 'string',
        'currency_symbol' => 'string',
        'flag' => 'string',
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'dial_code' => 'required|string|max:255',
        'dial_min_length' => 'required|integer',
        'dial_max_length' => 'required|integer',
        'code' => 'nullable|string|max:255',
        'currency_name' => 'nullable|string|max:191',
        'currency_code' => 'nullable|string|max:191',
        'currency_symbol' => 'nullable|string|max:191',
        'flag' => 'nullable|string|max:255',
        'active' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
