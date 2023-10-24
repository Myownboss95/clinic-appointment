<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class City
 * @package App\Models
 * @version October 24, 2023, 4:12 pm UTC
 *
 * @property integer $id
 * @property integer $state_id
 * @property string $name
 * @property string $status
 */
class City extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'state_id',
        'name',
        'status'
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
        'status' => 'string'
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
        'created_at' => 'required',
        'updated_at' => 'required',
        'deleted_at' => 'nullable'
    ];

    
}
