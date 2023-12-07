<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Appointment
 * @package App\Models
 * @version October 24, 2023, 4:12 pm UTC
 *
 * @property integer $user_id
 * @property integer $sub_service_id
 * @property string|\Carbon\Carbon $start_time
 * @property string|\Carbon\Carbon $end_time
 * @property string $stage_id
 */
class Appointment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'appointments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'sub_service_id',
        'start_time',
        'end_time',
        'stage_id'
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
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'stage_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'sub_service_id' => 'required|integer',
        'start_time' => 'nullable',
        'end_time' => 'nullable',
        'stage_id' => 'nullable|string|max:11'
    ];

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}
