<?php

namespace App\Actions;

use App\Constants\StageTypes;
use App\Constants\TransactionStatusTypes;
use App\Constants\TransactionTypes;
use App\Models\User;
use App\Data\Calendly\CalendlyRedirectData;
use App\Models\Appointment;
use App\Models\Stage;
use App\Models\Transaction;

class CreateAppointmentAction
{
    public static function execute(CalendlyRedirectData $calendlyRedirectData, User $user): Appointment
    {
        $subServiceId = $calendlyRedirectData->subService->id;
        $stage = Stage::where('name', StageTypes::PENDING)->first();

        if ($user->appointments()->where('stage_id', $stage->id)
                ->whereDate('created_at', '>=', now()->startOfDay()
                ->toDateString())->whereHas('subService', function ($query) use ($subServiceId) {
                    $query->where('sub_service_id', $subServiceId);
        })->first()) 
        {
            
            $appointment = $user->appointments()->where('stage_id', $stage->id)
                ->whereDate('created_at', '>=', now()->startOfDay()->toDateString())
                ->whereHas('subService', function ($query) use ($subServiceId) {
                $query->where('sub_service_id', $subServiceId);
            })->first();
            
            $appointment->update([
                'start_time' => $calendlyRedirectData->startTime
            ]);

            if (!$appointment->transaction()?->first()->exists()) {
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'amount' => $calendlyRedirectData->subService->price,
                    'status' => TransactionStatusTypes::CREATED->value,
                    'type' => TransactionTypes::DEBIT->value,
                ]);

                $appointment->transaction()->attach($transaction);
            }

            return $appointment;
        }


        try {
            $appointment = Appointment::create([
                'user_id' => $user->id,
                'stage_id' => $stage->id,
                'start_time' => $calendlyRedirectData->startTime
            ]);
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'amount' => $calendlyRedirectData->subService->price,
                'status' => TransactionStatusTypes::CREATED->value,
                'type' => TransactionTypes::DEBIT->value,
            ]);

            $appointment->transaction()->attach($transaction);
            $appointment->subService()->attach($calendlyRedirectData->subService);

            return $appointment;
        } catch (\Throwable $th) {
            report($th);
        }
    }
}
