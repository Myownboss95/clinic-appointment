<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Comment
 * @package App\Models
 * @version October 24, 2023, 4:01 pm UTC
 *
 * @property string $model_name
 * @property integer $model_id
 * @property string $body
 * @property integer $user_id
 * @property integer $staff_user_id
 */
class Comment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'comments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'model_name',
        'model_id',
        'body',
        'user_id',
        'staff_user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'model_name' => 'string',
        'model_id' => 'integer',
        'body' => 'string',
        'user_id' => 'integer',
        'staff_user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'model_name' => 'required|string|max:255',
        'model_id' => 'required|integer',
        'body' => 'required|string',
        'user_id' => 'nullable|integer',
        'staff_user_id' => 'nullable|integer'
    ];

 /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}
