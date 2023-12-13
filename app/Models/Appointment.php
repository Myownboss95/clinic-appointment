<?php

namespace App\Models;



use App\Models\AppointmentSubservice;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Appointment
 * @package App\Models
 * @version October 24, 2023, 4:12 pm UTC
 *
 * @property integer $user_id
 * @property string|\Carbon\Carbon $start_time
 * @property string|\Carbon\Carbon $end_time
 */
class Appointment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'appointments';
    
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
        'user_id' => 'integer',
        'parent_appointment_id' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'parent_appointment_id' => 'nullable|exists:appointments,id',
        'start_time' => 'nullable',
        'end_time' => 'nullable',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subService(): BelongsToMany
    {
        return $this->belongsToMany(SubService::class, 'appointment_sub_service');
    }
    
    public function transaction(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'appointment_transaction');
    }

    public function parentAppointment()
    {
        return $this->belongsTo(self::class, 'parent_appointment_id');
    }

    public function followUpAppointments()
    {
        return $this->hasMany(self::class, 'parent_appointment_id');
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }
    
}
