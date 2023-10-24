<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Country
 * @package App\Models
 * @version October 24, 2023, 4:11 pm UTC
 *
 * @property integer $id
 * @property string $name
 * @property string $iso_code2
 * @property string $iso_code3
 * @property integer $num_code
 * @property string $status
 * @property string $currency_symbol
 */
class Country extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'countries';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name',
        'iso_code2',
        'iso_code3',
        'num_code',
        'status',
        'currency_symbol'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'iso_code2' => 'string',
        'iso_code3' => 'string',
        'num_code' => 'integer',
        'status' => 'string',
        'currency_symbol' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'iso_code2' => 'nullable|string|max:191',
        'iso_code3' => 'nullable|string|max:191',
        'num_code' => 'nullable|integer',
        'status' => 'required|string',
        'created_at' => 'required',
        'updated_at' => 'required',
        'deleted_at' => 'nullable',
        'currency_symbol' => 'nullable|string|max:191'
    ];

    
}
