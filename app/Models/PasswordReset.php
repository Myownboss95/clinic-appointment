<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PasswordReset
 * @package App\Models
 * @version October 24, 2023, 4:04 pm UTC
 *
 * @property string $email
 * @property string $token
 */
class PasswordReset extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'password_resets';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'email',
        'token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required|string|max:255',
        'token' => 'required|string|max:255',
        'created_at' => 'nullable'
    ];

    
}
