<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @version October 24, 2023, 3:58 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property integer $city_id
 * @property integer $state_id
 * @property integer $country_id
 * @property integer $role_id
 * @property string $password
 * @property string $gender
 * @property integer $balance
 * @property integer $life_time_balance
 * @property string $referral_code
 * @property integer $referred_by_user_id
 * @property string|\Carbon\Carbon $email_verified_at
 */
class User extends Authenticatable
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'city_id',
        'state_id',
        'country_id',
        'role_id',
        'password',
        'gender',
        'balance',
        'life_time_balance',
        'referral_code',
        'referred_by_user_id',
        'email_verified_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'city_id' => 'integer',
        'state_id' => 'integer',
        'country_id' => 'integer',
        'role_id' => 'integer',
        'password' => 'string',
        'gender' => 'string',
        'balance' => 'integer',
        'life_time_balance' => 'integer',
        'referral_code' => 'string',
        'referred_by_user_id' => 'integer',
        'email_verified_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'email' => 'required|string|max:255',
        'city_id' => 'nullable|integer',
        'state_id' => 'nullable|integer',
        'country_id' => 'nullable|integer',
        'role_id' => 'nullable|integer',
        'deleted_at' => 'nullable',
        'updated_at' => 'nullable',
        'created_at' => 'nullable',
        'password' => 'nullable|string|max:255',
        'gender' => 'nullable|string|max:255',
        'balance' => 'nullable|integer',
        'life_time_balance' => 'nullable|integer',
        'referral_code' => 'nullable|string|max:255',
        'referred_by_user_id' => 'nullable|integer',
        'email_verified_at' => 'nullable'
    ];

    
}
