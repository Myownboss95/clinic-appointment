<?php

namespace App\Models;

use App\Constants\EventStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalendlyEventType extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => EventStatus::class
    ];
    protected $guarded = ['id'];
}
