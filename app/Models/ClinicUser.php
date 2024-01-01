<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClinicUser
 *
 * @version October 24, 2023, 4:12 pm UTC
 *
 * @property int $user_id
 * @property int $clinic_id
 * @property string $role
 */
class ClinicUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'clinic_user';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'clinic_id',
        'role',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'clinic_id' => 'integer',
        'role' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'clinic_id' => 'required|integer',
        'role' => 'required|string|max:255',
    ];
}
