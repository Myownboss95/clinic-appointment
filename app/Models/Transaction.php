<?php

namespace App\Models;

use App\Constants\TransactionTypes;
use App\Constants\TransactionStatusTypes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected string $uuidColumn = 'ref';

    protected $casts = [
        // 'status' => TransactionStatusTypes::class,
        // 'type' => TransactionTypes::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function paymentChannel(): BelongsTo
    {
        return $this->belongsTo(PaymentChannel::class);
    }
    public function appointment(): BelongsToMany
    {
        return $this->belongsToMany(Appointment::class, 'appointment_transaction');
    }

}
