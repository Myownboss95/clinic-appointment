<?php

namespace App\Services;

use App\Models\PaymentChannel;
use Illuminate\Database\Eloquent\Collection;

class PaymentChannelService
{

    public function __construct(private PaymentChannel $paymentChannel){

    }
  
    
    public function getAllPaymentChannel(): Collection
    {
        return $this->paymentChannel->latest()->get();
    }

    public function savePaymentChannel(array $data): PaymentChannel
    {
        return $this->paymentChannel->create($data);
    }
 
}
