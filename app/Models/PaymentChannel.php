<?php

namespace App\Models;

use App\Constants\PaymentChannelNames;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentChannel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'name' => PaymentChannelNames::class,
    ];
}
