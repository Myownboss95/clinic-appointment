<?php

namespace App\Models;

use App\Constants\TransactionReasons;
use App\Constants\TransactionStatusTypes;
use App\Constants\TransactionTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected string $uuidColumn = 'ref';

    protected $casts = [
        // 'status' => TransactionStatusTypes::class,
        // 'type' => TransactionTypes::class,
        'reason' => TransactionReasons::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function confirmedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'confirmed_by');
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
