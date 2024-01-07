<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

/**
 * Class User
 *
 * @version October 24, 2023, 3:58 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property int $city_id
 * @property int $state_id
 * @property int $country_id
 * @property int $role_id
 * @property string $password
 * @property string $gender
 * @property int $balance
 * @property int $life_time_balance
 * @property string $referral_code
 * @property int $referred_by_user_id
 * @property string|\Carbon\Carbon $email_verified_at
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    public $table = 'users';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $referralCodeColumn = 'referral_code';

    protected $role = 'role_id';

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
        'email_verified_at' => 'datetime',
    ];

     

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $model) {
            $model->{$model->referralCodeColumn} = $model::generateReferralCode($model->first_name ?? ''.$model->last_name ?? '');
            $model->{$model->role} = 1;
        });
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function bankDetail(): HasOne
    {
        return $this->hasOne(UserBankDetails::class);
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

    public function referrals()
    {
        return $this->hasMany(self::class, 'referred_by_user_id');
    }

    public static function generateReferralCode($name): string
    {
        $proposedCode = Str::limit($name, 4, '');
        if (Str::length($proposedCode) < 5) {
            $proposedCode = str_pad($proposedCode, 6, (string) mt_rand(0, 9), STR_PAD_RIGHT);
        }
        while (User::where('referral_code', $proposedCode)->exists()) {
            $proposedCode = Str::limit($name, 5, '');
            if (User::where('referral_code', $proposedCode)->exists()) {
                $proposedCode = Str::limit($proposedCode, 6, '').mt_rand(1000, 9999);
            }
        }

        return $proposedCode;
    }
}
