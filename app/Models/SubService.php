<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SubService
 * @package App\Models
 * @version October 24, 2023, 3:59 pm UTC
 *
 * @property integer $name
 * @property integer $service_id
 * @property integer $price
 * @property string $description
 * @property string $image
 */
class SubService extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sub_services';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'service_id',
        'price',
        'description',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'integer',
        'service_id' => 'integer',
        'price' => 'integer',
        'description' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|integer',
        'service_id' => 'required|integer',
        'price' => 'nullable|integer',
        'description' => 'nullable|string',
        'image' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
