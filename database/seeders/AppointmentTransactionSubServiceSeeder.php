<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Stage;
use App\Models\Service;
use App\Models\SubService;
use Faker\Factory as Faker;
use App\Constants\StageTypes;
use App\Models\PaymentChannel;
use App\Constants\ServiceTypes;
use Illuminate\Database\Seeder;
use App\Constants\PaymentChannels;
use App\Constants\SubServicesTypes;
use App\Constants\TransactionTypes;
use App\Constants\TransactionStatusTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentTransactionSubServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::where('role_id', 1)->each( function ($user) {
           
            $faker = Faker::create();

            $stagetype = $faker->randomElement(StageTypes::toArray());
            $stage = Stage::where('name', $stagetype)->first();

            $subservicetype = $faker->randomElement(SubServicesTypes::toArray());
            $subservice = SubService::where('name', $subservicetype)->first();

            $paymentChannelType = $faker->randomElement(PaymentChannels::toArray());
            $paymentChannel = PaymentChannel::where('bank_name', $paymentChannelType)->first();

            for ($i = 0; $i < 3; $i++) {
                $transaction = $user->transactions()->create([ 
                        'amount' => $subservice->price,
                        'status' => $faker->randomElement(TransactionStatusTypes::toArray()),
                        'type' => TransactionTypes::DEBIT->value,
                        'payment_channel_id' => $paymentChannel->id,
                ]);

                $appointment = $user->appointments()->create([ 
                    'stage_id' => $stage->id,
                    'start_time' => now(),
                    'end_time' => $faker->randomElement([null, Carbon::now()->addHours(5) ])
                ]);

                $appointment->transaction()->attach($transaction);
                $appointment->subService()->attach($subservice);
            }
            
        });
    }
}
