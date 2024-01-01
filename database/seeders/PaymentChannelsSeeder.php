<?php

namespace Database\Seeders;

use App\Constants\PaymentChannels;
use App\Models\PaymentChannel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PaymentChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (PaymentChannels::toArray() as $paymentChannel) {
            $selectedChannel = PaymentChannels::from($paymentChannel);

            PaymentChannel::create([
                'name' => $selectedChannel->name(),
                'bank_name' => $selectedChannel->bank_name(),
                'account_name' => $selectedChannel->account_name(),
                'account_number' => $selectedChannel->account_number(),
            ]);
        }
    }
}
