<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Stage
 *
 * @version October 24, 2023, 4:00 pm UTC
 *
 * @property string $name
 */
class Stage extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'stages';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $guarded = [
        'id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
   
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_stage');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
