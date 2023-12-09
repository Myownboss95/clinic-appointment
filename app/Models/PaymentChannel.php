<?php

namespace App\Models;

use App\Constants\PaymentChannelNames;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentChannel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'name' => PaymentChannelNames::class,
    ];

}
