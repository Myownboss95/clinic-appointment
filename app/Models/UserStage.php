<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserStage
 * @package App\Models
 * @version October 24, 2023, 3:59 pm UTC
 *
 * @property integer $user_id
 * @property integer $sub_service_id
 * @property integer $service_id
 * @property string $log
 */
class UserStage extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_stage';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'sub_service_id',
        'service_id',
        'log'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'sub_service_id' => 'integer',
        'service_id' => 'integer',
        'log' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'sub_service_id' => 'nullable|integer',
        'service_id' => 'nullable|integer',
        'log' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
