<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    use Notifiable;

    use HasFactory;

    public $table = 'users';
    
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
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'dob' => 'date',
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
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'email' => 'required|string|max:255',
        'dob' => 'required|string',
        'phone_number' => 'required|string',
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

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function comments(): HasMany
    {
        return $this->HasMany(Comment::class);
    }

    public function transactions(): HasMany
    {
        return $this->HasMany(Transaction::class);
    }

    public function stage(): BelongsToMany
    {
        return $this->belongsToMany(Stage::class, 'user_stage');
    }

    public static function generateReferralCode($name): string
    {
        $proposedCode = Str::limit($name, 8, '');
        if (Str::length($proposedCode) < 8) {
            $proposedCode = str_pad($proposedCode, 10, (string) mt_rand(0, 9), STR_PAD_RIGHT);
        }
        while (User::where('referral_code', $proposedCode)->exists()) {
            $proposedCode = Str::limit($name, 8, '');
            if (User::where('referral_code', $proposedCode)->exists()) {
                $proposedCode = Str::limit($proposedCode, 6, '').mt_rand(1000, 9999);
            }
        }

        return $proposedCode;
    }
   

    
}
