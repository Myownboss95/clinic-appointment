<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 *
 * @version October 24, 2023, 4:01 pm UTC
 *
 * @property string $model_name
 * @property int $model_id
 * @property string $body
 * @property int $user_id
 * @property int $staff_user_id
 */
class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'comments';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'appointment_id',
        'appointment_stage_id',
        'body',
        'user_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'appointment_id' => 'integer',
        'appointment_stage_id' => 'integer',
        'body' => 'string',
        'user_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'appointment_id' => 'required|integer',
        'appointment_stage_id' => 'required|integer',
        'body' => 'required|string',
        'user_id' => 'nullable|integer',

    ];

    /**
     * Get the user that owns the Comment
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
