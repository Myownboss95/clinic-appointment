<?php

namespace App\Models;

use App\Models\AppointmentSubService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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



    public $guarded = ['id'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
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
        'name' => 'required|string|unique:sub_services',
        'slug' => 'string|unique:sub_services,slug',
        'service_id' => 'required|integer|exists:services,id',
        'price' => 'nullable',
        'description' => 'nullable|string',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
    /**
     * Get the user that owns the SubService
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function appointment(): BelongsToMany
    {
        return $this->belongsToMany(Appointment::class, 'appointment_sub_service');
    }


    
}
